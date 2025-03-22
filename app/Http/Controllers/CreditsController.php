<?php

namespace App\Http\Controllers;

use App\Helpers\Hotel;
use App\Models\CmsOffer;
use App\Models\Collectable;
use PayPal\Api;
use PayPal\Api\Cost;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Rest\ApiContext;
use App\Models\UserTransaction;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Console\Input\Input;

use function PHPUnit\Framework\isNumeric;

class CreditsController extends Controller
{
    //public function __construct()
    //{
    //    $paypal_conf = Config::get('paypal');
    //    $this->_api_context = new ApiContext(new OAuthTokenCredential(
    //        $paypal_conf['client_id'],
    //        $paypal_conf['secret']
    //    ));
    //    $this->_api_context->setConfig($paypal_conf['settings']);
    //}

    public function index()
    {
        return view('credits.index');
    }

    public function transactions()
    {
        if (!Auth::check())
            return redirect()->route('credits.index');

        return view('credits.transactions')->with(['transactions' => UserTransaction::where('user_id', Auth::user()->id)->orderBy('timestamp', 'DESC')->take(100)->get()]);
    }

    public function furniture()
    {
        return view('credits.furniture');
    }

    public function catalogue($id = null)
    {
        return view('credits.catalogue' . ($id ? '_' . $id : ''));
    }

    public function decorationExamples()
    {
        return view('credits.decorationexamples');
    }

    public function currency()
    {
        return view('credits.currency');
    }

    public function collectibles()
    {
        $tick = emu_config('rare.cycle.tick.time');
        if(!$tick || !is_numeric($tick))
            $tick = 0;

        $collectable = Collectable::orderBy('reuse_time', 'DESC')->first();
        $time = (24 * 60 * 60) - $tick;

        return view('credits.collectibles')->with([
            'collectable' => $collectable,
            'time' => $time
        ]);
    }

    public function mystery()
    {
        return view('credits.mystery');
    }

    public function mysteryRedeem()
    {
        return view('credits.ajax.redeem_mystery');
    }

    public function buySetup($offer = null)
    {
        if (!Auth::check())
            return redirect()->route('auth.login');

        if (!Hotel::sendRconMessage('teststatus'))
            return redirect()->back()->with('message', 'ERROR');

        $offer = CmsOffer::find($offer);
        if (!$offer)
            return view('errors.404');

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName($offer->name)
            ->setCurrency('BRL')
            ->setDescription($offer->description)
            ->setQuantity(1)
            ->setPrice($offer->price);

        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('BRL')
            ->setTotal($offer->price);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($offer->description);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('credits.status'))
            /** Specify return URL **/
            ->setCancelUrl(URL::route('credits.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (Config::get('app.debug')) {
                Session::put('error', 'Connection timeout');
                return Redirect::route('credits.index');
            } else {
                Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('credits.index');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }


        Session::put('offer_id', $offer->id);

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::put('error', 'Unknown error occurred');
        return Redirect::route('credits.index');
    }

    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($request->PayerID) || empty($request->token)) {
            Session::put('error', 'Payment failed');
            return redirect()->route('credits.index');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {

            $offer = CmsOffer::find(Session::get('offer_id'));
            Session::forget('offer_id');
            $rewards = json_decode($offer->reward);
            if (isset($rewards->credits)) {
                Hotel::sendRconMessage('givecredits', ['user_id' => Auth::user()->id, 'credits' => $rewards->credits]);
            }

            if (isset($rewards->points)) {
                foreach ($rewards->points as $points) {
                    Hotel::sendRconMessage('givepoints', ['user_id' => Auth::user()->id, 'points' => $points->amount, 'type' => $points->type]);
                }
            }

            if (isset($rewards->furnis)) {
                foreach ($rewards->furnis as $furni) {
                    Hotel::sendRconMessage('giveitem', ['user_id' => Auth::user()->id, 'item_id' => $furni->id, 'amount' => $furni->amount]);
                }
            }

            return redirect()->route('credits.index')->with('message', 'OK');
        }

        return redirect()->route('credits.index')->with('message', 'ERROR');
    }

    public function habbletAjaxCollectiblesConfirm()
    {
        $collectable = Collectable::orderBy('reuse_time', 'DESC')->first();

        return view('habblet.ajax.collectibles_confirm')->with([
            'collectable' => $collectable
        ]);
    }

    public function habbletAjaxCollectiblesPurchase()
    {
        $collectable = Collectable::orderBy('reuse_time', 'DESC')->first();

        if(user()->credits >= $collectable->getPrice()) {
            user()->updateCredits(-$collectable->getPrice());
            user()->giveItem($collectable->getCatalogueItem()->definition_id);

            return view('habblet.ajax.collectibles_success')->with([
                'collectable'   => $collectable
            ]);
        }
        else {
            return view('habblet.ajax.collectibles_success')->with([
                'collectable'   => $collectable,
                'error' => true
            ]);
        }
    }
}

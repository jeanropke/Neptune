<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class CreditsController extends Controller
{
    /*
    public function creditsTransactions()
    {
        if (!user()->hasPermission('can_check_transactions'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.users.credits.transactions');
    }

    public function getCreditsTransactions(Request $request)
    {
        if (!user()->hasPermission('can_check_transactions'))
            return view('housekeeping.accessdenied');

        $user = User::where('id', $request->user_id)->first();

        if (!$user)
            return redirect()->route('admin.credits.transactions', false)->with('message', 'User not found!');

        return view('housekeeping.users.credits.transactions')->with(
            [
                'results' => DB::table('cms_transactions')->limit(100)->orderby('timestamp', 'desc')->get(),
                'user'    => $user
            ]
        );
    }
    */

    public function vouchers()
    {
        if (!user()->hasPermission('can_create_vouchers'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.users.credits.vouchers')->with([
            'vouchers' => Voucher::all()
        ]);
    }

    public function vouchersAdd(Request $request)
    {
        if (!user()->hasPermission('can_create_vouchers'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'voucher'       => 'required|unique:vouchers,voucher_code|unique:vouchers_history,voucher_code',
            'credits'       => 'numeric',
            'expiry_date'   => 'required',
            'is_single_use' => 'required|boolean'
        ]);

        Voucher::insert([
            'voucher_code'  => $request->voucher,
            'credits'       => $request->credits,
            'expiry_date'   => $request->expiry_date,
            'is_single_use' => $request->is_single_use
        ]);

        return redirect()->route('housekeeping.credits.vouchers')->with('message', 'Voucher created!');
    }

    public function vouchersDelete(Request $request)
    {
        if (!user()->hasPermission('can_create_vouchers'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $voucher = Voucher::where('voucher_code', $request->voucher)->first();

        if (!$voucher)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This voucher does not exist!']);

        if ($voucher->is_single_use > 0) {
            $voucher->deleteItems();
            Voucher::where('voucher_code', $request->voucher)->delete();
        }

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'Voucher deleted!']);
    }
}

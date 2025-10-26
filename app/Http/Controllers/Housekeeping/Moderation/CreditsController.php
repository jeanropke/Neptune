<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\Catalogue\Item as CatalogueItem;
use App\Models\User;
use App\Models\User\Transaction;
use App\Models\Voucher;
use App\Models\Voucher\History;
use App\Models\Voucher\Item;
use Illuminate\Http\Request;

class CreditsController extends Controller
{
    public function vouchers()
    {
        abort_unless_permission('can_create_vouchers');

        $vouchers = Voucher::get();

        return view('housekeeping.moderation.credits.vouchers', compact('vouchers'));
    }

    public function vouchersAdd(Request $request)
    {
        abort_unless_permission('can_create_vouchers');

        $request->validate([
            'voucher'       => 'required|unique:vouchers,voucher_code|unique:vouchers_history,voucher_code',
            'credits'       => 'numeric',
            'expiry_date'   => 'required',
            'is_single_use' => 'required|boolean'
        ]);

        if ($request->credits <= 0 && !$request->item_ids)
            return redirect()->route('housekeeping.credits.vouchers')->with('message', 'You can\'t create a voucher without rewards!');

        Voucher::insert([
            'voucher_code'  => $request->voucher,
            'credits'       => $request->credits,
            'expiry_date'   => $request->expiry_date,
            'is_single_use' => $request->is_single_use
        ]);

        if ($request->item_ids) {
            foreach (explode(';', $request->item_ids) as $item) {
                $cataItem = CatalogueItem::find($item);
                Item::insert([
                    'voucher_code'          => $request->voucher,
                    'catalogue_sale_code'   => $cataItem->sale_code
                ]);
            }
        }

        create_staff_log('credits.vouchers.add', $request);

        return redirect()->route('housekeeping.credits.vouchers')->with('message', 'Voucher created!');
    }

    public function vouchersDelete(Request $request)
    {
        abort_unless_permission('can_create_vouchers');

        $voucher = Voucher::where('voucher_code', $request->id)->first();

        if (!$voucher) {
            return view('housekeeping.ajax.dialog_result', [
                'status'  => 'error',
                'message' => 'This voucher does not exist!',
            ]);
        }

        if ($voucher->is_single_use > 0) {
            $voucher->deleteItems();
            $voucher->delete();
        }

        create_staff_log('credits.vouchers.delete', $request);

        return view('housekeeping.ajax.dialog_result', [
            'status'  => 'success',
            'message' => 'Voucher deleted!',
        ]);
    }

    public function vouchersHistory(Request $request)
    {
        abort_unless_permission('can_create_vouchers');

        $query = History::with('user');

        if ($request->filled('username')) {
            $user = User::where('username', $request->username)->first();
            if ($user) {
                $query->where('user_id', $user->id);
            }
        }

        return view('housekeeping.moderation.credits.vouchers_history', [
            'vouchers' => $query->paginate(15),
        ]);
    }

    public function transactions(Request $request)
    {
        abort_unless_permission('can_edit_server_wordfilter');

        $logs = Transaction::when($request->filled('username'), function ($query) use ($request) {
            $query->whereHas('user', function ($sub) use ($request) {
                $sub->where('username', $request->username);
            });
        })
            ->with('user')
            ->paginate(25);

        return view('housekeeping.moderation.credits.transactions')->with('logs', $logs);
    }
}

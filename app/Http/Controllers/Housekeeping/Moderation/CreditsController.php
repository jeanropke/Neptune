<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\Catalogue\Item as CatalogueItem;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Voucher\Item;
use App\Models\VoucherHistory;
use App\Models\VoucherItem;
use Illuminate\Http\Request;

class CreditsController extends Controller
{
    public function vouchers()
    {
        $user = user();

        if (!$user || !$user->hasPermission('can_create_vouchers')) {
            return view('housekeeping.accessdenied');
        }

        $vouchers = Voucher::get();

        return view('housekeeping.moderation.credits.vouchers', compact('vouchers'));
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
        if (!user()->hasPermission('can_create_vouchers'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $voucher = Voucher::where('voucher_code', $request->id)->first();

        if (!$voucher)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This voucher does not exist!']);

        if ($voucher->is_single_use > 0) {
            $voucher->deleteItems();
            Voucher::where('voucher_code', $request->id)->delete();
        }

        create_staff_log('credits.vouchers.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'Voucher deleted!']);
    }

    public function vouchersHistory(Request $request)
    {
        if (!user()->hasPermission('can_create_vouchers'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $user = User::where('username', $request->username)->first();
        if ($user)
            return view('housekeeping.moderation.credits.vouchers_history')->with('vouchers', VoucherHistory::where('user_id', $user->id)->paginate(15));

        return view('housekeeping.moderation.credits.vouchers_history')->with('vouchers', VoucherHistory::paginate(15));
    }
}

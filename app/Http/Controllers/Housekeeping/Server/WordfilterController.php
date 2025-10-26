<?php

namespace App\Http\Controllers\Housekeeping\Server;

use App\Http\Controllers\Controller;
use App\Models\Neptune\Wordfilter;
use Illuminate\Http\Request;

class WordfilterController extends Controller
{
    public function listing(Request $request)
    {
        abort_unless_permission('can_edit_server_wordfilter');

        $words = Wordfilter::where('word', 'LIKE', "%$request->word%")->orderBy('word')->paginate(25);

        return view('housekeeping.server.wordfilter.listing')->with('words', $words);
    }

    public function new()
    {
        abort_unless_permission('can_edit_server_wordfilter');

        return view('housekeeping.server.wordfilter.new');
    }

    public function edit(Wordfilter $word)
    {
        abort_unless_permission('can_edit_server_wordfilter');

        return view('housekeeping.server.wordfilter.new')->with('word', $word);
    }

    public function save(Request $request)
    {
        abort_unless_permission('can_edit_server_wordfilter');

        $request->validate([
            'word'          => 'required|unique:wordfilter,word,' . $request->id,
            'is_bannable'   => 'required|boolean',
            'is_filterable' => 'required|boolean',
        ]);

        Wordfilter::updateOrCreate(
            ['id' => $request->id],
            [
                'word'          => $request->word,
                'is_bannable'   => $request->is_bannable,
                'is_filterable' => $request->is_filterable,
            ]
        );

        create_staff_log('wordfilter.save', $request);

        return redirect()->route('housekeeping.server.wordfilter')->with('message', 'Wordfilter saved!');
    }

    public function delete(Request $request)
    {
        if (!user()->hasPermission('can_edit_server_wordfilter'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $word = Wordfilter::find($request->id);

        if (!$word)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This wordfilter does not exist!']);

        $word->delete();

        create_staff_log('wordfilter.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Wordfilter deleted!']);
    }
}

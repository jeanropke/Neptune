<?php

namespace App\Http\Controllers;

use App\Models\Guild;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index($id)
    {
        return view('groups.page')->with([
            'isEdit'    => false,
            'group'     => Guild::find($id)
        ]);
    }

    public function discussions($id)
    {
        return view('groups.discussions')->with([
            'group' => Guild::find($id)
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Photo;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        return view('community.index');
    }

    public function fansites()
    {
        return view('community.fansites');
    }

    public function photos()
    {
        return view('community.photos')->with([
            'photos'    => Photo::orderBy('timestamp', 'DESC')->limit(20)->get()
        ]);
    }

    public function linktoolSearch(Request $request)
    {
        return $request->all();
    }
}

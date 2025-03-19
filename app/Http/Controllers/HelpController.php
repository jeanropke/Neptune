<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HelpController extends Controller
{
    public function index()
    {
        return view('help.index')->with([
            'top_stories' => Article::where('is_deleted', '0')->orderBy('created_at', 'desc')->take(3)->get(),
            'articles'    => Article::where('is_deleted', '0')->orderBy('created_at', 'desc')->skip(3)->take(5)->get()
        ]);
    }

    public function hotelWay() {
        return view('help.hotel_way');
    }

    public function tool()
    {
        return view('help.tool');
    }

    public function contactUs()
    {
        return view('help.contact_us');
    }

    public function iotGo()
    {
        return view('help.iot.go');
    }
}

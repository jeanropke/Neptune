<?php

namespace App\Http\Controllers;

class HelpController extends Controller
{
    public function index()
    {
        return view('help.index');
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

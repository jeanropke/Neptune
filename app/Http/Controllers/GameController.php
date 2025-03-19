<?php

namespace App\Http\Controllers;

class GameController extends Controller
{
    public function index()
    {
        return view('games.index');
    }
}

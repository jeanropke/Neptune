<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    public function index() {
        return view('admin.help.index');
    }
}

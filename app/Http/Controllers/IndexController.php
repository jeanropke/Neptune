<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CmsSetting;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function home()
    {
        return view('index')->with(
            [
                'top_stories' => Article::where('is_deleted', '0')->orderBy('created_at', 'desc')->take(3)->get(),
                'articles'    => Article::where('is_deleted', '0')->orderBy('created_at', 'desc')->skip(3)->take(5)->get()
            ]);
    }

    public function maintenance()
    {
        if(Auth::check())
        {
            if (Auth::user()->hasPermission('can_housekeeping')) {
                return redirect('/');
            }
            return view('maintenance');
        }

        $maintenance = CmsSetting::getSetting('hotel.maintenance');

        if($maintenance == 0)
            return redirect('/');

        return view('maintenance');
    }
}

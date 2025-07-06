<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XmasCalendarController extends Controller
{

    // hardcoded until i have all files :p
    public function calendar(Request $request)
    {
        return response('
<days>
    <daily>
        <title>No Snow Yet</title>
        <title2>A Brave Rastaman\'s Struggle for the Miracle of Xmas Snow</title2>
        <weather1>The day\'s forecast is: hot and sunny weather...</weather1>
        <weather2>Very hot!</weather2>
        <pre-dance>Yaga yaga! It\'s time fe me to work di miracle!</pre-dance>
        <croc>Dream on, dude...</croc>
        <post-dance>Ups. wh\'happen? Something\'s gone wrong on dis.</post-dance>
        <end1>But tomorrow\'s gonna be alright. Eh.</end1>
        <end2>In the meantime: dis is for yuh :)</end2>
        <present>
            <bodycopy>bodycopy</bodycopy>
            <title>title</title>
            <image>x_14.gif</image>
            <button>
                <btn>
                    <text>button1</text>
                    <link>link1</link>
                </btn>
                <btn>
                    <text>button2</text>
                    <link>link2</link>
                </btn>
            </button>
        </present>
    </daily>
</days>', 200)
            ->header('Content-Type', 'application/xml');
    }
}

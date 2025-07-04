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
        <title>title</title>
        <title2>title2</title2>
        <weather1>weather1</weather1>
        <weather2>weather2</weather2>
        <pre-dance>pre-dance</pre-dance>
        <croc>croc</croc>
        <post-dance>post-dance</post-dance>
        <end1>giveget</end1>
        <end2>giveget</end2>
        <present>
            <bodycopy>bodycopy</bodycopy>
            <title>title</title>
            <image>image</image>
            <button>
                <text>text</text>
                <link>link</link>
            </button>
            <button>
                <text>text</text>
                <link>link</link>
            </button>
        </present>
    </daily>
    <daily>
        <title>title</title>
        <title2>title2</title2>
        <weather1>weather1</weather1>
        <weather2>weather2</weather2>
        <pre-dance>pre-dance</pre-dance>
        <croc>croc</croc>
        <post-dance>post-dance</post-dance>
        <end1>giveget</end1>
        <end2>giveget</end2>
        <present>
            <bodycopy>bodycopy</bodycopy>
            <title>title</title>
            <image>image</image>
            <button>
                <text>text</text>
                <link>link</link>
            </button>
            <button>
                <text>text</text>
                <link>link</link>
            </button>
        </present>
    </daily>
    <daily>
        <title>title</title>
        <title2>title2</title2>
        <weather1>weather1</weather1>
        <weather2>weather2</weather2>
        <pre-dance>pre-dance</pre-dance>
        <croc>croc</croc>
        <post-dance>post-dance</post-dance>
        <end1>giveget</end1>
        <end2>giveget</end2>
        <present>
            <bodycopy>bodycopy</bodycopy>
            <title>title</title>
            <image>image</image>
            <button>
                <text>text</text>
                <link>link</link>
            </button>
            <button>
                <text>text</text>
                <link>link</link>
            </button>
        </present>
    </daily>
</days>', 200)
            ->header('Content-Type', 'application/xml');
    }
}

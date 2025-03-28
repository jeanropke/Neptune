<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('games.index');
    }

    public function dive()
    {
        return view('games.dive');
    }

    public function scores(Request $request)
    {
        return view('games.scores')->with([
            'scores'    => [],
            'gameId'    => $request->gameId
        ]);
    }

    public function battleballIndex()
    {
        return view('games.battleball.index');
    }

    public function battleballHowToPlay()
    {
        return view('games.battleball.how_to_play');
    }

    public function battleballHighScores()
    {
        return view('games.battleball.high_scores');
    }

    public function battleballChallenge()
    {
        return view('games.battleball.challenge');
    }

    public function snowstormIndex()
    {
        return view('games.snowstorm.index');
    }

    public function snowstormRules()
    {
        return view('games.snowstorm.rules');
    }

    public function snowstormHighScores()
    {
        return view('games.snowstorm.high_scores');
    }

    public function wobblesquabbleIndex()
    {
        return view('games.wobblesquabble.index');
    }
    public function wobblesquabbleHighScores()
    {
        return view('games.wobblesquabble.high_scores');
    }
}

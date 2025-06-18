<?php

/*
    Thanks to =dj.matias= on RageZone (https://forum.ragezone.com/threads/habbowood-2007-movie-maker-player.914221/)
    The HabboWood Movie Editor wouldn't have been possible without him. <3
*/

namespace App\Http\Controllers;

use App\Models\Habbowood\Movie;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class HabboMovieController extends Controller
{
    public function openEditor()
    {
        return view('entertainment.habbomovies.editor');
    }

    public function getFigureData(Request $request)
    {
        $user = User::where('username', 'LIKE', "%{$request->user}%")->select('figure', 'sex')->first();
        return "{$user->sex};{$user->figure}";
    }

    public function save(Request $request)
    {
        $movie = Movie::find($request->movie_id);
        if($movie) {
            $movie->update([
                'data' => $request->data
            ]);
        }
        else {
            $movie = Movie::create([
                'data'      => $request->data,
                'author_id' => user()->id
            ]);
        }
        return $movie->id;
    }

    public function movie(Request $request)
    {
        $movie = Movie::find($request->movieId);
        if(!$movie) return abort(404);

        return view('entertainment.habbomovies.movie')->with('movie', $movie);
    }

    public function movieXmlData(Request $request)
    {
        $movie = Movie::find($request->id);
        if(!$movie) return abort(404);

        return $movie->data;
    }

    public function showMovieAdmin(Request $request)
    {
        return view('entertainment.habbomovies.ajax.showmovieadmin');
    }

    public function showUnpublished(Request $request)
    {
        return 'showUnpublished';
    }

    public function rateMovie(Request $request)
    {
        if(!auth()) return;

        $movie = Movie::find($request->movieId);
        if(!$movie) return;

        $movie->addRating($request->newRating);
        return view('entertainment.habbowood.includes.moviestats')->with('movie', $movie);
    }
}

<?php

/*
    Thanks to =dj.matias= on RageZone (https://forum.ragezone.com/threads/habbowood-2007-movie-maker-player.914221/)
    The HabboWood Movie Editor wouldn't have been possible without him. <3
*/

namespace App\Http\Controllers;

use App\Models\Habbowood\Movie;
use DOMDocument;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class HabboMovieController extends Controller
{
    public function openEditor()
    {
        if (!user()) {
            return redirect()->route('auth.login', ['page' => 'habbomovies/private/openeditor']);
        }

        return view('entertainment.habbomovies.editor');
    }

    public function getFigureData(Request $request)
    {
        $user = User::where('username', $request->user)->select('figure', 'sex')->first();
        return "{$user->sex};{$user->figure}";
    }

    public function save(Request $request)
    {
        $xmlData = $request->data;

        // Verifica se o XML é válido
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        if (!$dom->loadXML($xmlData)) {
            return response('Invalid XML', 400);
        }

        $movieTag = $dom->getElementsByTagName('movie')->item(0);
        if (!$movieTag) {
            return response('Missing <movie> tag in XML', 400);
        }

        $movieId = $request->movie_id;
        $movie = $movieId ? Movie::find($movieId) : null;

        $data = [
            'data'      => $xmlData,
            'title'     => $movieTag->getAttribute('name'),
            'subtitle'  => $movieTag->getAttribute('subtitle')
        ];

        if ($movie) {
            $movie->update($data);
        } else {
            $data['author_id'] = user()->id;
            $movie = Movie::create($data);
        }

        return response($movie->id);
    }

    public function movie(Request $request)
    {
        $movie = Movie::find($request->movieId);

        if (!$movie) {
            abort(404, 'Movie not found.');
        }

        return view('entertainment.habbomovies.movie', compact('movie'));
    }

    public function movieXmlData(Request $request)
    {
        $movie = Movie::find($request->id);

        if (!$movie) {
            abort(404, 'Movie not found.');
        }

        return response($movie->data, 200)
            ->header('Content-Type', 'application/xml');
    }

    public function showMovieAdmin(Request $request)
    {
        return view('entertainment.habbomovies.ajax.showmovieadmin');
    }

    public function showUnpublished(Request $request)
    {
        return response('showUnpublished');
    }

    public function rateMovie(Request $request)
    {
        if (!user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $movie = Movie::find($request->movieId);
        if (!$movie) {
            return response()->json(['error' => 'Movie not found'], 404);
        }

        if (!is_numeric($request->newRating) || $request->newRating < 1 || $request->newRating > 5) {
            return response()->json(['error' => 'Invalid rating'], 422);
        }

        $movie->addRating($request->newRating);

        return view('entertainment.habbowood.includes.moviestats', compact('movie'));
    }
}

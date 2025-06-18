<?php

namespace App\Http\Controllers;

use App\Models\Habbowood\Movie;
use App\Models\StaffPick;
use Illuminate\Http\Request;

class EntertainmentController extends Controller
{
    public function habbowood()
    {
        $top = Movie::orderBy('rating', 'DESC')->limit(10)->get();
        $staff = StaffPick::where('pick_type', 'movie')->limit(10)->get();

        return view('entertainment.habbowood')->with([
            'top'   => $top,
            'staff' => $staff
        ]);
    }

    public function habbowoodCompetition()
    {
        $top = Movie::orderBy('rating', 'DESC')->limit(10)->get();
        $staff = StaffPick::where('pick_type', 'movie')->limit(10)->get();

        return view('entertainment.habbowood.competition')->with([
            'top'   => $top,
            'staff' => $staff
        ]);
    }

    public function habbowoodMovies()
    {
        $top = Movie::orderBy('rating', 'DESC')->limit(10)->get();
        $staff = StaffPick::where('pick_type', 'movie')->limit(10)->get();

        return view('entertainment.habbowood.movies')->with([
            'top'   => $top,
            'staff' => $staff
        ]);
    }

    public function habbowoodMoviePlayer(Request $request)
    {
        $top = Movie::orderBy('rating', 'DESC')->limit(10)->get();
        $staff = StaffPick::where('pick_type', 'movie')->limit(10)->get();
        $movie = Movie::find($request->id);
        if (!$movie)
            return abort(404);

        $movie->addView();

        return view('entertainment.habbowood.movieplayer')->with([
            'top'   => $top,
            'staff' => $staff,
            'movie' => $movie
        ]);
    }

    public function habbowoodShareMovie(Request $request)
    {
        $movie = Movie::find($request->id);
        if (!$movie)
            return abort(404);

        return view('entertainment.habbowood.sharemovie')->with('movie', $movie);
    }

    public function habbowoodMyMovies()
    {
        //TODO: add auth
        $movies = Movie::where('author_id', user()->id);
        if (!$movies)
            return abort(404);

        return view('entertainment.habbowood.mymovies')->with('movies', $movies);
    }
}

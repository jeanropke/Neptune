<?php

namespace App\Http\Controllers;

use App\Models\Habbowood\Movie;
use App\Models\StaffPick;
use Illuminate\Http\Request;

class EntertainmentController extends Controller
{
    public function habbowood()
    {
        $top = Movie::where('published', '1')->orderBy('rating', 'DESC')->limit(10)->get();
        $staff = StaffPick::where('pick_type', 'movie')->limit(10)->get();

        return view('entertainment.habbowood')->with([
            'top'   => $top,
            'staff' => $staff
        ]);
    }

    public function habbowoodCompetition()
    {
        $top = Movie::where('published', '1')->orderBy('rating', 'DESC')->limit(10)->get();
        $staff = StaffPick::where('pick_type', 'movie')->limit(10)->get();

        return view('entertainment.habbowood.competition')->with([
            'top'   => $top,
            'staff' => $staff
        ]);
    }

    public function habbowoodMovies()
    {
        $top = Movie::where('published', '1')->orderBy('rating', 'DESC')->limit(10)->get();
        $staff = StaffPick::where('pick_type', 'movie')->limit(10)->get();

        return view('entertainment.habbowood.movies')->with([
            'top'   => $top,
            'staff' => $staff
        ]);
    }

    public function habbowoodMoviePlayer(Request $request)
    {
        $top        = Movie::where('published', '1')->orderBy('rating', 'DESC')->limit(10)->get();
        $staff      = StaffPick::where('pick_type', 'movie')->limit(10)->get();
        $related    = Movie::where('published', '1')->limit(10)->inRandomOrder()->get();
        $movie = Movie::find($request->id);
        if (!$movie)
            return abort(404);

        $movie->addView();

        return view('entertainment.habbowood.movieplayer')->with([
            'top'       => $top,
            'staff'     => $staff,
            'related'   => $related,
            'movie'     => $movie
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
        if (!user())
            return redirect()->route('entertainment.habbowood');

        $movies = Movie::where('author_id', user()->id);
        if (!$movies)
            return abort(404);

        return view('entertainment.habbowood.mymovies')->with('movies', $movies);
    }
}

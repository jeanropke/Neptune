<?php

namespace App\Http\Controllers;

use App\Models\Habbowood\Movie;
use App\Models\Staff\Pick;
use Illuminate\Http\Request;

class EntertainmentController extends Controller
{
    public function habbowood()
    {
        return view('entertainment.habbowood')->with($this->getHabbowoodData());
    }

    public function habbowoodCompetition()
    {
        return view('entertainment.habbowood.competition')->with($this->getHabbowoodData());
    }

    public function habbowoodMovies()
    {
        return view('entertainment.habbowood.movies')->with($this->getHabbowoodData());
    }

    public function habbowoodMoviePlayer(Request $request)
    {
        $movie      = Movie::with('author')->findOrFail($request->id);
        $related    = Movie::where('published', '1')->where('id', '!=', $movie->id)->inRandomOrder()->limit(10)->get();

        $movie->addView();

        return view('entertainment.habbowood.movieplayer')->with([
            ...$this->getHabbowoodData(),
            'related'   => $related,
            'movie'     => $movie
        ]);
    }

    public function habbowoodShareMovie(Movie $movie)
    {
        return view('entertainment.habbowood.sharemovie', compact('movie'));
    }

    public function habbowoodShareMovieTell()
    {
        return view('entertainment.habbowood.sharemovie_tell');
    }

    public function habbowoodMyMovies()
    {
        $user = user();

        if (!$user) {
            return redirect()->route('entertainment.habbowood');
        }

        $movies = $user->movies()->get();

        return view('entertainment.habbowood.mymovies', compact('movies'));
    }

    private function getHabbowoodData(): array
    {
        $top = Movie::where('published', '1')->with('author')->orderByDesc('rating')->limit(10)->get();
        $staff = Pick::where('pick_type', 'movie')->whereHas('movie.author')->with('movie.author')->limit(10)->get();

        return compact('top', 'staff');
    }
}

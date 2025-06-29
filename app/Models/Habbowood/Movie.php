<?php

namespace App\Models\Habbowood;

use Carbon\Carbon;
use DOMDocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    protected $table = 'cms_habbowood_movies';

    protected $fillable = [
        'data',
        'title',
        'subtitle',
        'author_id',
        'genre',
        'views',
        'rating',
        'votes',
        'published'
    ];

    //TODO: remove this and use user() instead
    public function getAuthor()
    {
        return User::find($this->author_id);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function getGenre()
    {
        return trans("habbowood.genre.$this->genre");
    }

    private function getRatings()
    {
        return MovieRating::where('movie_id', $this->id);
    }

    private function getAverageRate()
    {
        $ratings = $this->getRatings();
        return round($ratings->select(DB::raw("SUM(rating) AS rating"))->get()[0]->rating / ($this->votes > 0 ? $ratings->votes : 1));
    }

    public function alreadyRated()
    {
        return $this->getRatings()->where('user_id', user()->id)->first();
    }

    public function addRating($rate)
    {
        if ($this->alreadyRated()) return;
        if ($rate < 1 || $rate > 5) return;

        MovieRating::insert([
            'user_id'   => user()->id,
            'rating'    => $rate,
            'movie_id'  => $this->id
        ]);

        $this->update([
            'rating'    => $this->getAverageRate(),
        ]);

        $this->increment('votes');
    }

    public function alreadyWatched()
    {
        $view = MovieView::where([['ip_address', request()->ip()], ['movie_id', $this->id]])->orderBy('created_at', 'DESC')->first();
        if ($view && $view->created_at->diffInDays(Carbon::now()) < 28) {
            return true;
        }
        return false;
    }

    public function addView()
    {
        if (!$this->alreadyWatched()) {
            MovieView::insert([
                'ip_address'   => request()->ip(),
                'movie_id'  => $this->id
            ]);
            $this->increment('views');
        }
    }
}

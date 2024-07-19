<?php

namespace App\Http\Controllers;
use App\Models\Movie;


use Illuminate\Http\Request;

class MovieController extends Controller
{
    //
    public function displayAllMovies() {
        return Movie::with(['directors', 'actors', 'genres', 'ratings.reviewer'])->get();
    }

    public function viewSpecificMovie($id) {
        return Movie::with(['directors', 'actors', 'genres', 'ratings.reviewer'])->findOrFail($id);
    }

    public function viewMoviesWithGenres()
    {
        $movies = Movie::with('genres')->get();
        
        return response()->json($movies);
    }

    public function viewMoviesByGenreTitle($gen_title)
    {
        $movies = Movie::whereHas('genres', function($query) use ($gen_title) {
            $query->where('gen_title', $gen_title);
        })->with('genres')->get();

        return response()->json($movies);
    }

    public function viewMoviesWithRatings()
    {
        $movies = Movie::with(['ratings.reviewer'])->get();
        
        return response()->json($movies);
    }
}

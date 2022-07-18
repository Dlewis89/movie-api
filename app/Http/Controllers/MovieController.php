<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return [
            'data' => Movie::all()
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return array
     */
    public function store(StoreMovieRequest $request)
    {
        Movie::create([
            'name' => $request->name,
            'release_year' => $request->release_year,
            'rating' => $request->rating
        ]);

        return [
            'ok' => true
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return array
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $movie->update([
            'name' => $request->name ?? $movie->name,
            'release_year' => $request->release_year ?? $movie->release_year,
            'rating' => $request->rating ?? $movie->rating
        ]);

        return [
            'ok' => true
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return array
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return [
            'ok' => true
        ];
    }
}

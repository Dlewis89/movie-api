<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json([
                'data' => Movie::all()
            ]);
        } catch (Exception $e) {
            return response()->json('Something went wrong', 500);
        }

    }

    /**
     * Display the specified movie.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Movie $movie): JsonResponse
    {
        try {
            return response()->json([
                'data' => $movie
            ]);
        } catch(Exception $e) {
            return response()->json('Something went wrong', 500);
        }
    }

    /**
     * Store a newly created movie in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreMovieRequest $request): JsonResponse
    {
        try {
            $movie = Movie::create($request->validated());

            return response()->json([
                'data' => $movie
            ], 201);
        } catch(Exception $e) {
            return response()->json('Something went wrong!', 500);
        }
    }

    /**
     * Update the specified movie in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateMovieRequest $request, Movie $movie): JsonResponse
    {
        try {
            $movie->update([
                'name' => $request->name ?? $movie->name,
                'release_year' => $request->release_year ?? $movie->release_year,
                'rating' => $request->rating ?? $movie->rating
            ]);

            $movie->save();

            return response()->json([
                'data' => $movie
            ]);
        } catch(Exception $e) {
            return response()->json('Something went wrong', 500);
        }
    }

    /**
     * Remove the specified movie from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Movie $movie): JsonResponse
    {
        try {
            $movie->delete();
            return response()->json('Deleted successfully');
        } catch(Exception $e) {
            return response()->json('Something went wrong', 500);
        }
    }
}

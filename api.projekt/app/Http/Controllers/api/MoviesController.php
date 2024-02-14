<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::get()->toJson(JSON_PRETTY_PRINT);
        return response($movies, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'poster' => 'required|image|mimes:jpeg,png,jpg,gif,jfif',
                'release' => 'required|date_format:Y',
                'runtime' => 'required|string',
                'description' => 'required|string'
            ]
        );

        $path = $request->file('poster')->store('images', 'public');

        $movie = new Movie();
        $movie->name = $request->name;
        $movie->poster = $path;
        $movie->release = $request->release;
        $movie->runtime = $request->runtime;
        $movie->description = $request->description;
        if($movie->save()){
            return response()->json(['message' => 'Movie created successfully'
            ], 201);
        }
            return response()->json(['message' => 'Something went wrong'
            ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(Movie::where('id', $id)->exists()){
            $movie = Movie::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($movie, 200);
        } else {
            return response()->json([
                'message' => 'Movie not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'string',
                'poster' => 'image|mimes:jpeg,png,jpg,gif,jfif',
                'release' => 'date_format:Y',
                'runtime' => 'string',
                'description' => 'string'
            ]
        );

        if(Movie::where('id', $id)->exists()){

            $movie = Movie::find($id);
            $movie->name = is_null($request->name) ? $movie->name : $request->name;
            $movie->release = is_null($request->release) ? $movie->release : $request->release;
            $movie->runtime = is_null($request->runtime) ? $movie->runtime : $request->runtime;
            $movie->description = is_null($request->description) ? $movie->description : $request->description;

            if ($request->hasFile('poster')) {
                $path = $request->file('poster')->store('images', 'public');
                $movie->poster = $path;
            }

            $movie->save();

            return response($movie, 200);
        } else {
            return response()->json([
                'message' => 'Movie not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Movie::where('id', $id)->exists()){

            $movie = Movie::find($id);
            $movie->delete();

            return response()->json([
                'message' => 'Movie deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Movie not found'
            ], 404);
        }
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::get()->toJson(JSON_PRETTY_PRINT);
        return response($genres, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
            ]
        );

        $genres = new Genre();
        $genres->name = $request->name;
        if($genres->save()){
            return response()->json(['message' => 'Genre created successfully'
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
        if(Genre::where('id', $id)->exists()){
            $genres = Genre::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($genres, 200);
        } else {
            return response()->json([
                'message' => 'Genre not found'
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
            ]
        );

        if(Genre::where('id', $id)->exists()){

            $genres = Genre::find($id);
            $genres->name = is_null($request->name) ? $genres->name : $request->name;

            $genres->save();

            return response($genres, 200);
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
        if(Genre::where('id', $id)->exists()){

            $genre = Genre::find($id);
            $genre->delete();

            return response()->json([
                'message' => 'Genre deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Genre not found'
            ], 404);
        }
    }
}

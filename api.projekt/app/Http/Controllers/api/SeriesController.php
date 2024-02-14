<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Serie::get()->toJson(JSON_PRETTY_PRINT);
        return response($series, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'poster' => 'required|image|mimes:jpeg,png,jpg,gif',
                'release' => 'required|string',
                'runtime' => 'required|string',
                'description' => 'required|string'
            ]
        );

        $path = $request->file('poster')->store('images', 'public');

        $series = new Serie();
        $series->name = $request->name;
        $series->poster = $path;
        $series->release = $request->release;
        $series->runtime = $request->runtime;
        $series->description = $request->description;
        if($series->save()){
            return response()->json(['message' => 'Series created successfully'
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
        if(Serie::where('id', $id)->exists()){
            $series = Serie::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($series, 200);
        } else {
            return response()->json([
                'message' => 'Series not found'
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

        if(Serie::where('id', $id)->exists()){

            $series = Serie::find($id);
            $series->name = is_null($request->name) ? $series->name : $request->name;
            $series->release = is_null($request->release) ? $series->release : $request->release;
            $series->runtime = is_null($request->runtime) ? $series->runtime : $request->runtime;
            $series->description = is_null($request->description) ? $series->description : $request->description;

            if ($request->hasFile('poster')) {
                $path = $request->file('poster')->store('images', 'public');
                $series->poster = $path;
            }

            $series->save();

            return response($series, 200);
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
        if(Serie::where('id', $id)->exists()){

            $series = Serie::find($id);
            $series->delete();

            return response()->json([
                'message' => 'Series deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Series not found'
            ], 404);
        }
    }
}

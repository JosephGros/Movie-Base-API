<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $season = Season::get()->toJson(JSON_PRETTY_PRINT);
        return response($season, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "number_of_episodes" => "required|string",
            "series_id" => "required|foreignId"
        ]);

        $season = new Serie();
        $season->name = $request->name;
        $season->number_of_episodes = $request->number_of_episodes;
        $season->series_id = $request->series_id;
        $season->save();

        if($season->save()){
            return response()->json(['message' => 'Season created successfully'
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

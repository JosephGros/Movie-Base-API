<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $episode = Episode::get()->toJson(JSON_PRETTY_PRINT);
        return response($episode, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "episode_count" => "required|string",
            "name" => "required|string",
            "runtime" => "required|string",
            "description" => "required|string",
            "season_id" => "required|foreignId"
        ]);

        $episode = new Episode();
        $episode->episode_count = $request->episode_count;
        $episode->name = $request->name;
        $episode->runtime = $request->runtime;
        $episode->description = $request->description;
        $episode->season_id = $request->season_id;
        $episode->save();

        if($episode->save()){
            return response()->json(['message' => 'Episode created successfully'
            ], 201);
        } else {
            return response()->json(['message' => 'Something went wrong'
            ], 500);
        }
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

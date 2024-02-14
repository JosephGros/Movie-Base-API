<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = Actor::get()->toJson(JSON_PRETTY_PRINT);
        return response($actors, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,jfif',
                'birth_date' => 'required|date',
            ]
        );

        $path = $request->file('profile_picture')->store('images', 'public');

        $actor = new Actor();
        $actor->name = $request->name;
        $actor->profile_picture = $path;
        $actor->birth_date = $request->birth_date;
        $actor->death_date = $request->death_date;
        if($actor->save()){
            return response()->json(['message' => 'Actor profile created successfully'
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
        if(Actor::where('id', $id)->exists()){
            $actor = Actor::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($actor, 200);
        } else {
            return response()->json([
                'message' => 'Actor not found'
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
                'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,jfif',
                'birth_date' => 'date',
                'death_date' => 'date'
            ]
        );

        if(Actor::where('id', $id)->exists()){

            $actor = Actor::find($id);
            $actor->name = is_null($request->name) ? $actor->name : $request->name;
            $actor->birth_date = is_null($request->birth_date) ? $actor->birth_date : $request->birth_date;
            $actor->death_date = is_null($request->death_date) ? $actor->death_date : $request->death_date;

            if ($request->hasFile('profile_picture')) {
                $path = $request->file('profile_picture')->store('images', 'public');
                $actor->profile_picture = $path;
            }

            $actor->save();

            return response($actor, 200);
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
        if(Actor::where('id', $id)->exists()){

            $actor = Actor::find($id);
            $actor->delete();

            return response()->json([
                'message' => 'Actor deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Actor not found'
            ], 404);
        }
    }
}

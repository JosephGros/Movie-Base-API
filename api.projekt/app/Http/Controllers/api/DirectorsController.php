<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::get()->toJson(JSON_PRETTY_PRINT);
        return response($directors, 200);
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

        $director = new Director();
        $director->name = $request->name;
        $director->profile_picture = $path;
        $director->birth_date = $request->birth_date;
        $director->death_date = $request->death_date;
        if($director->save()){
            return response()->json(['message' => 'Director profile created successfully'
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
        if(Director::where('id', $id)->exists()){
            $directors = Director::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($directors, 200);
        } else {
            return response()->json([
                'message' => 'Director not found'
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

        if(Director::where('id', $id)->exists()){

            $director = Director::find($id);
            $director->name = is_null($request->name) ? $director->name : $request->name;
            $director->birth_date = is_null($request->birth_date) ? $director->birth_date : $request->birth_date;
            $director->death_date = is_null($request->death_date) ? $director->death_date : $request->death_date;

            if ($request->hasFile('profile_picture')) {
                $path = $request->file('profile_picture')->store('images', 'public');
                $director->profile_picture = $path;
            }

            $director->save();

            return response($director, 200);
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
        if(Director::where('id', $id)->exists()){

            $director = Director::find($id);
            $director->delete();

            return response()->json([
                'message' => 'Director deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Director not found'
            ], 404);
        }
    }
}

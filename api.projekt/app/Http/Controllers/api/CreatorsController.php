<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Creator;
use Illuminate\Http\Request;

class CreatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creators = Creator::get()->toJson(JSON_PRETTY_PRINT);
        return response($creators, 200);
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

        $creator = new Creator();
        $creator->name = $request->name;
        $creator->profile_picture = $path;
        $creator->birth_date = $request->birth_date;
        $creator->death_date = $request->death_date;
        if($creator->save()){
            return response()->json(['message' => 'Creator profile created successfully'
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
        if(Creator::where('id', $id)->exists()){
            $creators = Creator::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($creators, 200);
        } else {
            return response()->json([
                'message' => 'Creator not found'
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

        if(Creator::where('id', $id)->exists()){

            $creators = Creator::find($id);
            $creators->name = is_null($request->name) ? $creators->name : $request->name;
            $creators->birth_date = is_null($request->birth_date) ? $creators->birth_date : $request->birth_date;
            $creators->death_date = is_null($request->death_date) ? $creators->death_date : $request->death_date;

            if ($request->hasFile('profile_picture')) {
                $path = $request->file('profile_picture')->store('images', 'public');
                $creators->profile_picture = $path;
            }

            $creators->save();

            return response($creators, 200);
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
        if(Creator::where('id', $id)->exists()){

            $creator = Creator::find($id);
            $creator->delete();

            return response()->json([
                'message' => 'Creator deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Creator not found'
            ], 404);
        }
    }
}

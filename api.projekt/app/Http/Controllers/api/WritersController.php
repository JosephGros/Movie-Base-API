<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Writer;
use Illuminate\Http\Request;

class WritersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $writers = Writer::get()->toJson(JSON_PRETTY_PRINT);
        return response($writers, 200);
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

        $writer = new Writer();
        $writer->name = $request->name;
        $writer->profile_picture = $path;
        $writer->birth_date = $request->birth_date;
        $writer->death_date = $request->death_date;
        if($writer->save()){
            return response()->json(['message' => 'Writer profile created successfully'
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
        if(Writer::where('id', $id)->exists()){
            $writers = Writer::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($writers, 200);
        } else {
            return response()->json([
                'message' => 'Writer not found'
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

        if(Writer::where('id', $id)->exists()){

            $writer = Writer::find($id);
            $writer->name = is_null($request->name) ? $writer->name : $request->name;
            $writer->birth_date = is_null($request->birth_date) ? $writer->birth_date : $request->birth_date;
            $writer->death_date = is_null($request->death_date) ? $writer->death_date : $request->death_date;

            if ($request->hasFile('profile_picture')) {
                $path = $request->file('profile_picture')->store('images', 'public');
                $writer->profile_picture = $path;
            }

            $writer->save();

            return response($writer, 200);
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
        if(Writer::where('id', $id)->exists()){

            $writer = Writer::find($id);
            $writer->delete();

            return response()->json([
                'message' => 'Writer deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Writer not found'
            ], 404);
        }
    }
}

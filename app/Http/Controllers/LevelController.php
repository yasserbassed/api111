<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelevelRequest;
use App\Http\Requests\UpdatelevelRequest;
use App\Models\level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'level' => 'required|string|max:255',
        ]);
        if ($validated->failed()) {
            return response()->json($validated->errors(), 422);
        }
        try {
            $levels = Level::create([
                'level' => $request->level,
            ]);

            return response()->json([
                'level' => $levels,
            ], 200);
        } catch (\Throwable $exception) {

            return response()->json([
                'error' => $exception->getMessage(),
            ], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelevelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelevelRequest $request, level $level)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(level $level)
    {
        //
    }
}

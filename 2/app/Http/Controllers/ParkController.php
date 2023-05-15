<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkRequest;
use App\Models\Park;
use Illuminate\Http\JsonResponse;

class ParkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $park = Park::query()->where('status', true)->get();

        return response()->json([
            'data' => $park,
            'count' => $park->count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ParkRequest $request)
    {
        if (Park::query()->where('status', true)->count() == 10) {
            return response()->json([
                'data' => null,
                'message' => 'full'
            ]);
        }
        $park = Park::query()
            ->create([
                'name' => $request->name,
                'status' => true
            ]);

        return response()->json([
            'data' => $park
        ], 201);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Park $park
     * @return JsonResponse
     */
    public function destroy(Park $park)
    {
        $park->update([
            'status' => false
        ]);
        $park->delete();

        return response()->json([
            'message' => 'delete'
        ]);
    }
}

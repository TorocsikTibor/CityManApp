<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use App\Services\CityService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(): View|Application|Factory
    {
        $counties = County::all();

        return view('home', ['counties' => $counties]);
    }

    public function getCities(int $id): JsonResponse
    {
        $cities = City::where('county_id', $id)->get();

        return response()->json($cities);
    }

    public function create(Request $request, CityService $cityService): JsonResponse
    {
        $city = $cityService->create($request->input('county_id'), $request->input('name'));

        return response()->json($city);
    }

    public function update(Request $request, int $id, CityService $cityService): JsonResponse
    {
        $cityService->update($id, $request->input('name'));

        return response()->json();
    }

    public function delete(int $id, CityService $cityService): JsonResponse
    {
        $cityService->delete($id);

        return response()->json();
    }
}

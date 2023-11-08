<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $counties = County::all();
        return view('home', ['counties' => $counties]);
    }

    public function getCities($id)
    {
        $cities = City::where('county_id', $id)->get();

        return response()->json($cities);
    }

    public function create(Request $request)
    {
        $city = new City;
        $city->county_id = $request->input('county_id');
        $city->name = $request->input('name');
        $city->save();

        return response()->json([$city]);
    }

    public function update(Request $request, int $id)
    {
        $city = City::find($id);
        $city->name = $request->input('name');
        $city->save();

        return response()->json('success');
    }
}

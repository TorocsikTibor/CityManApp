<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $counties = County::all();
        return view('home', ['counties' => $counties]);
    }
}

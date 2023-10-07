<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::where('deleted_at', NULL)->latest()->take(6)->get();
        $trending_properties = Property::where('deleted_at', NULL)->orderBy('clicks', 'DESC')->take(3)->get();

        return view('pages.index',[
            'properties'          => $properties,
            'trending_properties' => $trending_properties
        ]);
    }

    public function dashboard()
    {
        return view('pages.dashboard.index');
    }
}

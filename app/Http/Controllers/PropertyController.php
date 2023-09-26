<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {

    }

    public function indexDashboard()
    {
        return view('pages.dashboard.properties.index');
    }

    public function add(Request $request)
    {
        if($request->method() == "GET") {
            return view('pages.dashboard.properties.add');
        }

        try {
            
        } catch (\Exception $exception) {
            return back()->withError('An error has occurred failed to add new property');
        }
    }
}

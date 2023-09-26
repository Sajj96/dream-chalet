<?php

namespace App\Http\Controllers;

use App\Models\HouseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AmenityController extends Controller
{
    public function index()
    {
        return view('dashboard.amenities.index');
    }

    public function add(Request $request)
    {
        if($request->method() == "GET") {
            return view('dashboard.amenities.add');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        try {
            $house_type = HouseType::find($request->name);

            if($house_type) {
                return back()->with('warning', 'House type already exist');
            }

            $house_type = HouseType::create([
                'name' => ucfirst($request->name)
            ]);

            if($house_type) {
                return redirect('/dashboard/house-types')->withSuccess('House type added successfully');
            }
        } catch (\Exception $exception) {
            return back()->withError('An error has occurred failed to add house type');
        }
    }
}

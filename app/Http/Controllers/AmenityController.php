<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\HouseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::get();
        return view('pages.dashboard.amenities.index', ['amenities' => $amenities]);
    }

    public function add(Request $request)
    {
        if($request->method() == "GET") {
            return view('pages.dashboard.amenities.add');
        }

        $validator = Validator::make($request->all(), [
            'amenity' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        try {
            
            $amenities = $request->amenity;
            if (!is_array($amenities)) {
                $amenities = [$request->amenity];
            }

            foreach($amenities as $amenity) {
                Amenity::updateOrCreate(
                    [
                        'name' => $amenity
                    ],
                    [
                        'name' => $amenity
                    ]
                );
            }

            return redirect('/dashboard/amenities')->withSuccess('Amenities added successfully');
        } catch (\Exception $exception) {
            return back()->withError('An error has occurred failed to add amenity');
        }
    }

    public function delete(Request $request) {
        try {
            if ($request->has('amenity_id')) {
                $amenity = Amenity::find($request->input('amenity_id'));
                $amenity->delete();
                return redirect('/dashboard/amenities')->withSuccess('Amenity deleted successfully');
            }
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return redirect('/dashboard/amenities')->withError('Amenity could not be deleted');
    }
}

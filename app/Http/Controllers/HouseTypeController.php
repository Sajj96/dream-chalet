<?php

namespace App\Http\Controllers;

use App\Models\HouseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HouseTypeController extends Controller
{
    public function index()
    {
        $house_types = HouseType::get();
        return view('pages.dashboard.house_types.index', ['house_types' => $house_types]);
    }

    public function add(Request $request)
    {
        if($request->method() == "GET") {
            return view('pages.dashboard.house_types.add');
        }

        $validator = Validator::make($request->all(), [
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        try {

            $types = $request->type;
            if (!is_array($types)) {
                $types = [$request->type];
            }

            foreach($types as $type) {
                HouseType::updateOrCreate(
                    [
                        'name' => $type
                    ],
                    [
                        'name' => $type
                    ]
                );
            }

            return redirect('/dashboard/house-types')->withSuccess('House type added successfully');
        } catch (\Exception $exception) {
            return back()->withError('An error has occurred failed to add house type');
        }
    }

    public function delete(Request $request) {
        try {
            if ($request->has('type_id')) {
                $house_type = HouseType::find($request->input('type_id'));
                $house_type->delete();
                return redirect('/dashboard/house-types')->withSuccess('House type deleted successfully');
            }
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return redirect('/dashboard/house-types')->withError('House type could not be deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StageController extends Controller
{
    public function index()
    {
        $stages = Stage::get();
        return view('pages.dashboard.house_stages.index', ['stages' => $stages]);
    }

    public function add(Request $request)
    {
        if($request->method() == "GET") {
            return view('pages.dashboard.house_stages.add');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        try {
            $stage = Stage::find($request->name);

            if($stage) {
                return back()->with('warning', 'Development stage already exist');
            }

            $stage = Stage::create([
                'name' => $request->name
            ]);

            if($stage) {
                return redirect('/dashboard/development-stages')->withSuccess('Development stage added successfully');
            }
        } catch (\Exception $exception) {
            return back()->withError('An error has occurred failed to add development stage');
        }
    }

    public function delete(Request $request) {
        try {
            if ($request->has('stage_id')) {
                $stage = Stage::find($request->input('stage_id'));
                $stage->delete();
                return redirect('/dashboard/amenities')->withSuccess('Development stage deleted successfully');
            }
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return redirect('/dashboard/amenities')->withError('Development stage could not be deleted');
    }
}

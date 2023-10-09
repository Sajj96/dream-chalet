<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'email'     => 'required|string',
            'rating'    => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => 'Please fill out all required fields!']);
        }

        try {

            $user = Auth::user();

            DB::beginTransaction();
            $review = new Review;
            $review->user_id = $user->id;
            $review->name    = $request->full_name;
            $review->email   = $request->email;
            $review->property_id   = $request->property_id;
            $review->comments = $request->comment;
            $review->star_rating = $request->rating;
            if ($review->save()) {
                DB::commit();
                return back()->with(['success' => 'Your review has been submitted successfully!']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => 'Something went wrong while adding review!']);
        }
    }
}

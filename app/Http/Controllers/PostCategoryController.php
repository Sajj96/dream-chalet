<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::get();
        return view('pages.dashboard.posts.categories.index', ['categories' => $categories]);
    }

    public function add(Request $request)
    {
        if($request->method() == "GET") {
            return view('pages.dashboard.posts.categories.add');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        try {

            $category_names = $request->name;
            if (!is_array($category_names)) {
                $category_names = [$request->name];
            }

            foreach($category_names as $name) {
                PostCategory::updateOrCreate(
                    [
                        'name' => $name
                    ],
                    [
                        'name' => $name
                    ]
                );
            }

            return redirect('/dashboard/posts/categories')->withSuccess('Post category added successfully');
        } catch (\Exception $exception) {
            return back()->withError('An error has occurred failed to add post category');
        }
    }

    public function delete(Request $request) {
        try {
            if ($request->has('category_id')) {
                $category = PostCategory::find($request->input('category_id'));
                $category->delete();
                return redirect('/dashboard/posts/categories')->withSuccess('Post category deleted successfully');
            }
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return redirect('/dashboard/posts/categories')->withError('Post category could not be deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\DataTables\PostsDataTable;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index(PostsDataTable $datatable)
    {
        return $datatable->render('pages.dashboard.posts.index');
    }

    public function getAll()
    {
        $posts = Post::whereStatus(1)->get();
        return view('pages.posts.index', [
            'posts' => $posts
        ]);
    }

    public function view($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return back()->withError('Post not found');
        }

        return view('pages.posts.view', [
            'post' => $post
        ]);
    }

    public function add(Request $request)
    {
        if($request->method() == "GET") {
            $categories = PostCategory::get();
            return view('pages.dashboard.posts.add',[
                'categories' => $categories
            ]);
        }

        $validator = Validator::make($request->all(), [
            'title'    => 'required|string',
            'category' => 'required|integer',
            'content'  => 'required|string',
            'image'    => 'image|mimes:jpg,jpeg,png,gif',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        try {

            $post = Post::create([
                'title' => $request->title,
                'post_category_id' => $request->category,
                'content' => $request->content,
                'thumbnail'     => "https://",
                'status' => $request->status
            ]);

            if ($request->hasFile('image')) {

                $path = storage_path('/app/public/posts/thumbnails/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $thumbnail = $request->image->getClientOriginalName();
                $thumbnailExtension = $request->file('image')->extension();

                $thumbnail = sprintf("%s_%s_THUMBNAIL.%s", uniqid(),date("YmdHis"), $thumbnailExtension);
                $thumbnailImg = Image::make($request->file('image')->getRealPath());
                $thumbnailImg->resize(1076, 509);

                $thumbnailImg->save(storage_path('/app/public/posts/thumbnails/' . $thumbnail),90);

                $thumbnailLink = url('storage/posts/thumbnails/'.$thumbnail);

                $post->update([
                    'thumbnail'  => $thumbnailLink
                ]);
            }

            return redirect('/dashboard/posts')->withSuccess('Post added successfully');
        } catch (\Exception $exception) {
            return back()->withError('An error has occurred failed to add post');
        }
    }

    public function edit(Request $request, $id = null)
    {
        if (empty($id) && $request->has('id')) {
            $id = $request->id;
        }

        $post = Post::find($id);
        if (!$post) {
            return redirect('/dashboard/posts')->withError('Post not found!');
        }

        if($request->method() == "GET") {
            $categories = PostCategory::get();
            return view('pages.dashboard.posts.edit',[
                'categories' => $categories,
                'post' => $post
            ]);
        }

        $validator = Validator::make($request->all(), [
            'title'    => 'required|string',
            'category' => 'required|integer',
            'content'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        try {

            $post->title = $request->title;
            $post->post_category_id = $request->category;
            $post->content = $request->content;
            $post->thumbnail     = "https://";
            $post->status = $request->status;
            $post->save();

            if ($request->hasFile('image')) {

                $path = storage_path('/app/public/posts/thumbnails/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $thumbnail = $request->image->getClientOriginalName();
                $thumbnailExtension = $request->file('image')->extension();

                $thumbnail = sprintf("%s_%s_THUMBNAIL.%s", uniqid(),date("YmdHis"), $thumbnailExtension);
                $thumbnailImg = Image::make($request->file('image')->getRealPath());
                $thumbnailImg->resize(1076, 509);

                $thumbnailImg->save(storage_path('/app/public/posts/thumbnails/' . $thumbnail),90);

                $thumbnailLink = url('storage/posts/thumbnails/'.$thumbnail);

                $post->update([
                    'thumbnail'  => $thumbnailLink
                ]);
            }

            return redirect('/dashboard/posts')->withSuccess('Post updated successfully');
        } catch (\Exception $exception) {
            return back()->withError('An error has occurred failed to update post');
        }
    }

    public function delete(Request $request) {
        try {
            if ($request->has('post_id')) {
                $post = Post::find($request->input('post_id'));
                $post->delete();
                return redirect('/dashboard/posts')->withSuccess('Post deleted successfully');
            }
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return redirect('/dashboard/posts')->withError('Post could not be deleted');
    }
}

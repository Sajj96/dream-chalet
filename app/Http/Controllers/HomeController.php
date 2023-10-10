<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Property;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::where('deleted_at', NULL)->latest()->take(6)->get();
        $trending_properties = Property::where('deleted_at', NULL)->orderBy('clicks', 'DESC')->take(3)->get();
        $posts = Post::where('deleted_at', NULL)->latest()->take(3)->get();

        return view('pages.index',[
            'properties'          => $properties,
            'trending_properties' => $trending_properties,
            'posts' => $posts
        ]);
    }

    public function dashboard()
    {
        $transactions = Transaction::whereStatus(Transaction::STATUS_NOTPAID)->count();
        $users = User::where('user_type', User::NORMAL_USER)->count();
        $properties = Property::count();
        $inquiries = Inquiry::whereStatus(Inquiry::STATUS_PROCESSING)->count();

        return view('pages.dashboard.index', [
            'transactions' => $transactions,
            'users' => $users,
            'properties' => $properties,
            'inquiries' => $inquiries,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserDashbordController extends Controller
{
    public function index(User $user)
    {
        $user=auth()->user();
        return view('dashbord')->with('user',$user);
    }
    public function UserPost(User $user)
    {
        $posts = Post::where('user_id',auth()->user()->id)->latest()->withTrashed()->Paginate(15);
        return view('post.index')->with('posts',$posts);
    }
}

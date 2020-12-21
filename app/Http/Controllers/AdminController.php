<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::with(['posts'])->paginate(10);
        return view('users.index')->with('users',$users);
    }

    public function show(User $user)
    {
        $users = User::with(['posts'])->paginate(10);
        return view('users.show')->with('user',$user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->route('users.index')
            ->with('staus', 'user deleted sucesfully');
    }

    public function deactive(User $user)
    {
        $user->activity=!$user->activity;
        $user->save();
        return redirect()
            ->route('users.index')
            ->with('staus', 'user deactivate sucesfully');
    }
}

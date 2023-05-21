<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Follower;
use Illuminate\Support\Facades\Route;

class UsernameController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $users = User::all();
        $posts = Post::all();
        $followers = Follower::all();
        $route = Route::current();
        $routeName = $route->getName();
        $usersWithRoles = User::has('roles')->get();

        return view('user.show')->with([
            'user' => $user,
            'users' => $users,
            'followers' => $followers,
            'posts' => $posts,
            'routeName' => $routeName,
            'usersWithRoles' => $usersWithRoles
        ]);
    }
}

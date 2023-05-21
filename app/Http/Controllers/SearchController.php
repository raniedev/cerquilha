<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Question;
use App\Models\Follower;
use App\Models\Like;
use App\Models\LikeVideo;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

class SearchController extends Controller
{
    public function index() {
        $route = Route::current();
        $routeName = $route->getName();

        return view('search.index')->with([
            'routeName' => $routeName
        ]);
    }

    public function posts(Request $request)
    {
        $termPosts = $request->input('query');
        $posts = Post::where('post', 'like', '%'.$termPosts.'%')->get();
        $users = User::all();
        $likes = Like::all();
        $route = Route::current();
        $routeName = $route->getName();

        // lógica para buscar posts com o termo de busca $term
        return view('search.posts')->with([
            'termPosts' => $termPosts,
            'posts' => $posts,
            'users'=> $users,
            'likes' => $likes,
            'routeName' => $routeName
        ]);
        // return view('search.posts', compact('term', 'posts', 'users', 'likes', 'routeName'));
    }

    public function users(Request $request) {
        $termUsers = $request->input('query');
        $users = User::where('username', 'like', '%'.$termUsers.'%')->get();
        $followers = Follower::all();
        $route = Route::current();
        $routeName = $route->getName();

        return view('search.users')->with([
            'termUsers' => $termUsers,
            'users' => $users,
            'followers' => $followers,
            'routeName' => $routeName
        ]);
    }

    public function videos(Request $request) {
        $termVideos = $request->input('query');
        $users = User::all();
        $questions = Question::all();
        $like_videos = LikeVideo::all();
        $videos = Video::where('title', 'like', '%'.$termVideos.'%')->get();
        $route = Route::current();
        $routeName = $route->getName();

        return view('search.videos')->with([
            'termVideos' => $termVideos,
            'videos' => $videos,
            'users' => $users,
            'questions' => $questions,
            'like_videos' => $like_videos,
            'routeName' => $routeName
        ]);
    }
}

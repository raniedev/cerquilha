<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikeVideo;

class LikeVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $likeVideo = new LikeVideo;
        $likeVideo->user_id = auth()->id();
        $likeVideo->video_id = $request->video_id;
        $likeVideo->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        
        $curtida = LikeVideo::where('video_id', $request->video_id)->get();

        // $like = Like::findOrFail($curtir->id);
        $like = $curtida->where('user_id', auth()->id())->first();

        $like->delete();

        return response()->json(['success' => true]);
    }
}

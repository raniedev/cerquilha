<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function index()
    {
        
    }

    public function store(Request $request)
    {
        $like = new Like;
        $like->user_id = auth()->id();
        $like->post_id = $request->post_id;
        $like->save();

        return response()->json(['success' => true]);
    }

    public function destroy(Request $request, $id)
    {

        $curtir = Like::where('post_id', $request->post_id)->get();

        // $like = Like::findOrFail($curtir->id);
        $like = $curtir->where('user_id', auth()->id())->first();

        $like->delete();

        return response()->json(['success' => true]);
    }
}

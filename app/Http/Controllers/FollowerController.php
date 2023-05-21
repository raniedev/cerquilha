<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;

class FollowerController extends Controller
{
    public function index()
    {
        
    }

    public function store(Request $request)
    {
        $follower = new Follower;
        $follower->follower_id = auth()->id();
        $follower->user_id = $request->seguir;
        $follower->save();

        return response()->json(['success' => true]);
    }

    public function destroy(Request $request, $id)
    {

        $follower = Follower::where('user_id', $request->seguir)->get();        

        // $like = Like::findOrFail($curtir->id);
        $seguidor = $follower->where('follower_id', auth()->id())->first();

        $seguidor->delete();

        return response()->json(['success' => true]);
    }
}

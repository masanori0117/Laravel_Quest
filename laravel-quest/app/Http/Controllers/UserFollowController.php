<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserFollowController extends Controller
{
    public function store($id) {
        
        $follower = User::find($id);
        $follower_name = $follower->name;
        $message = $follower_name . 'をフォローしました';
        
        Auth::user()->follow($id);
        // $aa = Auth::user();
        return back()->with('message', $message);
    }
    
    public function destroy($id) {
        
        $follower = User::find($id);
        $follower_name = $follower->name;
        $message = $follower_name . 'のフォローを外しました';
        
        Auth::user()->unfollow($id);
        return back()->with('message', $message);;
    }
}

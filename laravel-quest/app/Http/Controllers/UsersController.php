<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Movie;


class UsersController extends Controller
{
    public function index() {
        
        $users = User::orderBy('id','desc')->paginate(9);
        return view('welcome', ['users'=>$users]);
    }
    
    public function show($id) {
        
        $user = User::find($id);
        
        $movies = $user->movies()->orderBy('id','desc')->paginate(9);
        
        $data = [
            'user' => $user,
            'movies' => $movies
            ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
    
    public function rename(Request $request) {
        
        $validate_rules = [
            'channel'=>'required|max:15'
            ];
            
        $validate_messages = [
            'channel.required' => 'チャンル名を入力してください',
            'channel.max' => 'チャネルの文字数は15文字以内で入力してください',
            ];
        
        $this->validate($request, $validate_rules, $validate_messages);
        
        $user = Auth::user();
        $movies = $user->movies()->orderBy('id', 'desc')->paginate(9);
        
        $user->channel = $request->channel;
        $user->save();
        
        $data = [
            'user' => $user,
            'movies' => $movies,
            ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
        
    }
    
    public function followings($id) {
        
        $user = User::find($id);
        $followings = $user->followings()->paginate(9);
        
        $data = [
            'user'=>$user,
            'users'=>$followings,
            ];
            
        $data += $this->counts($user);
        
        return view('users.followings', $data);
    }
    
    public function followers($id) {
        
        $user = User::find($id);
        $followers = $user->followers()->paginate(9);
        
        $data = [
            'user' => $user,
            'users' => $followers, 
            ];
            
        $data += $this->counts($user);
            
        return view('users.followers',$data);
        
    }

}
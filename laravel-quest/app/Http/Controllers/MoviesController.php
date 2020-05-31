<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Movie;
use App\User;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        
        $movies = $user->movies()->orderBy('id', 'desc')->paginate(9);
        
        $data = [
            'user' => $user,
            'movies' => $movies,
        ];
        
        return view('movies.create', $data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate_rules = [
            'url'=>'required|min:11|max:11',
            'comment'=>'max:30',
            ];
            
        $validate_messages = [
            'url.required'=>'URLを入力してください',
            'url.max'=>'URLの = 以降を11文字で入力してください',
            'url.min'=>'URLの = 以降を11文字で入力してください',
            'comment.max'=>'コメントは30文字以内で入力してください',
            ];
        
        $params = $this->validate($request, $validate_rules, $validate_messages);
        
        $request->user()->movies()->create($params);
        
        session()->flash('flash_message', '動画の投稿が完了しました');
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        
        if(Auth::id() === $movie->user_id) {
            $movie->delete();
        };
        
        // session()->flash('flash_message', '動画を削除しました');
        
        return back()->with('message','動画を削除しました');
    }
}

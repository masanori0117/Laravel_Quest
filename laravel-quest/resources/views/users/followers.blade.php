@extends('layouts.app')

@section('content')

    @include('users.tabs',['user'=>$user])
    
    @include('users.movies',['users'=>$users])
    
@endsection
@extends('layouts.app')

@section('content')

@include('users.tabs', ['user'=>$user])

@include('movies.movies', ['movies' => $movies])

@if (Auth::id() === $user->id)

{!! Form::open(['route'=>'users.rename','method'=>'put']) !!}
<h4>表示名の変更</h4>
<div class="form-group">
    {!! Form::label('channel', 'チャンネル名') !!}
    {!! Form::text('channel', $user->channel, ['class'=>'form-control']) !!}
</div>
<div class="mb-5">
    {!! Form::submit('変更する', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}

@endif


@endsection



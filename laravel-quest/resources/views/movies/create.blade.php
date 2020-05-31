@extends('layouts.app')

@yield('script')

@section('content')

<div class="text-center">
    <h2>動画投稿フォーム</h2>
</div>

@include('commons.error_messages')

<div class=" row justify-content-center">
    <div class="col-8 col-offset-4 mb-5">
        
        {!! Form::open(['route'=>'movies.store']) !!}
        
            <div class="form-group">
                {!! Form::label('url','URLを入力する') !!}
                <br>例）登録したいYouTube動画のURLが<span>https://www.youtube.com/watch?v=-bNMq1Nxn5oなら</span>
                <div>"v="の直後にある"<span class="text-success">-bNMq1Nxn5o</span>"を入力</div>
                {!! Form::text('url', null, ['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('comment', 'コメント') !!}
                {!! Form::text('comment', null, ['class'=>'form-control']) !!}
            </div>
            
            {!! Form::submit('投稿する', ['class'=>'btn btn-primary']) !!}
        
        {!! Form::close() !!}
    </div>
</div>

<h4>あなたの登録済み動画</h4>

@include('movies.movies', ['movies'=>$movies])


@endsection


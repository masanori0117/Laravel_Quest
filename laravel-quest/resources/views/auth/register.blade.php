@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="text-center">
        <h2>新規登録フォーム</h2>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route'=>'signup.post']) !!}
            
                <div class="form-group">
                    {!! Form::label('name','名前') !!}
                    {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email','メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password','パスワード') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password_confirmation','パスワード再確認') !!}
                    {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                </div>
                
                {!! Form::submit('新規作成', ['class'=>'form-control btn btn-primary']) !!}
            
            {!! Form::close() !!}
            
        </div>
        
    </div>

</div>


@endsection

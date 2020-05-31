<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        
        @extends('layouts.app')
        
        @section('content')
        
            <div class="jumbotron bg-warning">
                <div class="text-center text-white">
                    <h1>YouTubeまとめ × SNS</h1>
                </div>
            </div>
            
            @if (Auth::check())
                <div class="text-right">
                    {{ 'ユーザー名: ' . Auth::user()->name }}
                </div>
            @endif
                
            <!--@if (session('flash_message'))-->
            <!--    <div class="flash_message">-->
            <!--        {{ session('flash_message') }}-->
            <!--    </div>-->
            <!--@endif-->
            
            @include('commons.flash_message')
            
            @include('commons.message')
            
            @include('users.movies', ['users'=>$users] )
            
        @endsection
    </body>
</html>

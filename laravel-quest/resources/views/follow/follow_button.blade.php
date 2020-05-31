<div class="ml-4">
@if (Auth::check())

    @if (Auth::id() !== $user->id)
    
        @if( Auth::user()->is_following($user->id) )
            {!! Form::open(['route' => ['unfollow', $user->id], 'method'=>'delete']) !!}
                {!! Form::submit('このユーザーのフォローを外す', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        @else
            {!! Form::open(['route'=>['follow', $user->id]]) !!}
                {!! Form::submit('このユーザーをフォローする', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        @endif
    
    @endif
@endif
</div>
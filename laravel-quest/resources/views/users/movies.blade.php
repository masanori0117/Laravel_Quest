<div class="mt-5 mb-5">
<div class="row">    

@foreach ($users as $user)
    
    @php
    
        $movie = $user->movies->last();
    
    @endphp
        <div class="col-lg-4 col-md-6 col-sm-12 mt-3 mb-3">
        
            <div>＠{!! link_to_route('users.show', $user->name, ['id'=>$user->id]) !!}</div>
            
        
            @if($movie)
                <!--<iframe width="290" height="163.125" src="{{ 'https://www.youtube.com/embed/'.$movie->url }}?controls=1&loop=1&playlist={{ $movie->url }}" frameborder="0"></iframe>-->
                <iframe width="290" height="163.125" src="{{ 'https://www.youtube.com/embed/'. $movie->url }}" frameborder="0"></iframe>
            @else
                <iframe width="290" height="163.125" src="https://www.youtube.com/embed/" frameborder="0"></iframe>
            @endif
            
            <p class="movie-text">
                @if(isset($movie->comment))
                    {{ $movie->comment }}
                @endif
            </p>
            
            @include('follow.follow_button', ['user' => $user])
        </div>
@endforeach

</div>

<div class="row">
    <div class="col-4 offset-5 mt-5">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
</div>

</div>
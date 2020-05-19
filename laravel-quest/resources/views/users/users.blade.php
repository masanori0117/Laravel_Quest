<h2 class="text-left">Users</h2>

<div class="row mt-5 mb-5 text-center">
    
    @foreach ($users as $key => $user)
    
        @php
            
            $movie = $user->movies->last();
            
        @endphp
        
@if ($loop->iteration %3 === 1 && $loop->iteration !== 1 )
        
</div>
            
<div class="row mt-3 text-center">
                
@endif
        
    <div class="col-4 text-center mb-4">
        
        <span class="pl-5 text-left d-block">
            ＠{!! link_to_route('users.show',$user->name,['id'=>$user->id]) !!}
        </span>
        
        <div>
            @if($movie)
                <iframe width="290" height="163.125" src="{{ 'https://www.youtube.com/embed/'.$movie->url }}?controls=1&loop=1&playlist={{ $movie->url }}" frameborder="0"></iframe>
            @else
                <iframe width="290" height="163.125" src="https://www.youtube.com/embed/" frameborder="0"></iframe>
            @endif
        </div>
        
        <p>
            @if(isset($movie->comment))
                {{ $movie->comment }}
            @endif
        </p>
        
        @include('follow.follow_button',['user'=>$user])
        
    </div>

@endforeach

</div>

{{ $users->links('pagination::bootstrap-4') }}

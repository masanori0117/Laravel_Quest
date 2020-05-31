<div class="mt-5 mb-5">
    
    <div class="row">
        <div class="col-6">
            @include('commons.message')    
        </div>
        
        @include('commons.flash_message')
    </div>
    
    <div class="row justify-content-center">
        
@foreach ($movies as $movie)

        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12  mt-3 mb-3">
        
            <div>＠{{ $user->name }}</div>
        
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
            
            @if (Auth::id() === $movie->user_id )
                <button class="btn btn-danger" data-toggle="modal" data-target="#modal1">動画を削除する</button>
                @include('commons.warning_message')
            @endif
        </div>    
@endforeach
    </div>
    
{{ $movies->links('pagination::bootstrap-4') }}
</div>
<div class="modal fade" id="modal1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class=“modal-title”>削除確認</h3>
                <button class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                本当に削除しますか？
            </div>
            <div class="modal-footer">
                {!! Form::open( ['route'=> ['movies.destroy', $movie->id], 'method'=>'delete']) !!}
                {!! Form::submit('削除', ['class'=>'btn btn-danger']) !!} 
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

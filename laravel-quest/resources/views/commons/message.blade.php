<!--メッセージ-->
@if(Session::has('message'))
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  mt-3 mb-3">
            <div class="flash_message alert alert-primary">
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif

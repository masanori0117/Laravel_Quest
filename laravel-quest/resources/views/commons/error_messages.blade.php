@if (count($errors) >0)
    <div class="row">
        <div class="col-sm-6 offset-sm-3 alert alert-danger mb-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
@endif
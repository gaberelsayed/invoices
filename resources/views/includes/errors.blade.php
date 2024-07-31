@if(Session::has('error'))
    <div class="row mr-2 ml-2" >
            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                    id="type-error">{{Session::get('error')}}
            </button>
    </div>
@endif
@if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
        </div>
@endif
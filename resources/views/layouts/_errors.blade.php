@if(count($errors))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $erorr)
            <strong>{{ $erorr }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        @endforeach
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <b style="color: red !important">{{ __('pages.auth.validation') }}</b>
        @foreach($errors->all() as $error)
            <li style="color: black !important">{{ $error }}</li>
        @endforeach
    </div>
@endif
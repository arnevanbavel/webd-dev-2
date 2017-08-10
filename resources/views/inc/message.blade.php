@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if ($errors->has('email'))
    <div class="alert alert-danger">
        Email was not sent. {{ $errors->first('email') }}
    </div>
@endif
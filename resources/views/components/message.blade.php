@if (session()->has('error'))
    <span class="invalid-feedback" role="alert">
        <p class="error">{{ session()->get('error') }}</p>
    </span>
@endif
@if (session()->has('success'))
    <span class="invalid-feedback" role="alert">
        <p class='success'>{{ session()->get('success') }}</p>
    </span>
@endif
@if($errors->any())
    @foreach($errors->all() as $error)
        <p class='error'>{{$error}}</p>
    @endforeach
@endif
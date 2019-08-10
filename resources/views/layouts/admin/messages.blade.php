@if (Session::has('message.level'))
    <div class="alert alert-icon-left alert-{{ Session::get('message.level') }} alert-dismissible mb-2" role="alert">
        <span class="alert-icon"><i class="la la-{{ Session::get('message.icon') }}"></i></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>{{ Session::get('message.content') }}</strong>
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-icon-left alert-danger alert-dismissible mb-2" role="alert">
        <span class="alert-icon"><i class="la la-exclamation-circle"></i></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
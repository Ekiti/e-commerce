@extends('layouts.main')
@section('content')
    <div class="flex center col-lg-6">
    @include('components.message')
    </div>
    <section class="flex flex-wrap center">
        <div class="flex column user-profile">
        <h6 class="flex middle"><i class="ion-md-person"></i> Personal Information</h6>
            <ul class="flex column no-wrap profile">
                <li class="flex column center">
                    <p class="flex middle"> <i class="icon-xx ion-md-contact"></i> {{ Auth::user()->name }} </p>
                    <p class="flex middle"> <i class="icon-xx ion-md-mail"></i> {{ Auth::user()->email }} </p>
                    <p class="flex middle space-between">
                        <a class=" flex center text-14 mar-15" href=" {{route('profile.edit', Auth::user()->id)}} ">Edit</a>
                        <a class=" flex center text-14 mar-15" href=" {{ route('user.changePasswordForm') }} ">Change password</a>
                    </p>
                </li>
            </ul>
        </div>
        <div class="flex column user-profile">
            <h6 class="flex middle"><i class="ion-md-globe"></i> Delivery Address</h6>
            <ul class="flex column no-wrap profile">
                @if(count($address) != 0)
                <li class="flex column center">
                    @foreach($address as  $ads)
                    <p class="flex middle"> <i class="icon-xx ion-md-contact"></i> {{ $ads->name }} </p>
                    <p class="flex middle"> <i class="icon-xx ion-md-pin"></i> {{ $ads->address." ". $ads->city." ". $ads->state." ". $ads->country }} </p>
                    <p class="flex middle"> <i class="icon-xx ion-ios-call"></i> {{ $ads->phone }} </p>
                    <p class="flex middle"> <a class=" flex center text-14 mar-15" href="{{ route('address.edit', Auth::user()->id) }}">Edit</a></p>
                    @endforeach
                </li>
                @else
                <li class="flex column center">
                    <div class="flex center">
                        <p><a class="like-button-hollow" href="{{route('address.create')}}">Add delivery address</a></p>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </section>
@endsection
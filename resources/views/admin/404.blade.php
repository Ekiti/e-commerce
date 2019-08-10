@extends('layouts.admin.main')

@section('title', 'Dashboard')

@section('content-header-left')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block"></h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                </li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content-header-right')
    {{-- <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right">
            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
            <div class="dropdown-menu arrow" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 40px, 0px);"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
            </div>
        </div>
    </div> --}}
@endsection


@section('content')


{{-- Ecommerce Statistics --}}
<div class="d-flex flex-column align-items-center col-md-12 col-12 justify-content-center">
    <h1 class="text-center justify-content-center"><i class="ft-info"></i> Notice</h1>
    <p class="col-sm-5 justify-content-center text-center pt-20">{{$text}}</p>
    @if(isset($link))
    <a class="btn btn-info" href="{{route($link)}}">Click here to add shop</a>
    @endif
</div>
@endsection
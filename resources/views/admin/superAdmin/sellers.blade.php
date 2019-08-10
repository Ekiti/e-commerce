@extends('layouts.admin.main')

@section('title', 'Vendors')

@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/app-assets/css/select2.min.css') }}">
    <style>
        .ck-editor__editable {
            min-height: 200px;
        }
    </style>
@endsection

@section('content-header-left')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Shops</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="breadcrumb-item active">
                    </li> --}}
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

	<div class="card">
		<div class="card-body">
			<span class="shop-title">Shops</span>
			<span class="float-right">
				<span class="result-text mr-1"> Showing 12 of 203 results</span>
				<span class="display-buttons">
					<a href="#" class="active"><i class="ft-grid font-medium-2"></i></a>
					<a href="#"><i class="ft-list font-medium-2"></i></a>
				</span>
			</span>
		</div>
    </div>
    
    <div class="row col-12 match-height">
    @foreach($vendors as $vendor)
		<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
			<div class="card pull-up">
				<div class="card-content">
					<div class="card-body">
						<a href="ecommerce-product-detail.html" data-toggle="modal" data-target="#{{$vendor->vendor_name}}">
							<div class="product-img d-flex align-items-center">
								{{-- <div class="badge badge-success round">-50%</div> --}}
								{{--<img class="img-fluid mb-1" src="../../../app-assets/images/elements/07.png" alt="Card image cap">--}}
							</div>
                            <h4 class="product-title"><i class="ft-hash" style="margin-right:10px;"></i>{{$vendor->vendor_name}}</h4>
                            <p style="margin-bottom:2px;"><i class="ft-user" style="margin-right:10px;"></i>{{$vendor->admin->name}}</p>
                            <p><i class="ft-phone-call" style="margin-right:10px;"></i>{{$vendor->vendor_phone}}</p>
						</a>
						<div class="product-action d-flex justify-content-around">
                            @if($vendor->vendor_verified === 1)
                                <a href="#verify" id="" class="verifyVCC" data-id="{{$vendor->id}}" data-toggle="tooltip" data-placement="top" title="Verified"><i class="ft-check-circle" style="color:green;"></i></a><span
                                class="saperator">|</span>
                                    @if($vendor->vendor_status === 200)
                                        <a href="#view" id="" class="blockVCC" data-id="{{$vendor->id}}" data-toggle="tooltip" data-placement="top" title="Block">  
                                        <i class="ft-unlock"></i></a>
                                    @elseif($vendor->vendor_status === 404)
                                        <a href="#view" id="" class="blockVCC" data-id="{{$vendor->id}}"  data-toggle="tooltip" data-placement="top" title="Blocked. click to unblock">
                                        <i class="ft-lock" style="color:red;"></i></a>
                                    @else
                                        <a href="#view" id="" class="blockVCC" data-id="{{$vendor->id}}" data-toggle="tooltip" data-placement="top" title="error">
                                        <i class="ft-alert-triangle" style="color:red;"></i></a>
                                    @endif
                                    <span class="saperator">|</span>
                                    <a href="#cart"  id="" class="blockVCC" data-id="{{$vendor->id}}" data-toggle="tooltip" data-placement="top" title="View this shop"><i class="ft-shopping-cart"></i></a>
                            @else                             
							    <a href="#verify" id="" class="verifyVCC" data-id="{{$vendor->id}}" data-toggle="tooltip" data-placement="top" title="Verify account"><i class="ft-thumbs-up"></i></a>
                        @endif
						</div>
					</div>
				</div>
			</div>
		</div>
    <!-- Modal -->
    <div class="modal fade text-left" id="{{$vendor->vendor_name}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="product-title"><i class="ft-hash" style="margin-right:10px;"></i>{{$vendor->vendor_name}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5><i class="ft-user" style="margin-right:10px;"></i>{{$vendor->admin->name}}</h5>
                <P><i class="ft-mail" style="margin-right:10px;"></i> {{$vendor->admin->email}}</P>
                <P><i class="ft-phone" style="margin-right:10px;"></i> {{$vendor->vendor_phone}}</P>
                <P><i class="ft-map-pin" style="margin-right:10px;"></i> {{$vendor->vendor_country}} {{$vendor->vendor_state}} {{$vendor->vendor_city}} {{$vendor->vendor_address}}</P>
                <hr>
                <h5><i class="ft-message-square" style="margin-right:10px;"></i> Description</h5>
                <p>{{ $vendor->vendor_description}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                @if($vendor->vendor_verified === 1)
                <button type="button" class="btn btn-outline-primary" data-id="{{$vendor->id}}"><i class="ft-check-circle" style="color:green;"></i> Verified</button>
                @else
                <button type="button" class="btn btn-outline-primary verifyVCC" data-id="{{$vendor->id}}">Verify</button>
                @endif
            </div>
        </div>
        </div>
    </div>
@endforeach
</div>
@endsection

@section('scripts')
    <script src="{{ asset('store/js/vendors.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
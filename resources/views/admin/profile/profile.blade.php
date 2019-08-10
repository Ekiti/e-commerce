@extends('layouts.admin.main')

@section('title', 'Add New Product - Manage Products')

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
        <h3 class="content-header-title mb-0 d-inline-block">Change password</h3>
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


	<div class="row match-height">
		<div class="col-md-12">
			<div class="">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form-center">Profile</h4>
					<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-content collapse show">
					<div class="card-body">

						<div class="card-text">
						</div>
                        @include('layouts.admin.messages')
                        <div class="row col-12 match-height">
		<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
			<div class="card pull-up">
				<div class="card-content">
					<div class="card-body">
						<a href="#" >
							<div class="product-img d-flex align-items-center">
							</div>
                            <h4 class="product-title"><i class="ft-user" style="margin-right:10px;"></i>{{Auth::guard('admin')->user()->name}}</h4>
                            <p><i class="ft-mail" style="margin-right:10px;"></i>{{Auth::guard('admin')->user()->email}}</p>
						</a>
						<div class="product-action d-flex justify-content-around">
                                <a href=" {{route('editprofile')}} " data-toggle="tooltip" data-placement="top" title="Edit"><i class="ft-edit"></i> Edit</a><span
                                class="saperator">|</span>
                                <a href="{{route('changepasswordForm')}}"  id="" class="blockVCC"  data-toggle="tooltip" data-placement="top" title="change password"><i class="ft-lock"></i> change password</a>                           
						</div>
					</div>
				</div>
			</div>
        </div>
        @if(count($vendor) > 0 )
        @foreach($vendor as $vend)
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
			<div class="card pull-up">
				<div class="card-content">
					<div class="card-body">
						<a href="#" >
							<div class="product-img d-flex align-items-center">
							</div>
                            <h4 class="product-title"><i class="ft-shopping-cart" style="margin-right:10px;"></i>{{$vend->vendor_name}}</h4>
                            <p><i class="ft-phone-call" style="margin-right:10px;"></i>{{$vend->vendor_phone}}</p>
                            <p><i class="ft-map-pin"></i> {{$vend->vendor_address}} {{$vend->vendor_city}} {{$vend->vendor_state}} {{$vend->vendor_country}}</p>
						</a>
						<div class="product-action d-flex justify-content-around">
                                <a href="{{ route('vendor.edit', $vend->id) }}"  data-toggle="tooltip" data-placement="top" title="edit"><i class="ft-edit"></i> Edit shop details</a>
                        </div>
					</div>
				</div>
			</div>
        </div>
        @endforeach
        @else
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 justify-content-center">
			<div class="card pull-up">
				<div class="card-content">
					<div class="card-body justify-content-center">
                        <p>You have not added your shop yet.</p>
						<a href="{{ route('vendor.create') }}" class="btn btn-primary" style="color:#FFF;">
                            <i class="ft-user" style="margin-right:10px;"></i> add shop
						</a>
					</div>
				</div>
			</div>
        </div>
        @endif
</div>


					</div>
				</div>
			</div>
		</div>
	</div>


@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/select2.full.min.js') }}"></script>
    <script>
			ClassicEditor
				.create( document.querySelector( '#editor' ) )
				.then( editor => {
					console.log( editor );
				} )
				.catch( error => {
					console.error( error );
				} );

                $('#sizes').select2({
                    placeholder: "Select Sizes"
                });
		</script>
@endsection
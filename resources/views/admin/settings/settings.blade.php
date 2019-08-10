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
        <h3 class="content-header-title mb-0 d-inline-block">Settings</h3>
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
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form-center">Site settings</h4>
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
						{{ Form::model($settings, ['route' => ['settings.update', 1], 'method' => 'PUT', 'class' => 'form']) }}
							<div class="row justify-content-md-center">
								<div class="col-md-6">
									<div class="form-body">
										<div class="form-group">
                                            {{ Form::label('name', 'Site name') }}
                                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name']) }}
										</div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('email', 'Email') }}
                                                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email']) }}
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('phone', 'Phone') }}
                                                    {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'phone']) }}
                                                </div>
                                            </div>
                                        </div>
                                
                                     
                                        <div class="form-group">
                                            {{ Form::label('about', 'About') }}
                                            {{ Form::text('about', null, ['class' => 'form-control', 'placeholder' => 'About']) }}
                                        </div>

										<div class="form-group">
                                            {{ Form::label('address', 'Address') }}
                                            {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) }}
										</div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('facebook', 'Facebook link') }}
                                                    {{ Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Facebook link']) }}
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('instagram', 'Instagram link') }}
                                                    {{ Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'Instagram link']) }}
                                                </div>
                                            </div>
                                        </div>
							</div>

							<div class="form-actions center">
								{{--<button type="button" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</button>
								<button type="submit" class="btn btn-primary">
									<i class="la la-check-square-o"></i> Save
                                </button> --}}
                                {{ Form::button('<i class="la la-save"></i> Save Changes', ['type' => 'submit', 'class' => 'btn btn-primary btn-glow']) }}
							</div>
						</form>	

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
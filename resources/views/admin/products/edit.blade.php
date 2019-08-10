@extends('layouts.admin.main')

@section('title', 'Edit Product - Manage Products')

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
        <h3 class="content-header-title mb-0 d-inline-block">Products</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="breadcrumb-item active">Edit product
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content-header-right')
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right">
            <button class="btn btn-primary btn-glow dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
            <div class="dropdown-menu arrow" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 40px, 0px);">
                <a class="dropdown-item" href="{{ route('images.show', $data['product']->id) }}"><i class="la la-image mr-1"></i> Edit product images</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('products.index') }}"><i class="la la-th-large mr-1"></i> Add new product</a>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
		<div class="col-md-12">
			<div class="card" style="zoom:" data-height="">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Edit Product</h4>
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
				<div class="card-content collapse show" style="">
					<div class="card-body">
                        @include('layouts.admin.messages')

						{{ Form::model($data['product'], ['route' => ['products.update', $data['product']->id], 'method' => 'PUT', 'class' => 'form']) }}
                            <div class="row">
                                <div class="col-md-7">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-th-large"></i> Product</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('name', 'Product Name') }}
                                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Product Name']) }}
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    {{ Form::label('price', 'Price') }}
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <del>N</del>
                                                                </span>
                                                            </div>

                                                            {{ Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Price', 'aria-label' => 'Product price (to the nearest naira)']) }}

                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        {{ Form::label('quantity', 'Quantity') }}
                                                        {{ Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => 'Quantity']) }}
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {{ Form::label('description', 'Description') }}
                                                {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editor']) }}
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="form-section"><i class="la la-th-large"></i> Product Properties</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('discount', 'Discount (%)') }}
                                                {{ Form::number('discount', null, ['class' => 'form-control', 'placeholder' => 'Discount']) }}
                                                <small class="form-text"><em>Apply discount to this product. Discount should be in percent.</em></small>
                                            </div>

                                            <div class="form-group">
                                                {{ Form::label('label', 'Label') }}
                                                {{ Form::select('label', $data['labelsArray'], null, ['class' => 'form-control']) }}
                                            </div>

                                            <div class="form-group">
                                                {{ Form::label('sku_placeholder', 'SKU') }}
                                                {{ Form::text('sku_placeholder', $data['sku'], ['class' => 'form-control', 'disabled' => '']) }}
                                                {{ Form::hidden('sku', $data['sku']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </div>

                                <div class="col-md-5">

                                    <h4 class="form-section"><i class="la la-list"></i> Category</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{ Form::label('sub_category_id', 'Category') }}
                                                    {{ Form::select('sub_category_id', $data['categoriesArray'], null, ['class' => 'form-control']) }}
                                                </div>

                                                <div class="form-group">
                                                    {{ Form::label('sizes', 'Select Sizes') }}
                                                    {{ Form::select('sizes[]', $data['sizesArray'], null, ['multiple' => '', 'class' => 'form-control', 'id' => 'sizes']) }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            {{-- <button type="reset" class="btn btn-warning mr-1 btn-glow"> --}}
                                            <a href="{{ route('products.index') }}" class="btn btn-warning mr-1 btn-glow">
                                                <i class="ft-x"></i> Cancel
                                            </a>
                                            {{-- </button> --}}

                                            {{ Form::button('<i class="la la-save"></i> Save Changes', ['type' => 'submit', 'class' => 'btn btn-primary btn-glow']) }}
                                            <small class="form-text"><em>After editing this product, you will be redirected to a product images upload page.</em></small>
                                        </div>
                                </div>
                            </div>
						{{ Form::close() }}

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
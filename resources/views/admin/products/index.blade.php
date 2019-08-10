@extends('layouts.admin.main')

@section('title', 'Products - Manage Products')

@section('content-header-left')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Products</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                <li class="breadcrumb-item active">View all products
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
                <a class="dropdown-item" href="{{ route('categories.create') }}"><i class="la la-list mr-1"></i> Add New Category</a>
                <a class="dropdown-item" href="{{ route('sizes.create') }}"><i class="la la-credit-card mr-1"></i> Add New Size</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('products.create') }}"><i class="la la-th-large mr-1"></i> Add new product</a>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-colored-form-control">All Products</h4>
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
							<p>
                                View all products you've added to the store.
                            </p>
						</div>

                        @include('layouts.admin.message-delete')
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0">
                            <thead class="bg-primary white">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($data['products']->count() > 0)
                                @foreach ($data['products'] as $product)
                                    <tr>
                                        <th scope="row">{{ $data['counter']++ }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>
                                            <a href="{{ route('categories.show', $product->category->id) }}" class="btn btn-sm btn-outline-primary round">{{ $product->category->name }}</a>
                                            <a href="{{ route('subcategories.show', $product->subcategory->id) }}" class="btn btn-sm btn-outline-success round">{{ $product->subcategory->name }}</a>
                                        </td>
                                        <td>
                                            <del>N</del> {{ number_format($product->price, 2) }} <br>
                                            {{ ($product->discount != null) ? number_format($product->discountedPrice(), 2) : " " }} <br>
                                            <sub class="text-danger">-{{ ($product->discount == null) ? 0 : $product->discount }}%</sub>
                                        </td>
                                        <td>{{ $product->quantity }}</td>
                                        <td><span class="">{{ ($product->discount == null) ? 0 : $product->discount }}%</span></td>
                                        <td>{{ $product->getTimeAgo($product->created_at) }}</td>
                                        <td>
                                            <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dropdown-toggle dropdown-menu-right btn-glow"><i class="ft-settings"></i></button>
                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(-102px, -177px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a href="{{ route('products.show', $product->id) }}" class="dropdown-item"><i class="la la-eye"></i> Open</a>
                                                    <a href="{{ route('products.edit', $product->id) }}" class="dropdown-item"><i class="la la-pencil"></i> Edit</a>
                                                    <a href="{{ route('products.destroy', $product->id) }}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this product?')"><i class="la la-trash"></i> Delete</a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="3"><i class="la la-info-circle"></i>&nbsp;&nbsp;Product you have added will show here.<th>
                                </tr>
                            @endif
                            </tbody>
                    </table>
                    </div>

                    {{ $data['products']->links() }}

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
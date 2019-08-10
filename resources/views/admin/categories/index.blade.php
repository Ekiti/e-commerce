@extends('layouts.admin.main')

@section('title', 'Categories - Manage Product Categories')

@section('content-header-left')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Categories</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                <li class="breadcrumb-item active">Categories
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

    <div class="row">
		<div class="col-md-5">
			<div class="card" style="zoom:" data-height="">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Add Category</h4>
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
						<div class="card-text">
							<p>
                                Add product category to your store.
                            </p>
						</div>

                        @if ($data['isEdit'])

                        {{ Form::model($data['editCategory'], ['route' => ['categories.update', $data['editCategory']->id], 'method' => 'PUT', 'class' => 'form']) }}
							<div class="form-body">
								<h4 class="form-section"><i class="la la-list"></i> Category</h4>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
                                            {{ Form::label('name', 'Category Name') }}
                                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category Name']) }}
										</div>
									</div>
								</div>
							</div>

                            <div class="form-actions">
								<button type="reset" class="btn btn-warning mr-1 btn-glow">
									<i class="ft-x"></i> Cancel
								</button>

                                {{ Form::button('<i class="la la-save"></i> Save Changes', ['type' => 'submit', 'class' => 'btn btn-primary btn-glow']) }}
							</div>
						{{ Form::close() }}

                        @else

						{{ Form::open(['route' => 'categories.store', 'method' => 'POST', 'class' => 'form']) }}
							<div class="form-body">
								<h4 class="form-section"><i class="la la-list"></i> Category</h4>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
                                            {{ Form::label('name', 'Category Name') }}
                                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category Name']) }}
										</div>
									</div>
								</div>
							</div>

                            <div class="form-actions">
								<button type="reset" class="btn btn-warning mr-1 btn-glow">
									<i class="ft-x"></i> Cancel
								</button>

                                {{ Form::button('<i class="la la-plus"></i> Add', ['type' => 'submit', 'class' => 'btn btn-primary btn-glow']) }}
							</div>
						{{ Form::close() }}

                    @endif

					</div>
				</div>
			</div>
		</div>


		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-colored-form-control">All Categories</h4>
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
                                View all product categories.
                            </p>
						</div>

                        @include('layouts.admin.message-delete')

                        <table class="table table-bordered table-striped">
                            <thead class="bg-primary white">
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($data['categories']->count() > 0)
                                @foreach ($data['categories'] as $category)
                                    <tr>
                                        <th scope="row">{{ $data['counter']++ }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dropdown-toggle dropdown-menu-right btn-glow"><i class="ft-settings"></i></button>
                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(-102px, -177px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a href="{{ route('categories.show', $category->id) }}" class="dropdown-item"><i class="la la-eye"></i> Open</a>
                                                    <a href="?action=edit&CID={{ $category->id }}" class="dropdown-item"><i class="la la-pencil"></i> Edit</a>
                                                    <a href="{{ route('categories.destroy', $category->id) }}" class="dropdown-item" onclick="return confirm('Deleting this category will also delete its related sub-categories. Are you sure you want to delete?')"><i class="la la-trash"></i> Delete</a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="3"><i class="la la-info-circle"></i>&nbsp;&nbsp;Product categories you have added will show here.<th>
                                </tr>
                            @endif
                            </tbody>
                    </table>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
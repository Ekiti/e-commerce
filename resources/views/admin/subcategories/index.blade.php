@extends('layouts.admin.main')

@section('title', 'Sub-Categories - Manage Product Sub-Categories')

@section('content-header-left')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Sub-Category</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                <li class="breadcrumb-item active">Sub-Categories
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
			<div class="card" style="zoom: 1;" data-height="">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Add Sub-Category</h4>
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
                                Add product sub-category to your store.
                            </p>
						</div>

                        @if ($data['isEdit'])

                        {{ Form::model($data['editSubCategory'], ['route' => ['subcategories.update', $data['editSubCategory']->id], 'method' => 'PUT', 'class' => 'form']) }}
							<div class="form-body">
								<h4 class="form-section"><i class="la la-list"></i> Sub-Category</h4>
								<div class="row">
									<div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('category_id', 'Choose Category') }}
                                            {{ Form::select('category_id', $data['categoriesArray'], null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
									<div class="col-md-12">
										<div class="form-group">
                                            {{ Form::label('name', 'Sub-Category Name') }}
                                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Sub-Category Name']) }}
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

						{{ Form::open(['route' => 'subcategories.store', 'method' => 'POST', 'class' => 'form']) }}
							<div class="form-body">
								<h4 class="form-section"><i class="la la-list"></i> Sub-Category</h4>
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('category_id', 'Choose Category') }}
                                            {{ Form::select('category_id', $data['categoriesArray'], null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
									<div class="col-md-12">
										<div class="form-group">
                                            {{ Form::label('name', 'Sub-Category Name') }}
                                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Sub-Category Name']) }}
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
					<h4 class="card-title" id="basic-layout-colored-form-control">All Sub-Categories</h4>
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
                                View all product sub-categories.
                            </p>
						</div>

                        @include('layouts.admin.message-delete')

                        <table class="table table-bordered table-striped">
                            <thead class="bg-primary white">
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($data['subcategories']->count() > 0)
                            @foreach ($data['grouped'] as $subcategories)
                                @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <th scope="row">{{ $data['counter']++ }}</th>
                                        <td>{{ $subcategory->category->name }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>
                                            <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dropdown-toggle dropdown-menu-right btn-glow"><i class="ft-settings"></i></button>
                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(-102px, -177px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a href="{{ route('categories.show', $subcategory->id) }}" class="dropdown-item"><i class="la la-eye"></i> Open</a>
                                                    <a href="?action=edit&SID={{ $subcategory->id }}" class="dropdown-item"><i class="la la-pencil"></i> Edit</a>
                                                    <a href="{{ route('subcategories.destroy', $subcategory->id) }}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this sub-category?')"><i class="la la-trash"></i> Delete</a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            @else
                                <tr>
                                    <th colspan="4"><i class="la la-info-circle"></i>&nbsp;&nbsp;Product sub-categories you have added will show here.<th>
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
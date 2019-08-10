@extends('layouts.admin.main')

@section('title', 'Orders - Manage Orders')

@section('content-header-left')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Orders</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                <li class="breadcrumb-item active">View all orders
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
					<h4 class="card-title" id="basic-layout-colored-form-control">All Orders</h4>
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
                                View all orders.
                            </p>
						</div>

                        @include('layouts.admin.message-delete')
                        <div class="table-responsive">
                        <table id="invoices-list" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle" style="min-height:200px;">
                            <thead class="bg-primary white">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($data['orders']->count() > 0)
                            @foreach ($data['orders'] as $order)
                            <tr>
				                <td>{{ $data['counter']++ }}</td>
				                <td>{{ $order->date() }}</td>
				                <td>{{ $order->order_id }}</td>
				                <td>{{ $order->customer->name }}</td>
				                <td>
                                    @if($order->status === 'pending')
                                        <span class="badge badge-default badge-info badge-lg">
                                    @elseif($order->status === 'confirmed')
                                        <span class="badge badge-default badge-success badge-lg">
                                    @else
                                        <span class="badge badge-default badge-danger badge-lg">
                                    @endif
                                        {{$order->status}}</span></td>
				                <td><del>N</del>{{ number_format($order->product_price, 2) }}</td>
				                <td>
                                        <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                            <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#{{$order->order_id}}"><i class="la la-eye"></i> View Order</a>
                                                @if(Auth::guard('admin')->user()->level === 100)

                                                {{-- <a href="#" class="dropdown-item"><i class="la la-pencil"></i> Edit Task</a> --}}
                                                @if($order->status === 'pending')
                                                <a href="#" class="dropdown-item confirm_order" data-id="{{$order->id}}"><i class="la la-check"></i>  Confirm Order</a>
                                                <a href="#" class="dropdown-item cancel_order" data-id="{{$order->id}}"><i class="la la-trash"></i> Cancel Order</a>
                                                @endif
                                                @endif
                                            </span>
                                        </span>
                                    
				                </td>
                            </tr>
                            
    <!-- Modal -->
    <div class="modal fade text-left" id="{{$order->order_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="product-title"><i class="ft-hash" style="margin-right:10px;"></i>{{$order->order_id}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <img class="img-modal" src="{{$order->product_image}}" alt="">
                    <div style="margin: 10px;">
                        <p><b>{{$order->product->name}}</b></p>
                        <p>Price: <b><del>N</del>{{ number_format($order->product_price, 2) }}</b></p>
                        <p>Size: <b>{{$order->product_size}}</b></p>
                        <p>Quantity: <b>{{$order->product_qty}}</b></p>
                        <p><i class="ft-check-square" style="color:#99cc94;"></i></p>
                    </div>
                </div>
                <hr>
                <h5>Buyer Information</h5>
                <p><i class="ft-user" style="margin-right:10px;"></i>{{$order->customer->name}}</p>
                <P><i class="ft-mail" style="margin-right:10px;"></i> {{$order->customer->email}}</P>
                <P><i class="ft-phone-call" style="margin-right:10px;"></i> {{$order->address->phone}}</P>
                <P><i class="ft-map-pin" style="margin-right:10px;"></i> {{$order->address->address}} {{$order->address->city}} {{$order->address->state}} {{$order->address->country}}</P>
                @if(Auth::guard('admin')->user()->level === 500)
                    <hr>
                    <h5>Seller information</h5>
                    <p><i class="ft-users" style="margin-right:10px;"></i>{{ $order->vendoor->vendor_name}}</p>
                    <p><i class="ft-phone-call" style="margin-right:10px;"></i>{{ $order->vendoor->vendor_phone}}</p>
                    <p><i class="ft-mail" style="margin-right:10px;"></i>{{ $order->admin->email}}</p>
                    <p><i class="ft-map-pin" style="margin-right:10px;"></i>{{ $order->vendoor->address}} {{ $order->vendoor->vendor_address}} {{ $order->vendoor->vendor_city}} {{ $order->vendoor->vendor_state}} {{ $order->vendoor->vendor_country}}</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>




                            @endforeach
                            @else
                                <tr>
                                    <th colspan="3"><i class="la la-info-circle"></i>&nbsp;&nbsp;Orders customers have placed will show here.<th>
                                </tr>
                            @endif
                            </tbody>
                    </table>
                    </div>

                    {{-- $data['orders']->links() --}}

					</div>
				</div>
			</div>
		</div>
    </div>
@endsection    
@section('scripts')
    <script src="{{ asset('store/js/adminOrdering.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
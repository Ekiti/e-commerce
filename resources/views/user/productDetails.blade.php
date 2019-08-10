@extends('layouts.main')
@section('title')
{{ $data['product']->name }}
@endsection
@section('description', 'Shop for your favourite shoe brands in Nigeria')
@section('content')
<section class="flex column no-wrap col-lg-5">
            <h1 class="featured-header"></h1>
            <div class="flex flex-wrap mobilized">
                <div class="flex center middle shadow product-details-img ">
                    @if ($data['product']->discount != 0)
                        <span class="discount-box top-left">-{{ $data['product']->discount }}%</span>
                    @endif
                @foreach ($data['product']->images as $image)
                    <img src="{{ $image->getImageSource() }}" alt="{{ $data['product']->name }}">
                @endforeach
                </div>
                <div class="flex mobilized">
                    <ul class="flex column no-wrap product-details"> 
                        <li>
                            <p class="text-25"><b>{{ $data['product']->name }}</b></p>
                            @if ($data['product']->discount != 0)
                                <div class="flex middle flex-wrap">
                                    <p class="text-16" style="text-decoration:line-through;"> &#8358;{{ number_format($data['product']->price, 2) }}</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <p class="text-25"> <b>&#8358;{{ number_format($data['product']->discountedPrice(), 2) }} </b></p>
                                    <p>&nbsp; You save &#8358;{{$data['product']->price-$data['product']->discountedPrice()}}</p>
                                </div>
                            @else
                                <p class="text-25"> <b>&#8358;{{ number_format($data['product']->price, 2) }}</b></p>
                            @endif
                        </li>
                        <li>
                                <div class="flex">
                                <div class="flex column center middle smart-form">
                                        <p>Size</p>
                                    <select class="select product-size" name="" id="">
                                        @foreach ($data['product']->sizes as $size)
                                            <option value="{{ $size->name }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="flex column center middle smart-form">
                                        <p>Quantity</p>
                                        <div class="increment">
                                            <a href="#" class="button add">+</a>
                                            <input value="1" class="in-screen product-amount-input" type="number" name="" id="" step="1" min="1" max="" inputmode="numeric">
                                            <a href="#" class="button sub">-</a>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="flex btn-holder">
                                    <a href="/" title="Add to Cart" id="addToCartBtn" data-id="{{ $data['product']->id }}" data-slug="{{ $data['product']->slug }}" data-sku="{{ $data['product']->sku }}" data-name="{{ $data['product']->name }}" data-price="{{ ($data['product']->discount != null || $data['product']->discount != 0) ? $data['product']->discountedPrice() : $data['product']->price }}" data-discount="{{ $data['product']->discount }}" data-size="" data-discounted="{{ $data['product']->discountedPrice() }}" data-image="{{ $data['product']->images[0]->getImageSource() }}" data-seller="{{$data['product']->admin_id}}" class="like-button" role="button">Add to Cart</a>
                                </div>
                        </li>
                        <li class="flex column no-wrap mobilized">
                            <p><b>Description</b></p>
                            <div class="flex column despt">
                                <p class="col-md-4 mobilize-width">
                                    {!! $data['product']->description !!}
                                </p>
                            </div>
                            
                        </li>
                        <li class="flex column no-wrap mobilized">
                            <p><b>Specifications</b></p>
                            <div class="flex column no-wrap">
                                {{-- <span class="flex middle">
                                    <p class="dt">Color:</p>
                                    <p class="dd">Black, Brown, White</p>
                                </span>
                                <span class="flex middle">
                                    <p class="dt">Condition:</p>
                                    <p class="dd">New without box.</p>
                                </span>   
                                <span class="flex middle">
                                    <p class="dt">Sizes:</p>
                                    <p class="dd">42,52,15</p>
                                </span>
                                <span class="flex middle">
                                    <p class="dt">Brand:</p>
                                    <p class="dd">Nike</p>
                                </span>
                                <span class="flex middle">
                                    <p class="dt">Style:</p>
                                    <p class="dd">Sport</p>
                                </span> --}}
                                <span class="flex middle">
                                    <p class="dt">Delivery:</p>
                                    <p class="dd">2 - 5 days</p>
                                </span> 
                                <span class="flex middle">
                                    <p class="dt">Payment:</p>
                                    <p class="dd">Online</p>
                                </span>

                                <span class="flex middle">
                                    <p class="dt">Return:</p>
                                    <p class="dd">no return policy for this product</p>
                                </span>
                        </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <script>
        let display = document.querySelectorAll('.in-screen');
        let plus = document.querySelectorAll('.add');
        let minus = document.querySelectorAll('.sub');
        var show = (arg)=>{
            display.forEach((element) => {
                element.value = arg;
            });
        }
        var oprate = (operator,operation)=>{
            operator.forEach((opp)=>{
                opp.addEventListener('click',(x)=>{
                    x.preventDefault();
                    if(operation == 'add'){
                        display.forEach((element) => {
                            let currentValue = Number(element.value);
                            element.value = Math.floor(currentValue+1); 
                        });
                    }else if(operation = 'minus'){
                        display.forEach((element) => {
                            let currentValue = Number(element.value);
                            element.value = Math.floor(currentValue-1);
                            if(element.value < 1){
                                element.value = 1;
                            }
                        });
                    }
                });
            });
        }
        oprate(plus,'add');
        oprate(minus,'minus');
    </script>
@endsection
@section('main-scripts')
    <script src="{{ asset('store/js/shoppingcart.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
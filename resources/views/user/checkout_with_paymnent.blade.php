@extends('layouts.main')
@section('title', 'shoemaka | online shoping for shoes')
@section('description', 'Shop for your favourite shoe brands in Nigeria')
@section('content')
<section class="flex column middle col-lg-6">
    <section class="flex column no-wrap center col-lg-6">
        <h1 class="featured-header">Checkout</h1>
        <div class="flex flex-wrap center col-lg-6">
    @if (!Cart::isEmpty())
        <div class="flex column no-wrap">
            <ul class="flex column no-wrap checkout-address">
                <li class="flex middle li-heading">
                    <p class="strong"><i class="ion-ios-home"></i> Delivery address</p>
                </li>
                @if(count($data['deliveryAddress']) != 0)
                <li class="flex column">
                    @foreach($data['deliveryAddress'] as  $ads)
                    <p class=" flex middle"> <i class="icon-xx ion-md-contact"> </i> {{ $ads->name }} </p>
                    <p class=" flex middle"> <i class="icon-xx ion-md-pin"> </i> {{ $ads->address." ". $ads->city." ". $ads->state." ". $ads->country }} </p>
                    <p class="flex middle"> <i class="icon-xx ion-ios-call"> </i> {{ $ads->phone }} </p>
                    <p class="flex middle"><a class=" flex center text-14 mar-15" href="{{ route('address.edit', $ads->id) }}">Edit</a></p>
                    @endforeach
                </li>
                @else
                <li class="flex column center">
                    <div class="flex center">
                        <p><a class="like-button-hollow" href="{{route('address.create')}}">Add delivery address</a></p>
                    </div>
                </li>
                @endif
            </ul>

        <ul class="flex column cart-ul">
            <li class="flex middle li-heading">
                <p class="strong"><i class="ion-ios-paper"></i> Order review</p>
            </li>
        @foreach ($data['cartContent'] as $cart)
            <li class="flex no-wrap middle cart-items">
                <div class="flex center middle cart-img-holder">
                    <a href="{{ route('product.detail', [$cart->attributes->slug, $cart->attributes->sku]) }}"><img src="{{ $cart->attributes->image }}" alt="{{ $cart->name }}"></a>
                </div>
                <div class="flex flex-wrap mar-lr">
                    <div class="flex no-wrap space-between first-cart-div">
                        <div class="flex">
                            <p><a href="{{ route('product.detail', [$cart->attributes->slug, $cart->attributes->sku]) }}">{{ str_limit($cart->name, $limit=17) }}</a></p>
                        </div>
                        <div class="flex">
                            <p>
                                @if ($cart->attributes->discount != 0 || $cart->attributes->discount != null)
                                    <del>N</del>{{ number_format($cart->attributes->discountedPrice, 2) }}
                                @else
                                    <del>N</del>{{ number_format($cart->price, 2) }}
                                @endif
                            </p>
                        </div>  
                    </div>
                    <div class="flex no-wrap space-between second-cart-div">
                        <div class="increment">
                            <a href="#" class="button add">+</a>
                            <input value="{{ $cart->quantity }}" class="in-screen product-amount-input" type="number" name="" id="" step="1" min="1" max="" inputmode="numeric">
                            <a href="#" class="button sub">-</a>
                        </div>
                        <div class="flex">
                            <a href="#" data-id="{{ $cart->id }}" class="close-button deleteOneItem">
                                <i class=" cart-delete-icon icon ion-md-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
        </div>
        <div class="flex column no-wrap cart-summary">
            <div class="flex space-between">
                <p><b>Cart summary:</b></p>
                <p><b>{{ count(Cart::getContent()) }} Item(s)</b></p>
            </div>
            <div class="flex space-between">
                <p class="text-14">Sub-total:</p>
                <p><b>{{ number_format(Cart::getSubTotal(), 2) }}</b></p>
            </div>
            <div class="flex space-between">
                <p class="text-14">Delivery:</p>
                <p><b>1,100.00</b></p>
            </div>
            <div class="flex space-between">
                <p class="text-14"><b>TOTAL:</b></p>
                <p><b>{{ number_format($data['cartTotal'], 2) }}</b></p>
            </div>
            <div class="flex center">
                <form >
                    <script src="https://js.paystack.co/v1/inline.js"></script>
                    <button class="like-button" type="button" onclick="payWithPaystack()"> Pay </button> 
                </form>
            </div>
        </div>
    @else
        <h5>Your cart is empty</h5>
    @endif
        </div> 
    </section>
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
                            if(element.value < 0){
                                element.value = 0;
                            }
                        });
                    }
                });
            });
        }
        oprate(plus,'add');
        oprate(minus,'minus');
    </script>
    <script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_live_409c25323bb22f3316b2d19ca5f4906e84b7bf5b',
      email: 'customer@email.com',
      amount: 10000,
    //   ref: ''+Math.floor((Math.random() * 1000000000) + 1),  generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
          console.log(response);
          $.ajax({
                url: '/order',
                type: 'POST',
                data: {
                    reference: reference,
                    status: status,
                    transaction_number: transaction_number,
                    comment: comment,
                    amount: amount,
                    size: size,
                },
                dataType: 'json',
                success: function (data) {
                    swal ({
                        title: "success",
                        text:  "Payment & Ordering successfull.",
                        icon:  "success"
                    });
                },
                error: function (xhr, status, error) {
                    swal ({
                        title: "ERROR",
                        text:  "unable make payment please try again later.",
                        icon:  "error"
                    });
                }
            });
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>
@section('main-scripts')
    <script src="{{ asset('store/js/shoppingcart.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
@endsection
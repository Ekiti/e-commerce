@extends('layouts.main')
@section('title', 'About')
@section('content')
    <section class="flex column center middle col-lg-6">
        <div class="flex center middle col-lg-6 hero-2" style="background: url({{ URL::asset('./images/shoes.jpg') }}) center center; background-size: 100% auto;">
            <h1 class="flex center middle">walk a step in our shoes</h1>
        </div>
        <div class="flex center col-lg-4">
            <div class="flex middle column center col-lg-5">
                <h1 class="classic-heading"> About {{ $settings->name }} </h1>
                <p class="text-21 text-center mar-ub-30">
                Shopaholiq is a Nigerian Brand. Our goal is to be at the forefront — offering classic styles that represent quality, comfort, and value. looking good doesn’t have to be ostentatious.

We believe shoes play a very important role in any wardrobe, from suits to jeans, and if you don’t have on a great pair then you might as well call it a day. That is a major reason why we provide a tightly edited selection of styles. We’re great believers in the expression “less is more,” and we try to make finding the perfect item as simple as possible.

If you are unable to find exactly what you are looking for, we also specialize in custom-made footwear. We help you facilitate the process whereby you can create the shoes of your dreams.

In addition, we take a serious interest in what else you wear and we actively look for unique accessories to enhance your personal sense of style.

Our goal is to lead the way as trusted advisers for your footwear and accessory needs, and to continue to present interesting merchandise and events that enhance your lifestyle.                </p>
            </div>
        </div>
    </section>
@endsection
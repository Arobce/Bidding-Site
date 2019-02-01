@extends('layouts.app')

@section('content')

<div class="home-category-section columns">
    <div class="first large column"><img src="{{asset('assets/laptop_banner.jpg')}}"></div>
    <div class="second-top small column"><img src="{{asset('assets/mobile_banner.jpg')}}"></div>
    <div class="third-bottom small column"><img src="{{asset('assets/car_banner.jpg')}}"></div>
</div>

<div class="featured-section">
    <h1 class="subtitle">Featured</h1>
    <hr>
    <div class="columns">
        @foreach($featuredProducts as $product)
        <div class="product-column column is-one-fifth">
            <a class="product-link" href="/product/{{$product->id}}">
                <div class="product-card card">
                    <div class="card-image">
                        <img src="{{$product->image_url}}">
                    </div>
                    <div class="card-timer">
                         <span class="hour">{{substr($product->remaining_time,0,2)}}</span> :
                         <span  class="minute">{{substr($product->remaining_time,strpos($product->remaining_time,':')+1,strpos($product->remaining_time,':'))}}</span> :
                         <span  class="second">{{substr($product->remaining_time,-2)}}</span>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <span class="name">{{$product->name}}</span>
                            <br>
                            <span class="price">Rs. {{$product->final_price}}</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>

<div class="new-section">
        <h1 class="subtitle">New Products</h1>
        <hr>
        <div class="columns">
            @foreach($newProducts as $product)
            <div class="product-column column is-one-fifth">
                <a class="product-link" href="/product/{{$product->id}}">
                    <div class="product-card card">
                        <div class="card-image">
                            <img src="{{$product->image_url}}">
                        </div>
                        <div class="card-timer">
                            <span class="hour">{{substr($product->remaining_time,0,2)}}</span> :
                            <span  class="minute">{{substr($product->remaining_time,strpos($product->remaining_time,':')+1,strpos($product->remaining_time,':'))}}</span> :
                            <span  class="second">{{substr($product->remaining_time,-2)}}</span>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <span class="name">{{$product->name}}</span>
                                <br>
                                <span class="price">Rs. {{$product->final_price}}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
    
        </div>
</div>

<script>

</script>

@endsection
@extends('layouts.app')

@section('content')


<div class="featured-section product-categories">
    <h1 class="subtitle">Categories</h1>
    <hr>
    <div class="columns">
        @foreach($products as $product)
          <div class="column is-half">
                <a href="{{url('product/category/'.$product->category)}}"> 
                    <div class="tile">
                        {{ucfirst($product->category)}}
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</div>


@endsection
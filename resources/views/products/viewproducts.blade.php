@extends('layouts.app')

@section('content')


<div class="product">
    <div class="columns">
        <div class="column is-one-third">
            <img src="{{$product->image_url}}" alt="">
        </div>    
        <div class="column">
            <p class="product-title">{{$product->name}}</span><br>

            <p class="product-price">Rs. {{$product->final_price}}</span><br>

            <div class="card-timer product-timer">
                <span class="hour">{{substr($product->remaining_time,0,2)}}</span> :
                <span  class="minute">{{substr($product->remaining_time,strpos($product->remaining_time,':')+1,strpos($product->remaining_time,':'))}}</span> :
                <span  class="second">{{substr($product->remaining_time,-2)}}</span>
            </div>
            

            <p class="bids-title">Current Bids</p>
            @if(count($bids)==0)
                    <p class="no-bids-message">No current bids for this product.</p>

            @else
                
                <table class="table is-fullwidth">
                

                    <thead>
                        <tr>
                            <td>DateTime</td>
                            <td>Bid</td>
                        </tr>
                    </thead>

                
                    
                    @foreach($bids as $bid)
                    <tbody>
                        <tr>
                            <td>{{$bid->created_at}}</td>
                            <td>Rs. {{$bid->amount}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            <p class="bids-title">Bid</p>
            @if(Auth::check())
            <form action="{{url('/bid')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="number"  class="input" name="bid">
                <input type="submit" class="button" value="Bid">
            </form>
            @else
                <p class="login-message">Login/Register to bid.</p>
            @endif

        </div>
    </div>
    <div class="container">
        <div class="bids-title">
            Product Description: 
        </div>
        {!!$product->description!!}
    </div>
</div>


@endsection
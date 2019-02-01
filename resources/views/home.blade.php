@extends('layouts.myaccount')

@section('accountcontent')
<div class="added-products account-content">
    <table class="table is-striped is-fullwidth">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Initial Price</th>
                            <th>Final Price</th>
                            <th>Added Date</th>
                        </tr>
                    </thead>
                    
                    @foreach($addedProducts as $addedProduct)
                    <tbody>
                        <tr>
                            <td><a href="{{url('/product/'.$addedProduct->id)}}">{{$addedProduct->name}}</a></td>
                            <td>Rs. {{$addedProduct->initial_price}}</td>
                            <td>Rs. {{$addedProduct->final_price}}</td>
                            <td>{{$addedProduct->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
    </table>
</div>

@endsection

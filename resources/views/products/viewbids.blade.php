@extends('layouts.myaccount')

@section('accountcontent')
<div class="view-bids account-content">
    <table class="table is-striped is-fullwidth">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Bids Placed</th>
                            <th>Placed DateTIme</th>
                        </tr>
                    </thead>
                    
                    @foreach($bidsMade as $bidMade)
                    <tbody>
                        <tr>
                            <td><a href="{{url('/product/'.$bidMade->id)}}">{{$bidMade->name}}</a></td>
                            <td>Rs. {{$bidMade->amount}}</td>
                            <td>{{$bidMade->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
    </table>
</div>  

@endsection

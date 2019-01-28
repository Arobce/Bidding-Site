@extends('layouts.myaccount')

@section('accountcontent')
<div class="add-products account-content">
    <form method="POST" action="{{url('/add-product')}}">
            @csrf
            <label for="name" class="label">Product Name:</label>
            <input class="input" type="text" placeholder="Product Name" name="name">
            <label for="url" class="label">Product Image URL:</label>
            <input class="input" type="text" placeholder="Image URL" name="image_url">
            <label for="description" class="label">Description:</label> 
            <textarea name="description"></textarea>
            <label for="category" class="label">Product Category:</label>
            <div class="select" name="category">
                <select name="category">
                        <option>Select Product Category</option>
                        <option value="Home Appliances">Home Appliances</option>
                        <option value="vehicle">Vehicle</option>
                        <option value="computers">Computers</option>
                        <option value="phones">Mobile</option>
                </select>
            </div>
            <label for="initial_price" class="label">Initial Price:</label>
            <input class="input" type="number" placeholder="Inital Price" name="initial_price">
            <input type="submit" class="button" value="Add Product">
    </form>
</div>  

@endsection

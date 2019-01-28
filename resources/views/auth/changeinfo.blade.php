@extends('layouts.myaccount')

@section('accountcontent')
<div class="add-products account-content">
    <form>
            @csrf
            <label for="name" class="label">Name:</label>
            <input class="input" type="text" placeholder="Name" name="name" value="{{ Auth::user()->name }}">
            
            <label for="email" class="label">Email:</label>
            <input class="input" type="text" placeholder="Image URL" name="email" value="{{ Auth::user()->email }}">
            
            <label for="description" class="label">Phone:</label> 
            <input class="input" type="number" placeholder="Phone" name="phone" value="{{ Auth::user()->phone }}">
             
            <label for="password" class="label">New Password:</label>
            <input class="input" type="password" placeholder="Password" name="password">
            
            <input type="submit" class="button" value="Update Info">
    </form>
</div>

@endsection

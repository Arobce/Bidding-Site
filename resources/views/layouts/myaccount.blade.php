@extends('layouts.app')

@section('content')
<h1 class="subtitle">My Account</h1>
<hr>

<div class="columns is-3">
    <div class="column sidebar is-one-fifth">
        @include('partials.accountSidebar')
    </div>
    <div class="column ">
        @yield('accountcontent')
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
<div class="py-3 py-md-4 checkout">
    <div class="container">
        <h4>Checkout</h4>
        <hr>
        <livewire:frontend.checkout.checkout-show/>
      
    </div>
</div>

@endsection
  
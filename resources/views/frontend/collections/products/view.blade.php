@extends('layouts.app')
@section('title')
{{ $product->meta_title }}
@endsection
@section('content')
    <livewire:frontend.product.view :product="$product" :category="$category"/>
@endsection 
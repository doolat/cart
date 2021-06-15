@extends('main')
@section('header')
    <a href="{{route('products')}}"><button class="bg-success text-light d-inline" style="float: left;height: 60px;width: 60px;">Main</button></a>
    <h2 class="text-danger text-center">Product</h2>
@endsection
@section('content')
    <div class="container">
        <h2>{{$product->name}}</h2>
        <h3>{{$product->cost}}</h3>
        <p>{{$product->description}}</p>
    </div>
@endsection

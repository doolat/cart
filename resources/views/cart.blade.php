@extends('main')
@section('header')
    <a href="{{route('products')}}"><button class="bg-success text-light d-inline" style="float: left;height: 60px;width: 60px;">Main</button></a>
    <h2 class="text-danger text-center">Cart</h2>
@endsection
@section('content')
    <div class="container">
{{--        @foreach($products as $product)--}}
{{--            <p>{{$product->name}}</p>--}}
{{--        @endforeach--}}
        <div class="container p-1 m-1" style="margin-top: 5px">
            @foreach($products as $product)
                @csrf
                <div style="border-radius:3px ; background-color: #7a9fbd; height: 60px;" class="container product-div">
                    <b>{{$product->cost}} </b>
                    <b>{{$product->name}} </b>
                    <b>{{$product->description}}</b>
                    <input type="number" step="1" data-id="{{$product->id}}" value="{{$product->quantity}}" style="float: right; width: 50px">
                </div>
                <br>
            @endforeach
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        $(document).ready(function (){
            $('input[type=number]').click(function (){
                $.ajax({
                    type: "POST",
                    url: "{{route('postCart')}}",
                    data: {
                        id : $(this).data('id'),
                        quantity : $(this).val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        console.log(data);
                        alert(data);
                    },
                })
            })
        });

    </script>
@endsection

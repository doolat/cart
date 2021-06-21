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
                <div style="border-radius:3px ; background-color: #7a9fbd; height: 60px; float: left; display: inline" class="container product-div">
                    <b>{{$product->cost}} </b>
                    <b>{{$product->name}} </b>
                    <b style="margin-right: 80px;">{{$product->description}}</b>
                    <input type="number" step="1" data-id="{{$product->id}}" value="{{$product->quantity}}" style="width: 50px" min="1">
                    <button data-id="{{$product->id}}" id="{{$product->id}}" class="btn-danger btn remove-from-cart" style=" border-radius: 2px; float: right">Remove</button>
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
            let a=1;
            $(".remove-from-cart").click(function (e) {
                e.preventDefault();
                ++a;
                // console.log('Click'+a);
                $(this).parent().remove();
                // alert($(this).parent().text());
                let id = $(this).data('id');
                $.ajax({
                    type: "DELETE",
                    url: "{{route('deleteCart')}}",
                    data: {
                        id : id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        alert(data);
                    },
                });

            });
        });

    </script>
@endsection

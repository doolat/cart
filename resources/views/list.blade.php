@extends('main')
@section('header')
    <h2 class="text-danger text-center">GroWave products</h2>
@endsection
@section('content')
    <div class="container">
        <div class="container p-1 m-1" style="margin-top: 5px">
            @foreach($products as $product)
                @csrf
                    <div style="border-radius:3px ; background-color: #7a9fbd; height: 60px;" class="container product-div">
                        <a href="{{route('product',$product->id)}}">
                            <b>{{$product->cost}} </b>
                            <b>{{$product->name}} </b>
                            <b>{{$product->description}}</b>
                        </a>
                        <button type="button" data-id="{{$product->id}}" id="{{$product->id}}" class="btn-danger btn add-to-cart" style="float: right; border-radius: 2px;">Add to cart</button>
                    </div>
                <br>
            @endforeach
        </div>
        <div id="news"></div>
        <ul>
            <li>Java</li>
            <li>C/C++</li>
            <li>JavaScript</li>
        </ul>
        <button id="show">Показать</button>
        <button id="hide">Скрыть</button>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        $(document).ready(function() {
            $(".add-to-cart").click(function (e) {
                e.preventDefault();
                $(this).css('background-color', 'green');
                // alert($(this).parent().text());
                let id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "{{route('postCart')}}",
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
            // $('button#show').click(function () {
            //     $('ul').show();
            // });
            // $('button#hide').click(function () {
            //     $('ul').hide()  ;
            // });
        });

    </script>

@endsection

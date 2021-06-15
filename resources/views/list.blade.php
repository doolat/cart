@extends('main')
@section('header')
    <h2 class="text-danger text-center">GroWave products</h2>
@endsection
@section('content')
    <div class="container">
        <div class="container p-1 m-1" style="margin-top: 5px">
            @foreach($products as $product)
                    <div style="border-radius:3px ; background-color: #7a9fbd; height: 60px;" class="container id-{{$product->id}} product-div">
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
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        $(document).ready(function(){
            $(".add-to-cart").click(function(){
                // let elmId = parseInt($(this).attr("id"));
                $(this).css('background-color', 'green');
                // let id = $(this).attr('data-id');
                alert($(this).attr('id'));
            });
            // var mass=[];
            // $('button').each(function (){
            //     mass.push($(this).data('id'));
            // });
            // alert(mass);
            // let pr = $('product-div').children('a');
            // alert(pr.prop('href'));
            // let arr = [];
            // $('button').each(function (){
            //     arr.push($(this).attr('data-id'));
            // });
            // alert(arr);
        });
        // let actionTotalPrice = 0;
        // let allTotalPrice = 0;
        // let allProductTotalPrice = 0;
        // $(document).on('click', '.remove-product-data', function () {
        //     allTotalPrice = 0;
        //     $(this).parent().remove();
        //     $('span.total-product-price-span').each(function () {
        //         allTotalPrice += parseInt($(this).text());
        //     });
        //     $('span.total-action-price-span').each(function () {
        //         allTotalPrice += parseInt($(this).text());
        //     })
        //     $('.form-main').find('.total-total-price').html('<h5>Общая сумма: <span class="total-total-price-span">'+
        //         allTotalPrice
        //         +'</span>  сом</h5>');
        //     $('.total-input-value').val();
        // });
        //
        // $( ".change-product-quantity" ).change(function() {
        //     var newQuantity = parseInt($(this).val());
        //     var productPrice = parseInt($(this).attr('data-price'));
        //     var index = $(this).attr('data-key');
        //
        //     $('.form-main').find('.total-product-price-'+index).html('Общая сумма: <span class="total-product-price-span">'+
        //         productPrice * newQuantity
        //         +'</span>  сом');
        //
        //     allProductTotalPrice = 0;
        //     allTotalPrice = 0;
        //     $('span.total-product-price-span').each(function () {
        //         allProductTotalPrice += parseInt($(this).text());
        //         // console.log(allProductTotalPrice);
        //     });
        //     if (actionTotalPrice === 0) {
        //         $('span.total-action-price-span').each(function () {
        //             actionTotalPrice += parseInt($(this).text());
        //         });
        //     }
        //     allTotalPrice += actionTotalPrice+allProductTotalPrice;
        //     // console.log(allTotalPrice);
        //     $('.form-main').find('.total-total-price').html('<h5>Общая сумма: <span class="total-total-price-span">'+
        //         allTotalPrice
        //         +'</span>  сом</h5>');
        // });
        //
        //
        // $( ".change-action-quantity" ).change(function() {
        //     var newQuantity = parseInt($(this).val());
        //     var actionPrice = parseInt($(this).attr('data-price'));
        //     var index = $(this).attr('data-key');
        //
        //     $('.form-main').find('.total-action-price-'+index).html('Общая сумма: <span class="total-action-price-span">'+
        //         actionPrice * newQuantity
        //         +'</span>  сом');
        //     actionTotalPrice = 0;
        //     allTotalPrice = 0;
        //     $('span.total-action-price-span').each(function () {
        //         actionTotalPrice += parseInt($(this).text());
        //     });
        //     if (allProductTotalPrice === 0) {
        //         $('span.total-product-price-span').each(function () {
        //             allProductTotalPrice += parseInt($(this).text());
        //         });
        //     }
        //     allTotalPrice += actionTotalPrice+allProductTotalPrice;
        //     // console.log(allTotalPrice);
        //     $('.form-main').find('.total-total-price').html('<h5>Общая сумма: <span class="total-total-price-span">'+
        //         allTotalPrice
        //         +'</span>  сом</h5>');
        //     $('.total-input-value').val();
        // });

    </script>

@endsection

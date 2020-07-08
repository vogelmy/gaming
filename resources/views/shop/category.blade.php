@extends('template')
@section('content')

<h1 class="mb-5">{{strtoupper($category->name)}}</h1>
@if($category->products->isEmpty())
<h3>We don't have anything to offer...</h3>
@endif
<div class="row">
    @foreach ($category->products as $product)
    <div class="col-md-4 mb-5">
        <div class="pro-container">
            <h3>{{strtoupper($product->name)}}</h3>
            <a href='{{url()->current() . '/' . $product->slug}}'><img src="{{asset('images/products/' . $product->image)}}"></a>
            <h4>&#8362;{{$product->price}}</h4>
            <a class="btn btn-primary" href="">ADD TO CART</a>
            <a class="btn btn-info" href="{{url()->current() . '/' . $product->slug}}">READ MORE</a>
        </div>
    </div>
    @endforeach
</div>
@endsection

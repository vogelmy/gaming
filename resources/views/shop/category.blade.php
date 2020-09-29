@extends('template')
@section('content')

<h1 class="mb-5">{{strtoupper($category->name)}}</h1>

<div class="row">
    <form method="post" action="{{url()->current().'/sort-low-cart'}}">
        @csrf
        <input type="submit" class="btn btn-info mb-5" value="Sort by lowest price">
    </form>

    <form method="post" action="{{url()->current().'/sort-high-cart'}}">
        @csrf
        <input type="submit" class="btn btn-warning mb-5 ml-2" value="Sort by highest price">
    </form>
</div>


@if($category->products->isEmpty())
<h3>We don't have anything to offer...</h3>
@endif
<div class="row">
    @foreach ($category->products as $product)
    <div class="col-md-4 mb-5">
        <div class="pro-container">
            <h3>{{strtoupper($product->name)}}</h3>
            <a href='{{url()->current() . '/' . $product->slug}}'><img src="{{asset('storage/' . $product->image)}}"></a>
            <h4>&#8362;{{$product->price}}</h4>
            <a href="{{url('add-to-cart/' . $product->id)}}" class="add-to-cart btn btn-primary" >ADD TO CART</a>
            <a class="btn btn-info" href="{{url()->current() . '/' . $product->slug}}">READ MORE</a>
        </div>
    </div>
    @endforeach
</div>
@endsection

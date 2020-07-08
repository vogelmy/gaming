@extends('template')
@section('content')

<div class="row">
    <div class="col-md-7">
        <h1>{{strtoupper($product->name)}}</h1>
        <p>{{$product->description}}</p>
        <p>Only for: &#8362; {{$product->price}}</p>
        <form>
            <div class="number">
                <span class="minus">-</span>
                <input type="text" value="1"/>
                <span class="plus">+</span>
                <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </form>
    </div>
    <div class="col-md-5">
        <img src="{{asset('images/products/' . $product->image)}}">
    </div>
</div>
@endsection

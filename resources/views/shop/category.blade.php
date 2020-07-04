@extends('template')
@section('content')

<h1 class="mb-5">Category page</h1>
@if($categories->isEmpty())
<h2>We don't have anything to offer.</h2>
@endif
<div class="row">
    @foreach ($categories as $category)
    <div class="col-md-4 mb-5">
        <div class="cat-container">
            <h3>{{strtoupper($category->name)}}</h3>
            <a class="stretched-link" href='{{url('shop/' . $category->slug)}}'><img src="{{asset('images/categories/' . $category->image)}}"></a>
        </div>
    </div>
@endforeach
</div>
@endsection

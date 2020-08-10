@extends('admin.template')
@section('admin-content')

<h1>Add new Product</h1>

<form class="clearfix" method="post" action="{{url('admin/products')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug">
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" id="category" name="category">
            <option value="0">Choose category</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" step="0.01">
    </div>
    <div class="form-group">
        <label for="slug">Description</label>
        <textarea class="form-control" id="description" name="description" rows="6"></textarea>
    </div>

    <div class="form-group">
        <label for="image">Upload image</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="float-right btn btn-primary">Submit</button>
</form>
@endsection
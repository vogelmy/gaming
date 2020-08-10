@extends('admin.template')
@section('admin-content')

<h1>Edit category</h1>

<form class="clearfix" method="post" action="{{url('admin/categories/' . $category->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
    </div>
    <div class="form-group">
        <img class="admin-thumbnail" src="{{asset('storage/' . $category->image)}}">
        <label for="image">Upload new image</label>
        <input type="file" class="form-control-file" id="image" name="image">
        <p>Leave empty to keep the original image.</p>
    </div>
    <button type="submit" class="float-right btn btn-primary">Submit</button>
</form>
@endsection
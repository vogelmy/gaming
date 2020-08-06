@extends('admin.template')
@section('admin-content')

<h1>Add new category</h1>

<form class="clearfix" method="post" action="{{url('admin/categories')}}" enctype="multipart/form-data">
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
            <label for="image">Upload image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
    <button type="submit" class="float-right btn btn-primary">Submit</button>
</form>
@endsection
@extends('template')
@section('content')

<h1>Login</h1>

<div class="row">
    <div class="col-md-8">
        <form class="clearfix" method="post" action="{{url('signup')}}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary float-right">Login</button>
        </form>
    </div>
</div>
@endsection
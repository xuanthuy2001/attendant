@extends('layout.master')
@section('title',$title)
@section('css')
<link href="{{ asset('css/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<form class="mt-5">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">Well never share your email with anyone else.</small>
    </div>
    <div class="form-group"&ggt;
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group mb-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="checkmeout0">
            <label class="custom-control-label" for="checkmeout0">Check me out !</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection


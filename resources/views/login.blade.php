@extends('layout')
@include('navbar')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-8 offset-2">
    <form action="/login" method="POST">
        @csrf
        <h1>Login</h1>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
    </div>
</div>
@extends('layout')
@include('navbar')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-8 offset-2">
    <form action="/register" method="POST">
        @csrf
        <h1>Register</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"n class="form-control" name="name" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    </div>
    </div>
</div>
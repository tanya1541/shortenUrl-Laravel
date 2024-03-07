@extends('layout')
@include('navbar')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-8 offset-2">
        @auth
    <form action="/addurl" method="POST">
        @csrf
        <h1>Add URL</h1>
        <div class="mb-3">
            <label for="title" class="form-label">Title: </label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="originalUrl" class="form-label">URL: </label>
            <input type="text" class="form-control" name="originalurl">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endauth
    @guest
    <p>Register or login</p>
    @endguest
    </div>
    </div>
</div>
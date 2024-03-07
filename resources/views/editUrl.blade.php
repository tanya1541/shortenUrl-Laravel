@extends('layout')
@include('navbar')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-8 offset-2">
        @auth
    <form action="/editurl/{{$url->id}}" method="POST">
        @csrf
        @method('PUT')
        <h1>Edit Title</h1>
        <div class="mb-3">
            <label for="title" class="form-label">Title: </label>
            <input type="text" class="form-control" name="title" value="{{$url['title']}}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    @endauth
    @guest
    <p>Register or login</p>
    @endguest
    </div>
    </div>
</div>
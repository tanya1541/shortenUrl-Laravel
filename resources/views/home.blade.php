@extends('layout')
@include('navbar')

@section('content')
<div class="container">
    @auth
    <h1 class="my-3">Welcome, {{$name}}!</h1>
    <h2 class="my-3">Shortened URLs</h2>
    @if (!count($urls))
        <p>Empty! Add URLs.</p>
    @endif 
    @foreach($urls as $url)
        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title">
                    <h4>{{$url['title']}}</h4>
                    <h6>
                        <a href="/{{$url['shortenedUrl']}}">http://localhost:8000/{{$url['shortenedUrl']}}</a>
                    </h6>
                </div>
                <div class="card-text">
                    {{$url['originalUrl']}}
                </div> 
                <form action="/deleteurl/{{$url->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger float-right m-2">
                        Delete
                    </button>
                </form>
                <a class="btn btn-primary float-left mt-2" href="/editurl/{{$url->id}}">
                    Edit
                </a>
            </div>
        </div>  
        @endforeach
    @endauth

    @guest
    <h3 class="mt-3">Register or login!</h3>
    @endguest
</div>

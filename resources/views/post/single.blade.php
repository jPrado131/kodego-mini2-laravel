@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row mb-3 text-end">
        <div class="col">
            <a class="btn btn-secondary" href="{{route('post.index')}}">Back To post list</a>
        </div>
    </div>
    <div class="card">
        @if($post->thumbnail_url)
            <img src="{{ $post->thumbnail_url}}" class="card-img-top" alt="Post Image">
        @else
            <img src="https://via.placeholder.com/600x400" class="card-img-top" alt="Post Image">
        @endif

        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text"><small class="text-muted">Posted on {{ $post_formateddate }}</small></p>
            <p class="card-text">{!! $post->content !!}</p>
        </div>
    </div>
</div>

@endsection
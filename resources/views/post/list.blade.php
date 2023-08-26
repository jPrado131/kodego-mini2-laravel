@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row mb-3">
        <div class="col">
            <h3 class="mt-4">NEWS FEEDS</h3>
        </div>
        <div class="col text-end">
            <a class="btn btn-secondary" href="{{route('post.create_get')}}">Create Post</a>
        </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
        @foreach($data as $item)
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
                
                <div class="card-header d-flex align-items-center">
                    @if($item->author_data->thumbnail)
                    <img src="{{$item->author_data->thumbnail}}" alt="User Profile" class="rounded-circle mr-3" style="margin-right: 10px; width: 50px;height: 50px;">
                    @else
                        <img src="https://via.placeholder.com/40" alt="User Profile" class="rounded-circle mr-3" style="margin-right: 10px; width: 50px;height: 50px;">
                    @endif

                    <h5 class="mb-0">{{$item->author_data->name}}</h5>
                </div>
                <a href="/post/{{$item->post->id}}">
                    @if($item->post->thumbnail_url)
                        <img src="{{$item->post->thumbnail_url}}" class="card-img-top" alt="Post Image">
                    @else
                        <img src="https://via.placeholder.com/600x400" class="card-img-top" alt="Post Image">
                    @endif
                </a>
                
                <div class="card-body">

                    <div class="card-text">
                        <h4>{{$item->post->title }}</h4>
                        {!! $item->limitedText !!}
                    </div>
                    <hr>
                    <a href="#" class="card-link">Like</a>
                    <a href="#" class="card-link">Comment</a>
                    <a href="#" class="card-link">Share</a>
                </div>
            </div>
        </div>
        @endforeach      
      </div>
</div>

@endsection
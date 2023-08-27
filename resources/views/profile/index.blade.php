@extends('layouts.app')
@section('content')


<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea.witheditor'
    });
  </script>
<div class="container">
    <div class="container mt-5">
        <div class="row mb-3 text-end">
            <div class="col">
                <a class="btn btn-primary" href="{{route('post.create_get',['page'=>'profile'])}}">Create Post</a>
                <a class="btn btn-primary" href="{{route('profile.edit')}}">Edit Profile</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    @if ($profile_data[0]->thumbnail)
                        <img src="{{ $profile_data[0]->thumbnail}}" class="card-img-top" alt="Profile Picture">
                    @else
                        <img src="{{ asset('images/image-placeholder-500x500.jpg') }}" class="card-img-top" alt="image-placeholder">
                    @endif
                   
                    <div class="card-body">
                        <h5 class="card-title">{{$profile_data[0]->first_name." ".$profile_data[0]->last_name}}</h5>
                        <p class="card-text">@if($profile_data[0]->role == 1) Professional Marites <span class="badge text-bg-success float-end">ADMIN</span> @else Newbie Marites @endif</p>
                    </div>
                </div>
                <h2>Contact Information</h2>
                <ul class="list-group">
                    <li class="list-group-item">User Name: {{$user_data[0]->name}}</li> 
                    <li class="list-group-item">Email: {{$user_data[0]->email}}</li>
                    <li class="list-group-item">First Name: {{$profile_data[0]->first_name}}</li>
                    <li class="list-group-item">First Last: {{$profile_data[0]->last_name}}</li>
                    <li class="list-group-item">Phone: {{$profile_data[0]->phone}}</li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="bio">
                    <h2>About Me</h2>
                    <p>{!! $profile_data[0]->about_me !!} </p>
                </div>
                <div id="posts">
                    <div class="row">
                        @foreach($posts as $item)
                          <div class="col-6">
                            <div class="card mb-4">
                                
                                <div class="card-header d-flex align-items-center">
                                    <a class="btn @if($item->post->status == 'publish') btn-success @else btn-warning @endif  mb-0 ml-auto" style="margin-left: auto;">{{$item->post->status}}</a>
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
            </div>
        </div>
    </div>
</div>
@endsection
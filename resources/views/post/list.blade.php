@extends('layouts.app')
@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container my-5">
    {{-- <div class="row mb-3">
        <div class="col text-end">
            <a class="btn btn-primary" href="{{route('post.create_get')}}">Create Post</a>
        </div>
    </div> --}}
    
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
                
                    @if($item->post->type == 'event') 
                        <span class="badge text-bg-warning" style="margin-left:auto;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                          </svg> EVENT</span>
                    @elseif($item->post->type == 'announcement')
                        <span class="badge text-bg-danger" style="margin-left:auto;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-megaphone-fill" viewBox="0 0 16 16">
                            <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"/>
                          </svg> ANNOUNCEMENT</span>
                    @endif
            

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
                    <div class="text-end">
                        {{ $item->hear_post_count }} Hearts | {{ $item->comment_count }} Comments
                    </div>
                    <hr>
                    @livewire('heart-post', ['post' => $item->post, 'default' => $item->heart_post_default])
                    <a href="/post/{{$item->post->id}}#comment-section" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"></path>
                        </svg>
                        Comment
                    </a>
                    <a href="/post/{{$item->post->id}}" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                        <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"></path>
                        </svg>
                        Read More
                    </a>
                </div>
            </div>
        </div>


    
        @endforeach      
      </div>
</div>

@endsection
@livewireScripts
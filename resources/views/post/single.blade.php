@extends('layouts.app')
@section('content')
<div id="single-page">
<div class="container my-5 post-item">
    <div class="row mb-3">
        <div class="col d-flex align-items-center">
            <a href="/profile?id={{$author_data->id}}" class="d-flex align-items-center" target="_blank" style="text-decoration:none;color:#333;">
                @if($author_data->thumbnail)
                    <img src="{{$author_data->thumbnail}}" alt="User Profile" class="rounded-circle mr-3" style="margin-right: 10px; width: 50px;height: 50px;">
                @else
                    <img src="https://via.placeholder.com/40" alt="User Profile" class="rounded-circle mr-3" style="margin-right: 10px; width: 50px;height: 50px;">
                @endif
                <h5 class="mb-0">
                    {{$author_data->name}}
                    <small>{{ $posted_time }}</small>
                </h5>
            </a>

            @if($post->type == 'event') 
            <span class="badge text-bg-warning" style="margin-left:20px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
            </svg> EVENT</span>
            @elseif($post->type == 'announcement')
                <span class="badge text-bg-danger" style="margin-left:20px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-megaphone-fill" viewBox="0 0 16 16">
                    <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"/>
                </svg> ANNOUNCEMENT</span>
            @endif
        </div>
        <div class="col text-end">
            @if($user->id == $post->author)
                <a class="btn btn-primary" href="/post/{{$post->id}}/edit">Edit</a>
                <form id="deletepost" action="{{ route('post.delete', ['post_id' => $post->id]) }}" method="POST" style="display: inline-block;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirmSubmit()">Delete</button>
                </form>
            @endif
            <a class="btn btn-secondary" href="{{ URL::previous() }}">Back</a>
        </div>
    </div>
    <div class="card">
        @if($post->thumbnail_url)
            <img src="{{ $post->thumbnail_url}}" class="card-img-top" alt="Post Image">
        @else
            <img src="https://via.placeholder.com/600x400" class="card-img-top" alt="Post Image">
        @endif

        <div class="card-body">
            <h4 class="card-title">{{$post->title}}</h4>
            <p class="card-text">{!! $post->content !!}</p>
            <div class="text-end">
                {{ $hear_post_count }} Hearts | {{ $comment_count }} Comments
            </div>
            @livewire('heart-post', ['post' => $post, 'default' => $heart_post_default])
        </div>
    </div>
</div>
<div id="comment-section"class="container">
    @livewire('comment', ['post' => $post])
</div>
</div>

<script type="text/javascript">
    function confirmSubmit() {
    
        if (confirm("Are you sure you want to delete this post?")) {
            // User clicked "OK"
            document.getElementById("deletepost").submit();
        } else {
            // User clicked "Cancel"
            // You can add any other actions you want to perform here
            console.log("Form submission canceled.");
            return false;
        }
    
    }
</script>
@livewireScripts
@endsection

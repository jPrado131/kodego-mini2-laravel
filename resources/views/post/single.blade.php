@extends('layouts.app')
@section('content')

<div class="container my-5">
    <div class="row mb-3 text-end">
        <div class="col">
            @if($user->id == $post->author)
                <a class="btn btn-primary" href="/post/{{$post->id}}/edit">Edit</a>
                <form id="deletepost" action="{{ route('post.delete', ['post_id' => $post->id]) }}" method="POST" style="display: inline-block;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirmSubmit()">Delete</button>
                </form>
            @endif
            <a class="btn btn-secondary" href="{{route('post.index')}}">Back To Home</a>
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
<div id="comment-section"class="container">

    <div class="mt-3">
        <h5>Comments</h5>
        @if(isset($comment))
            @foreach($comment as $item)

                <div class="card @if($item->user_id == $user->id) float-end @endif" style="width:80%;">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted"> @if($item->user_id == $user->id) ME @else User{{$item->user_id}} @endif</h6>
                        <p class="card-text">{{$item->comment}}</p>
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Add more comments here -->
    </div>
    <form id="commentPost" action="{{route('post.comment',['post_id' => $post->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <textarea class="form-control" id="comment-box" rows="4" placeholder="Type Comment Here" name="comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
        </svg></button>
    </form>
</div>

<script>
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
@endsection
@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Create a Post</h4>
            <form>
                <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
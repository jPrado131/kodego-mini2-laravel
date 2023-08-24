@extends('layouts.app')
@section('content')

<div class="container">

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('upload.upload_pro_pic') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="image" accept="image/png, image/gif, image/jpeg">
        </div>
        <button class="btn btn-primary" type="submit" >Upload Image</button>
    </form>
</div>

@endsection
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
            <a class="btn btn-secondary" href="{{route('profile.edit')}}">Edit</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                  
                    @if ($profile_data[0]->thumbnail)
                        <img src="{{ $profile_data[0]->thumbnail}}" class="card-img-top" alt="Profile Picture">
                    @else
                        <img src="{{ asset('images/image-placeholder-500x500.jpg') }}" class="card-img-top" alt="image-placeholder">
                    @endif
                   
                    <div class="card-body">
                        <h5 class="card-title">{{$profile_data[0]->first_name." ".$profile_data[0]->last_name}}</h5>
                        <p class="card-text">@if($profile_data[0]->role == 1) Professional @else Newbie @endif Marites</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2>About Me</h2>
                <p>{!! $profile_data[0]->about_me !!} </p>
  
                <h2>Contact Information</h2>
                <ul class="list-group">
                    <li class="list-group-item">User Name: {{$user_data[0]->name}}</li> 
                    <li class="list-group-item">Email: {{$user_data[0]->email}}</li>
                    <li class="list-group-item">First Name: {{$profile_data[0]->first_name}}</li>
                    <li class="list-group-item">First Last: {{$profile_data[0]->last_name}}</li>
                    <li class="list-group-item">Phone: {{$profile_data[0]->phone}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
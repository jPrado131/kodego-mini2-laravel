@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('profile.update')}}" method="POST">
        @method('PUT')
        @csrf
        <div class="container mt-5">
            <div class="row mb-3 text-end">
                <div class="col">
                    <input class="btn btn-primary" type="submit" value="Update">
                    <a class="btn btn-secondary" href="{{route('profile.index')}}">Cancel</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        
                        @if ($profile_data[0]->thumbnail)
                            <img src="{{ $profile_data[0]->thumbnail}}" class="card-img-top" alt="Profile Picture">
                            <a class="btn btn-secondary" href="{{route('profile.index_pro_pic')}}">Change Picture</a>
                        @else
                            <img src="{{ asset('images/image-placeholder-500x500.jpg') }}" class="card-img-top" alt="image-placeholder">
                            <a class="btn btn-secondary" href="{{route('profile.index_pro_pic')}}">Upload Picture</a>
                        @endif
  
                        {{-- <div class="card-body">
                            <h5 class="card-title">{{$profile_data[0]->first_name." ".$profile_data[0]->last_name}}</h5>
                            <p class="card-text">@if($profile_data[0]->role == 1) Professional @else Newbie @endif Marites</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-8">
                    <h2>About Me</h2>
                    <p>
                        <div class="form-floating">
                            <textarea class="form-control" name="about_me" placeholder="Leave a comment here" id="floatingTextarea" style="height: 200px">{{$profile_data[0]->about_me}}</textarea>
                        </div>
                    </p>
    
                    <h2>Contact Information</h2>
                    <ul class="list-group">
                        <li class="list-group-item">Email: {{$user_data[0]->email}}</li>
                        <li class="list-group-item">User Name: <input type="text" name="name" value="{{$user_data[0]->name}}" /></li> 
                        <li class="list-group-item">First Name: <input type="text" name="first_name" value="{{$profile_data[0]->first_name}}" /></li>
                        <li class="list-group-item">Last Name: <input type="text" name="last_name" value="{{$profile_data[0]->last_name}}" /></li>
                        <li class="list-group-item">Phone: <input type="text" name="phone" value="{{$profile_data[0]->phone}}" /></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection
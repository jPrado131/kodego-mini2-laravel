{{-- @extends('layouts.app')
@section('content')


<div class="container">
  <div class="nav-area" style="background-image: url('images/cloud.jpeg'); background-size: cover;">
  </div>
</div>
<div class="container" style="background-image: url('images/cloud.jpeg'); background-size: cover; background-color: blue;">
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-end">
            <img src="images/welcome.jpeg" alt="Marites Voice Center" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1 style="font-size: 3em; font-weight: bold;">Welcome to <br>Marites Voice Center</h1>
            <br><br>
            <p>Your online space to connect with people in your community and beyond.<br> Here you can:</p>
            <ul>
                <li><b>Connect with your neighbors</b><br>Message and comment on posts to stay in touch with the people in your community, regardless of where they live.</li>
                <br>
                <li><b>Post about anything you want</b></li>
                <ul>
               <li><b>Information about what's happening in your community:</b> Share news about upcoming festivals, new businesses, or anything else that's happening in your area.</li>
               <li><b>Your passions:</b> Share your hobbies, interests, and talents with others. Tell us about your love of cooking, gardening, hiking, or anything else that you're passionate about.</li>
               <a href="{{ route('welcomepage') }}" class="btn btn-primary">Learn More</a>

           
        </div>
    </div>
</div>


@endsection --}}

@extends('layouts.app')
@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    h2 {
        font-size: 40px;
    }
    p {
        font-size: 20px;
        line-height: normal;
    }
    .jumbotron {
        background-image: url('background-image.jpg'); /* Replace with your background image */
        background-size: cover;
        color: #ffffff;
        background:#002E94;
        padding:60px 0;
    }
    .feature-icon {
        font-size: 2rem;
        color: #007bff;
    }
</style>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4">Welcome to Marites Voice Center</h1>
        <p class="lead">
            Your online space to connect with people in your community and beyond.
        </p>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <img src="images/welcome.jpeg" alt="Marites Voice Center" class="img-fluid">          
        </div>
        <div class="col-md-7 pt-5">
            <h2><span class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
              </svg></span> Connect with your neighbors</h2>
            <p>
                Message and comment on posts to stay in touch with the people in your community, regardless of where they live.
            </p>

            <h2><span class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg></span> Post about anything you want</h2>
            <p>
                Information about what's happening in your community: Share news about upcoming festivals, new businesses, or anything else that's happening in your area.
            </p>

            <h2><span class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/>
              </svg></span> Your passions</h2>
            <p>
                Share your hobbies, interests, and talents with others. Tell us about your love of cooking, gardening, hiking, or anything else that you're passionate about.
            </p>


        </div>
    </div>
</div>
            
@endsection


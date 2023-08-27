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
            <h2><span class="feature-icon">&#128101;</span> Connect with your neighbors</h2>
            <p>
                Message and comment on posts to stay in touch with the people in your community, regardless of where they live.
            </p>

            <h2><span class="feature-icon">&#128172;</span> Post about anything you want</h2>
            <p>
                Information about what's happening in your community: Share news about upcoming festivals, new businesses, or anything else that's happening in your area.
            </p>
            <p>
                Your passions: Share your hobbies, interests, and talents with others. Tell us about your love of cooking, gardening, hiking, or anything else that you're passionate about.
            </p>
        </div>
    </div>
</div>

@endsection
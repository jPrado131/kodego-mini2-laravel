@extends('layouts.app')
@section('content')

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


@endsection
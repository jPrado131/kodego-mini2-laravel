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
    .form-group {
        margin-bottom: 15px;
    }
</style>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4">Contact Us</h1>
    </div>
</div>
<div class="container mt-5">

    <p>Please fill out the form below to get in touch with us.</p>
    <!-- Contact Form -->
    <form id="contactForm">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Success or Error Message -->
    <div id="messageDiv" class="mt-3"></div>
</div>

@endsection


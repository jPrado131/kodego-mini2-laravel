@extends('layouts.app')
@section('content')

<div style="background-image: url('images/cloud.jpeg'); background-size: cover; background-color: blue;">
   <div class="container py-4">
      HEADER
   </div>

   <div class="container py-4 text-center">
      <img src="images\connect_with_people.jpg" alt="Marites Voice Center" class="img-fluid object-fit: cover">
      
      <h1 style="font-size: 3em; font-weight: bold;"></h1>
      <br><br>
      <h1><b>Marites Voice Center (MVC)<b></h1><br><br>
      <h2>About</h2>
      <p>Marites Voice Center is a website application that allows users to send messages, receive messages, comment, and post.</p>
      <p>The website is designed to be a convenient and easy-to-use way for users to stay connected with each other.</p>
      <h2>Features</h2>
         <ul style="list-style-type: none">
            <li>Create an account</li>
            <li>Send private messages</li>
            <li>Post public messages</li>
            <li>Comment on posts</li>
            <li>Search for users and messages</li>
            <li>Follow other users</li>
            <li>Receive notifications</li>
         </ul>
         <div class="benefits">
            <h2>Benefits</h2>
            <ul style="list-style-type: none">
            <li>Stay connected with friends and family</li>
            <li>Share information</li>
            <li>Build relationships</li>
            <li>Get help and support</li>
            <li>Find new people to connect with</li>
            </ul>
         </div>
         <div class="target-audience">
            <h2>Target Audience</h2>
            <p>Anyone who wants to stay connected with others or share information can use Marites Voice Center. The website is especially useful for people who are:</p>
            <ul style="list-style-type: none">
               <li>New to a city or country</li>
               <li>Looking for friends or support groups</li>
               <li>Want to stay in touch with family and friends who live far away</li>
               <li>Want to connect with people who share their interests</li>
            </ul>
         </div>
         <div class="team">
            <h2>Team</h2>
            <p>Marites Voice Center is created by a team of developers, designers, and content creators who are passionate about building a community where people can connect and share.</p>
         </div>
         <div class="contact">
            <h2>Contact Us</h2>
            <p>If you have any questions or feedback about Marites Voice Center, please contact us at [email protected]</p>
         </div>
   </div> 
</div>



@endsection
<!--extend layout master.blade.php -->
 
@extends('layouts/master')
 

<!--sets value for section title to "Mini Twitter" (section title is used in messages.blade.php) -->
@section('title', 'Google Pirates (the new Twitter)')


<!--Here comes the picture pirate -->
<img class="pirate" src="{{ asset('img/pirate.jpg')}}" style="border-style: solid; border-width: 2px; border-color:blue; border-radius: 20%;">
 
<!--starts section content, defines some html for section content and end section content
ts value for section title to "Mini Twitter" (section content is used in messages.blade.php) -->
@section('content')

<div class="newMessage">
    <h2 style="color:#de5246 ; background:#465459;">Create new message: </h2> 
    <form action="/create" method="post"> 
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="content" placeholder="Content"> <!-- this blade directive is necessary for all form posts somewhere in between 
    the form tags --> 
    @csrf 
    <button class="submit" type="submit">Submit</button> 
    </form> 
</div>

 
<div class="recentMessage">
    <h2 style="color:#de5246 ; background:#465459;">Recent messages:</h2> 

    <ul> 
    <!-- loops through the $messages, that this blade template gets from MessageController.php. for each element of the loop which we call $message we print the properties (title, content
    and created_at in an <li> element --> 
    @foreach ($messages as $message) 
    <li> 
    <b> 
    <!-- this link to the message details is created dynamically and will point to /messages/1 for the first message --> 
    <a href="/message/{{$message->id}}">{{$message->title}}:</a> </b><br> 
    {{$message->content}}<br> 
    {{$message->created_at->diffForHumans()}} 
    </li> 
    @endforeach 
    </ul> 
</div>

@endsection

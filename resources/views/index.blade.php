@extends('layouts.master')
@section('content')
  <div class="container myBox rounded">
    <h3>All Posts</h3>
  </div>

  <br>

  @foreach ($results as $result)
  <div class="media container myBox rounded">
    <img class="mr-3" src="\img\generic_img.jpg" alt="Generic placeholder image" style="width:64px;height:64px;">
    <div class="media-body">
      <h5 class="mt-0">{{  $result->topic }} / {{  $result->subtopic }} <small class="text-muted">{{  $result->user_name }}</small> </h5>
      <p>{{  $result->post_text }}</p>
      <a href='/post/{{$result->id}}'>View</a> | <a href='/post/{{$result->id}}/edit'>Edit</a> | <a href='/post/{{$result->id}}/delete'>Delete</a> | <a href='/comment/{{$result->id}}/comment'>Comment</a>
      @foreach ($result->comments as $comment)
      <div class="media mt-3">
        <img class="pr-3" src="\img\generic_img.jpg" alt="Generic placeholder image" style="width:64px;height:64px;">
        <div class="media-body">
          <h5 class="mt-0">{{  $result->topic }} / {{  $result->subtopic }} <small class="text-muted">{{  $comment->user_name }} </small> </h5>
          <p>{{  $comment->comment_text  }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <br>
  @endforeach
@endsection

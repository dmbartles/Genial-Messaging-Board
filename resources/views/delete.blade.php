@extends('layouts.master')
@section('content')
<div class="container myBox rounded">
  <h3>Are you sure you want to delete this post?</h3>
</div>

<br>

@foreach ($results as $result)
<div class="media container myBox rounded">
  <img class="mr-3" src="\img\generic_img.jpg" alt="Generic placeholder image" style="width:64px;height:64px;">
  <div class="media-body">
    <h5 class="mt-0">{{  $result->topic }} / {{  $result->subtopic }} <small class="text-muted">{{  $result->user_name }}</small> </h5>
    <p>{{  $result->post_text }}</p>
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
@endforeach
<br>

<div class="container">
  <form method='POST' action='/post/{{$result->id}}'>
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
  </form>
</div>
<br>
@endsection

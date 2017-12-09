@extends('layouts.master')


@section('content')
<div class="container myBox rounded">
  <h3>Edit Post</h3>
</div>
<br>
<div class="media container myBox rounded">
  <img class="mr-3" src="\img\generic_img.jpg" alt="Generic placeholder image" style="width:64px;height:64px;">
  <div class="media-body">
    <form method='POST' action='/post/{{ $post->id }}'>
      {{ method_field('put') }}
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6">
          <label for="user_name">Enter User Name</label>
          <input type="text" name="user_name" class="form-control" id="username" value='{{ old('topic', $post->user_name) }}'></input>
        </div>
        <div class="col-md-3">
          <label for="topic">Topic</label>
          <input type='text' name='topic' class="form-control" id='topic' value='{{ old('topic', $post->topic) }}'></input>
        </div>
        <div class="col-md-3">
          <label for="subtopic">Subtopic</label>
          <input type='text' name='subtopic' class="form-control" id='subtopic' value='{{ old('subtopic', $post->subtopic) }}'>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="post_text">Edit Your Post</label>
          <textarea name="post_text" class="form-control" id="post_text"  rows='6'>{{ old('post_text', $post->post_text) }}</textarea>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
<br>
@endsection

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
      <a class="btn btn-primary btn-sm" href="/post/{{$result->id}}" role="button">View</a>
      <a class="btn btn-primary btn-sm" href="/post/{{$result->id}}/edit" role="button">Edit</a>
      <a class="btn btn-primary btn-sm" href="/post/{{$result->id}}/delete" role="button">Delete</a>
      <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseComment_{{$result->id}}" aria-expanded="false" aria-controls="collapseComment_{{$result->id}}">Comment</a>
      <div class="collapse" id="collapseComment_{{$result->id}}">
        <br>
        <div class="card card-body">

          <form method='POST' action='/post/{{$result->id}}/comment'>
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <label for="user_name">Enter User Name</label>
                <input type="text" name="user_name" class="form-control" id="user_name"></input>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="comment_text">Enter Your Comment</label>
                <textarea name="comment_text" class="form-control" id="comment_text" rows="2"></textarea>
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
      @foreach ($result->comments as $comment)
      <div class="media mt-3 card card-body">
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

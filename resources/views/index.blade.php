@extends('layouts.master')
@section('content')
  @foreach ($results as $result)
  <div class="media container myBox rounded"><!-- Start Media -->

    <img class="mr-3" src="\img\generic_img.jpg" alt="Generic placeholder image" style="width:64px;height:64px;">

    <div class="media-body">
      <h5 class="mt-0">{{  $result->topic }}<small class="text-muted"> //: {{  $result->user_name }}</small> </h5>
      <p>{{  $result->post_text }}</p>

      <!-- Menu Buttons -->
      <a class="btn btn-primary btn-sm" href="/post/{{$result->id}}" role="button">View</a>
      <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseEdit_{{$result->id}}" aria-expanded="false" aria-controls="collapseEdit_{{$result->id}}">Edit</a>
      <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseDelete_{{$result->id}}" aria-expanded="false" aria-controls="collapseDelete_{{$result->id}}">Delete</a>
      <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseComment_{{$result->id}}" aria-expanded="false" aria-controls="collapseComment_{{$result->id}}">Comment</a>
      <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseTag_{{$result->id}}" aria-expanded="false" aria-controls="collapseTag_{{$result->id}}">Tag</a>
      <!-- Start Delete Collapsable -->
      <div class="collapse" id="collapseDelete_{{$result->id}}">
        <br>
        <form method='POST' action='/post/{{$result->id}}'>
          {{ method_field('delete') }}
          {{ csrf_field() }}
          <h5>Are you sure you want to delete this post?</h5>
          <input type='submit' value='Delete Post' class='btn btn-danger'>
        </form>
      </div>
      <!-- Start Edit Collapsable -->
      <div class="collapse" id="collapseEdit_{{$result->id}}">
        <br>
        <form method='POST' action='/post/{{ $result->id }}'>
          {{ method_field('put') }}
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <label for="user_name">Enter User Name</label>
              <input type="text" name="user_name" class="form-control" id="username" value='{{ old('topic', $result->user_name) }}'></input>
            </div>
            <div class="col-md-3">
              <label for="topic">Topic</label>
              <input type='text' name='topic' class="form-control" id='topic' value='{{ old('topic', $result->topic) }}'></input>
            </div>
            <div class="col-md-3">
              <label for="subtopic">Subtopic</label>
              <input type='text' name='subtopic' class="form-control" id='subtopic' value='{{ old('subtopic', $result->subtopic) }}'>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="post_text">Edit Your Post</label>
              <textarea name="post_text" class="form-control" id="post_text"  rows='6'>{{ old('post_text', $result->post_text) }}</textarea>
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
      <!-- Start Comment Collapsable -->
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
      <!-- Start Tag Collapsable -->
      <div class="collapse" id="collapseTag_{{$result->id}}">
        <br>
        <div class="card card-body">
          <form method='POST' action='/post/{{$result->id}}/tag'>
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <select class="form-control" name="tag" id="tag">
                  @foreach ($tags as $tag)
                  <option value='{{$tag->id}}'>{{$tag->tag}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div><!-- End Collapse -->

      @foreach ($result->comments as $comment)
      <div class="media mt-3 card card-body">
        <div class="media-body">
          <h5 class="mt-0">{{$comment->user_name }}</h5>
          <p>{{  $comment->comment_text  }}</p>
        </div>
      </div>
      @endforeach

    </div>
    <i class="fa fa-tag" aria-hidden="true"></i>
    @foreach ($result->tags as $tag)
    {{$tag->tag}}
    @endforeach

  </div><!-- End Media -->
  <br>
  @endforeach
@endsection

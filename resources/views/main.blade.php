@extends('layouts.master')
@section('content')
<!-- Start Jumbotron -->
<!-- Start Jumbotron -->
<!-- Start Jumbotron -->
<div class="container myJumbotron rounded">
  <h1 class="display-3">Genial</h1>
  <h2>Let's have interesting conversations without misunderstanding and bullying</h2>
  <p>ge·ni·al /ˈjēnyəl/:: mid 16th century: from Latin genialis ‘nuptial, productive,’ from genius. The Latin sense was adopted into English; hence the senses ‘mild and conducive to growth’ (mid 17th century), later ‘cheerful, kindly’ (mid 18th century).</p>
</div>

<br>
<!-- Start Carousel -->
<!-- Start Carousel -->
<!-- Start Carousel -->
<div id="mainCarousel" class="container carousel myCarousel slide align-middle rounded" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <h2>Follow Ideas</h2>
      <p>Genial focuses on ideas, not idols, and gives everyone a equal part in the conversation. Our platform is topic-based and allows users to promote the most thoughtful comments. This gives everyone a chance to have their voice heard, not just the famous and powerful.</p>
    </div>
    <div class="carousel-item">
      <h2>Challenge Yourself</h2>
      <p>In order for the exchange of ideas to flourish, we must not only tolerate differing opinions and views. We need to listen and think on what others have to say. We must recognize that we only have one perspective and know the value of other views.</p>
    </div>
    <div class="carousel-item">
      <h2>Maintain Respect</h2>
      <p>Genial doesn't require everyone to agree, but users must remain respectful of each other. We allow users to police each other to prevent offensive attacks and bullying of other users. We will expel those who are contributing to the exchange of ideas.</p>
    </div>
  </div>
  <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- End Carousel -->
<!-- End Carousel -->
<!-- End Carousel -->

<br>

<div class="container myBox rounded">
  <h3>Recently Added Posts</h3>
</div>

<br>

<!-- Start Main Page Posts -->
<!-- Start Main Page Posts -->
<!-- Start Main Page Posts -->

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
            <input type="text" name="user_name" class="form-control" value='{{ old('topic', $result->user_name) }}'>
          </div>
          <div class="col-md-3">
            <label for="topic">Topic</label>
            <input type='text' name='topic' class="form-control" value='{{ old('topic', $result->topic) }}'>
          </div>
          <div class="col-md-3">
            <label for="subtopic">Subtopic</label>
            <input type='text' name='subtopic' class="form-control" value='{{ old('subtopic', $result->subtopic) }}'>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="post_text">Edit Your Post</label>
            <textarea name="post_text" class="form-control" rows='6'>{{ old('post_text', $result->post_text) }}</textarea>
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
              <input type="text" name="user_name" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="comment_text">Enter Your Comment</label>
              <textarea name="comment_text" class="form-control" rows="2"></textarea>
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
              <select class="form-control" name="tag">
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

@stop

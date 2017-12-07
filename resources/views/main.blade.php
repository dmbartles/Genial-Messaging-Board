@extends('layouts.master')


@section('content')
<main role="main">



  <div class="container myJumbotron rounded">
    <h1 class="display-3">Genial</h1>
    <h2>Let's have interesting conversations without misunderstanding and bullying</h2>
    <p>ge·ni·al /ˈjēnyəl/:: mid 16th century: from Latin genialis ‘nuptial, productive,’ from genius. The Latin sense was adopted into English; hence the senses ‘mild and conducive to growth’ (mid 17th century), later ‘cheerful, kindly’ (mid 18th century).</p>
  </div>

  <br>

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

  <br>

  <div class="container myBox rounded">
    <h3>Recently Added Posts</h3>
  </div>
  <br>






  @foreach ($results as $result)
  <div class="media container myBox rounded">
    <img class="mr-3" src="img\generic_img.jpg" alt="Generic placeholder image" style="width:64px;height:64px;">
    <div class="media-body">
      <h5 class="mt-0">{{  $result->topic }} / {{  $result->subtopic }} <small class="text-muted">{{  $result->user_name }}</small> </h5>
      <p>{{  $result->post_text }}</p>
      <a href='/post/ {{ $result->post_id }} /edit'>Edit</a> | <a href='/post/{{ $result->post_id }}/delete'>Delete</a>

      @foreach ($result->comments as $comment)
      <div class="media mt-3">
        <img class="pr-3" src="img\generic_img.jpg" alt="Generic placeholder image" style="width:64px;height:64px;">
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



</main>
@endsection

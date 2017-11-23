@extends('layouts.master')


@section('content')
<main role="main">
  <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
      <div class="jumbotron myJumbotron">
      <h1 class="display-3">Genial</h1>
      <p>ge·ni·al /ˈjēnyəl/:: mid 16th century: from Latin genialis ‘nuptial, productive,’ from genius. The Latin sense was adopted into English; hence the senses ‘mild and conducive to growth’ (mid 17th century), later ‘cheerful, kindly’ (mid 18th century).</p>
      <h2>Let's have interesting conversations without misunderstanding and bullying</h2>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2>Follow Ideas</h2>
        <p>Genial focuses on ideas, not idols, and gives everyone a equal part in the converasation. Our platform is topic-based and allows users to promote the most thoughtful comments. This gives everyone a chance to have their voice heard, not just the famous and powerful.</p>
      </div>
      <div class="col-md-4">
        <h2>Challenge Yourself</h2>
        <p>In order for the exchange of ideas to flourish, we must not only tolerate differing opinions and views. We need to listen and think on what others have to say. We must recognize that we only have one perspective and know the value of other views.</p>
      </div>
      <div class="col-md-4">
        <h2>Maintain Respect</h2>
        <p>Genial doesn't require everyone to agree, but users must remain respectful of eachother. We allow users to police eachother to prevent offensive attacks and bullying of other users. We will expell those who are contributing to the exchange of ideas.</p>
      </div>
    </div>
  </div <!-- /container -->


  <div class="container">
    <hr>
    <h3>Recently Added Posts</h3>
    <hr>

    @foreach ($results as $result)

    <div class="row">
      <div class="col-md-2">
        <p>User</p>
        <h4>{{  $result->user_name }}</h4>
      </div>
      <div class="col-md-10">
        <p> {{  $result->topic }} / {{  $result->subject }} / {{ $result->updated_at }}</p>
        <h4>{{  $result->post_text }}</h4>
      </div>
    </div>
    <hr>
    @endforeach
  </main>
  @endsection

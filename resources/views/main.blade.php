@extends('layouts.master')


@section('content')
<main role="main">

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
        <p>Genial focuses on ideas, not idols, and gives everyone a equal part in the conversation. Our platform is topic-based and allows users to promote the most thoughtful comments. This gives everyone a chance to have their voice heard, not just the famous and powerful.</p>
      </div>
      <div class="col-md-4">
        <h2>Challenge Yourself</h2>
        <p>In order for the exchange of ideas to flourish, we must not only tolerate differing opinions and views. We need to listen and think on what others have to say. We must recognize that we only have one perspective and know the value of other views.</p>
      </div>
      <div class="col-md-4">
        <h2>Maintain Respect</h2>
        <p>Genial doesn't require everyone to agree, but users must remain respectful of each other. We allow users to police each other to prevent offensive attacks and bullying of other users. We will expel those who are contributing to the exchange of ideas.</p>
      </div>
    </div>
  </div> <!-- /container -->

  <div class="container">
    <form method='POST' action='/'>

      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
            {{ csrf_field() }}
            <label for="UserName">Enter User Name</label>
            <input type="text" name="UserName" class="form-control" id="UserName"></input>
          </div>
          <div class="col-md-3">
            {{ csrf_field() }}
            <label for="Topic">Topic</label>
            <input type="text" name="Topic" class="form-control" id="Topic"></input>
          </div>
          <div class="col-md-3">
            {{ csrf_field() }}
            <label for="Subtopic">Subtopic</label>
            <input type="text" name="Subtopic" class="form-control" id="Subtopic"></input>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col">
            {{ csrf_field() }}
            <label for="UserPost">Enter Your Post</label>
            <textarea name="UserPost" class="form-control" id="UserPost" rows="3"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
        </div>
      </div>

    </form>

    <div class="row">
      <div class="col">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Fill in all fields!</strong> Need to update....
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>

  </div>



  <div class="container">
    <hr>
    <h3>Recently Added Posts</h3>
    <hr>
  </div>

  <div class="container ">
    @foreach ($results as $result)

    <div class="row">
      <div class="col"> <h6>{{  $result->user_name }} / {{  $result->topic }} / {{  $result->subtopic }} </h6></div>
      <div class="w-100"></div>
      <div class="col"> <p>{{  $result->post_text }}</p></div>
    </div>
    <hr>
    @endforeach
  </div>
</main>
@endsection

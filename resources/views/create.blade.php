@extends('layouts.master')
@section('content')
<div class="container myBox rounded">
  <h3>Add A Post</h3>
</div>
<br>
<div class="container form-group myBox rounded">
  <form method='POST' action='/post/store'>
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-6">
        <label for="user_name">Enter User Name</label>
        <input type="text" name="user_name" class="form-control" id="user_name"></input>
      </div>
      <div class="col-md-3">
        <label for="topic">Topic</label>
        <input type="text" name="topic" class="form-control" id="topic"></input>
      </div>
      <div class="col-md-3">
        <label for="subtopic">Subtopic</label>
        <input type="text" name="subtopic" class="form-control" id="subtopic"></input>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label for="post_text">Enter Your Post</label>
        <textarea name="post_text" class="form-control" id="post_text" rows="6"></textarea>
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
@stop

@extends('layouts.master')

@section('content')
<div class="container form-group">
  <form method='POST' action='/addpost'>
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

    <div class="row">
      <div class="col">
        {{ csrf_field() }}
        <label for="UserPost">Enter Your Post</label>
        <textarea name="UserPost" class="form-control" id="UserPost" rows="3"></textarea>
      </div>
    </div>

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
@endsection

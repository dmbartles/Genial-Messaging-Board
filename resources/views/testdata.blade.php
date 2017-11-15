@extends('layouts.master')

@section('content')
<div class="container">
  <form method='GET' action='/addbio'>
    <div class="form-group">
      {{ csrf_field() }}
      <label for="UserName">Enter User Name</label>
      <input type="text" name="UserName" class="form-control" id="UserName"></input>
    </div>
    <div class="form-group">
      {{ csrf_field() }}
      <label for="UserBio">Enter User Bio</label>
      <textarea name="UserBio" class="form-control" id="UserBio" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
  </form>
</div>
<hr>
<div class="container">
  <?php
  use App\User_bio;
  $results = User_bio::all();
  ?>
  @foreach ($results as $result)

  <div class="row">
    <div class="col-md-2">
      <h4>User</h4>
      <p>{{  $result->user_name }}</p>
    </div>
    <div class="col-md-10">
      <h4>Bio</h4>
      <p>{{  $result->bio_text }}</p>
    </div>
  </div>
  <hr>
  @endforeach

</div>
@endsection

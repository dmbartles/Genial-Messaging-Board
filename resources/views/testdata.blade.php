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
        <h3>Recently Added Bios</h3>
    <hr>

  @foreach ($results as $result)

  <div class="row">
    <div class="col-md-2">
        <p>User</p>
      <h4>{{  $result->user_name }}</h4>
    </div>
    <div class="col-md-10">
      <p>Bio</p>
      <h4>{{  $result->bio_text }}</h4>
    </div>
  </div>
  <hr>
  @endforeach

</div>
@endsection

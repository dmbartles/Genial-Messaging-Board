<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_bio;
use App\Post;


class FormController extends Controller
{

  public function AddBio(Request $request)
  {
    $this->validate($request, [
      'UserName' => 'max:25'
    ]);

    $this->validate($request, [
      'UserBio' => 'max:255'
    ]);

    $user_bio_add = new User_bio();

    $UserName = $request->input('UserName');
    $UserBio = $request->input('UserBio');


    $user_bio_add->user_name = $UserName;
    $user_bio_add->bio_text = $UserBio;
    $user_bio_add->save();

    $results = User_bio::orderBy('updated_at','desc')->limit(5)->get();
    return view('testdata')->with(['results' => $results]);
  }


  public function DisplayBios()
  {
    $results = User_bio::orderBy('updated_at','desc')->limit(5)->get();
    return view('testdata')->with(['results' => $results]);
  }

  public function MainDisplayPosts()
  {
    $results = Post::orderBy('updated_at','desc')->limit(5)->get();
    return view('main')->with(['results' => $results]);
  }


}

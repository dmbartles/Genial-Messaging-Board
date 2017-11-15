<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_bio;

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
    return view('testdata');
  }


}

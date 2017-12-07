<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_bio;
use App\Post;
use App\User_topic;
use App\Comment;


class FormController extends Controller
{

  public function DisplayBios()
  {
    $results = User_bio::orderBy('updated_at','desc')->limit(5)->get();
    return view('addbio')->with(['results' => $results]);
  }

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
    return view('addbio')->with(['results' => $results]);
  }


  public function DisplayPost(Request $request)
  {
    return view('addpost');
  }

  public function AddPost(Request $request)
  {
    $this->validate($request, [
      'UserName' => 'max:25'
    ]);

    $this->validate($request, [
      'PostText' => 'max:255'
    ]);

    $post_text_add = new post();

    $UserName = $request->input('UserName');
    $UserPost = $request->input('UserPost');


    $post_text_add->user_name = $UserName;
    $post_text_add->post_text = $UserPost;
    $post_text_add->topic = 'Test Topic';
    $post_text_add->subtopic = 'Test Subtopic';
    $post_text_add->save();

    $results = Post::orderBy('updated_at','desc')->with('comments')->get();
    return view('main')->with(['results' => $results]);

  }





  public function MainDisplayPosts()
  {
    $results = Post::orderBy('updated_at','desc')->with('comments')->get();
    return view('main')->with(['results' => $results]);
  }

  public function DumpAll()
  {
    echo 'user posts';
    $posts = Post::orderBy('updated_at','desc')->get();
    dump($posts->toArray());

    echo 'user bios';
    $bios = User_bio::orderBy('updated_at','desc')->get();
    dump($bios->toArray());

    echo 'user topics';
    $topics = User_topic::orderBy('updated_at','desc')->get();
    dump($topics->toArray());

    echo 'user comments';
    $comments = Comment::orderBy('updated_at','desc')->get();
    dump($comments->toArray());

    echo 'test';

    $comments = Post::orderBy('updated_at','desc')->limit(5)->with('comments')->get();
    dump($comments->toArray());
  }




}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User_topic;
use App\Comment;
use App\Tag;


class FormController extends Controller
{


  public function main()
  {
    $results = Post::orderBy('updated_at','desc')->with('comments')->with('tags')->get();
    return view('main')->with(['results' => $results]);
  }

  public function index()
  {
    $results = Post::orderBy('updated_at','desc')->with('comments')->with('tags')->get();
    return view('index')->with(['results' => $results]);
  }

  public function create()
  {
    return view('create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'user_name' => 'required|min:3|max:25',
      'topic'    => 'required|min:3|max:25',
      'subtopic' => 'required|min:3|max:25',
      'post_text' => 'required|min:3|max:255',
    ]);

    $newpost = new Post();

    $newpost->user_name = $request->input('user_name');
    $newpost->topic     = $request->input('topic');
    $newpost->subtopic  = $request->input('subtopic');
    $newpost->post_text = $request->input('post_text');
    $newpost->save();

    return redirect('/index');
  }

  public function comment(Request $request, $id)
  {
    $this->validate($request, [
      'user_name' => 'required|min:3|max:25',
      'comment_text' => 'required|min:3|max:255',
    ]);

    $newcomment = new Comment();

    $newcomment->post_id = $id;
    $newcomment->user_name = $request->input('user_name');
    $newcomment->comment_text = $request->input('comment_text');
    $newcomment->save();

    return redirect('/index');
  }


  public function edit($id)
  {
    $post = Post::find($id);
    return view('edit')->with([
      'post' => $post
    ]);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'user_name' => 'required|min:3|max:25',
      'topic'    => 'required|min:3|max:25',
      'subtopic' => 'required|min:3|max:25',
      'post_text' => 'required|min:3|max:255',
    ]);

    $updatepost = Post::find($id);

    $updatepost->user_name = $request->input('user_name');
    $updatepost->topic     = $request->input('topic');
    $updatepost->subtopic  = $request->input('subtopic');
    $updatepost->post_text = $request->input('post_text');

    $updatepost->save();

    return redirect('/index');
  }

  public function show($id)
  {
    $results = Post::where('id','=',$id)->with('comments')->with('tags')->get();
    return view('index')->with(['results' => $results]);
  }

  public function delete($id)
  {
    $results = Post::where('id','=',$id)->with('comments')->with('tags')->get();
    return view('delete')->with(['results' => $results]);
  }

  public function destroy($id)
  {
    $destroypost = Post::find($id);
    $destroypost->comments()->delete();
    $destroypost->delete();
    return redirect('/index');
  }


  public function DumpAll()
  {
    echo 'user posts';
    $posts = Post::orderBy('updated_at','desc')->get();
    dump($posts->toArray());

    echo 'user comments';
    $comments = Comment::orderBy('updated_at','desc')->get();
    dump($comments->toArray());

    echo 'post tags';
    $id=1;
    $results = Post::where('id','=',$id)->with('comments')->with('tags')->get();
    dump($results->toArray());
    }

}

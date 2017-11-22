<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class PracticeController extends Controller
{

  public function practice()
  {
    /*$results = Book::where('author', '=', 'J.K. Rowling')->get();*/
    /*$results = Book::orderBy('updated_at','desc')->limit(2)->get();*/
    /*$results = Book::where('published','>',1950)->get();*/
    $results = Book::orderBy('title')->get();

    /*$results = Book::select()->where('author', '=', 'J.K. Rowling')->get();*/

    /*$authorChange = 'Bell Hooks';
    $results = Book::select()->where('author', '=', $authorChange)->get();
    if (!empty($results)) {
      dump("Book not found, can't update.");
    }
    else {
      foreach ($results as $result) {
        $result->author = strtolower($authorChange);
        $result->save();
      }
    }*/


    dump($results->toArray());
  }


}

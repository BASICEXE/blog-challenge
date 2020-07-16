<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    // $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    // $posts = posts::paginate(5);
    $posts = posts::paginate(20);
    return view('home', ['posts'=> $posts]);
  }

  public function page($id) {
    $post = posts::find($id);
    return view('page', compact('post'));

  }
}

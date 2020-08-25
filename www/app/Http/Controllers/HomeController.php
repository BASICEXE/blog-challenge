<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Services\OgpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

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
    $this->ogp = new OgpService();
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
    $this->ogp->add('og:url', URL::current());
    $ogp = $this->ogp->get();
    return view('home', ['posts'=> $posts, 'ogp'=> $ogp]);
  }

  public function page($category, $id) {
    $post = posts::find($id);
    $this->ogp->add('og:url', URL::current() );
    $this->ogp->add('og:title', $post->title );
    $this->ogp->add('og:description', $post->summary );
    // $this->ogp->add('og:image', $post->image->url);
    $ogp = $this->ogp->get();
    return view('page', compact('post', 'ogp'));
  }
}

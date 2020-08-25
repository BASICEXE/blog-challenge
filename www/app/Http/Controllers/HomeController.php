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
    $url = optional($post->media)->url();
    $url = is_null($url) ? 'https://placehold.jp/60/bfbfbf/ffffff/640x480.png?text=%E7%94%BB%E5%83%8F%E3%81%AF%E3%81%82%E3%82%8A%E3%81%BE%E3%81%9B%E3%82%93' : $url;
    $this->ogp->add('og:image', $url);
    $ogp = $this->ogp->get();
    return view('page', compact('post', 'ogp'));
  }
}

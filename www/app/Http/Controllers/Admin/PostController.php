<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;
use App\Models\posts;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

  public function __construct()
  {
  }

  public function index() {
    $posts = posts::paginate(20);

    return view('admin.post.index', ['posts'=> $posts] );
  }

  public function create()
  {
    $post = new posts();

    return view('admin.post.create',compact('post'));
  }

  public function store(Request $request)
  {
    $data = $request->all();
    $data['slug_id'] = 1;
    $data['user_id'] = 1;
    $result = posts::create($data);

    return redirect('admin/posts/');
  }

  public function show($id)
  {
    $user = Auth::find($id);
    return view('admin.post.single', compact('user'));
  }

  public function edit($id)
  {
    $post = posts::find($id);
    return view('admin.post.update', compact('post'));
  }

  public function update(Request $request, $id)
  {
    $post = posts::find($id);
    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();

    return redirect('admin/posts/');
  }

  public function destroy($id)
  {
    $post = posts::find($id);
    $post->delete();
    return redirect('admin/posts/');
  }

}

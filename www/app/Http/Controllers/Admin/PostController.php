<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
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

    return view('admin.post.index', compact('posts') );
  }

  public function create()
  {
    $post = new posts();
    $categorys = category::all()->pluck('name','id')->prepend('なし', '');
    return view('admin.post.create',compact('post','categorys'));
  }

  public function store(Request $request)
  {
    $data = $request->all();
    // $data['slug_id'] = 1;
    $data['user_id'] = Auth::id();
    $result = posts::create($data);

    return redirect('admin/posts/');
  }

  public function show($id)
  {
    return redirect('admin/posts');
  }

  public function edit($id)
  {
    $post = posts::find($id);
    $categorys = category::all()->pluck('name','id')->prepend('なし', '');
    return view('admin.post.update', compact('post','categorys'));
  }

  public function update(Request $request, $id)
  {
    $post = posts::find($id);
    $post->title = $request->title;
    $post->category_id = $request->category_id;
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

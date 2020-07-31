<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTag;
use App\Models\tag;

class TagController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tags = tag::paginate(20);
    return view('admin.tag.index', compact('tags'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $tag = new tag();
    return view('admin.tag.create', compact('tag'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreTag $request)
  {
    $data = $request->all();
    $result = tag::create($data);
    return redirect('admin/tag');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function show(tag $tag)
  {
    return redirect('admin/tag/');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function edit(tag $tag)
  {
    return view('admin.tag.update', compact('tag'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function update(StoreTag $request, tag $tag)
  {
    $tag->slug = $request->slug;
    $tag->name = $request->name;
    $tag->description = $request->description;
    $tag->save();

    return redirect('admin/tag');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function destroy(tag $tag)
  {
    $tag->delete();
    return redirect('admin/tag');
  }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categorys = category::paginate(20);

    return view('admin.category.index', compact('categorys'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $category = new category();

    return view('admin.category.create', compact('category'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreCategory $request)
  {
    $data = $request->all();
    $result = category::create($data);
    return redirect('admin/category/');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(category $category)
  {
    return redirect('admin/category');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(category $category)
  {
    return view('admin.category.update', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(StoreCategory $request, category $category)
  {
    $category->slug = $request->slug;
    $category->name = $request->name;
    $category->description = $request->description;
    $category->save();

    return redirect('admin/category');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(category $category)
  {
    $category->delete();
    return redirect('admin/category');
  }
}

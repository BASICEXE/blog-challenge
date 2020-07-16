<?php
namespace App\Services;
use App\Models\posts;

class PostService {
  public function getPost() {
    return posts::all();
  }
}


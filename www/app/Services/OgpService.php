<?php
namespace App\Services;

class OgpService {
  public function __construct()
  {
    $this->data = [];
    $this->add('ogp:site_name', config('app.name', 'Laravel'));
    if (\Route::is('/')) {
      $this->add('og:type', 'website');
    } else {
      $this->add('og:type', 'article');
    }
  }

  public function add($property, $contents) {
    $this->data[] = [
      'property' => $property,
      'contents' => $contents,
    ];
    return $this;
  }

  public function get() {
    return $this->data;
  }
}


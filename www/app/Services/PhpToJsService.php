<?php
namespace App\Services;

class PhpToJsService {

  public function __construct()
  {
    
  }

  /**
   * convert convert to js
   * 
   * @param array $data 
   * @access public
   * @return json
   */
  public function convert(array $data = []) {
    return json_encode($data,JSON_PRETTY_PRINT);
  }

}


<?php

namespace App\Controllers;

use \Exception;
use App\Authorization\Authorization;
use App\Utils\Route;

class ProductController {
  private $authorization;

  function __construct() {
    $this->authorization = new Authorization();
  }

  public function add($brand,$name, $description) {
    $_SESSION['products'][$brand."-".$name] = array('brand'=>$brand,'name'=>$name,'description'=>$description);
    ksort($_SESSION['products']);
  }

  public function delete($key) {
    unset($_SESSION['products'][$key]);
  }  

}

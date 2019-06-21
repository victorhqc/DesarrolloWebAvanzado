<?php

use App\Utils\Route;
use App\Authorization\Authorization;


function navigation() {
  $index = Route::get_route("");
  $logout = Route::get_route("logout.php");
  $list = Route::get_route("list.php");
  $addProduct = Route::get_route("addProduct.php");


  $authorization = new Authorization();
  $user = $authorization->get_authorized_user();
  $username = $user->get_username();

  echo <<<EOL
  <nav class="navbar sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="$list">Ver listado del catálogo</a>
    <div>
      <span class="navbar-text mr-3">
        $username
      </span>
      <span class="navbar-text">
        <a class="btn btn-outline-info" href="$logout" role="button">
          Cerrar sesión
        </a>
      </span>
    </div>
  </nav>
EOL;
}

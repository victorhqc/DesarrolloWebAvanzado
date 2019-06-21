<?php

use App\Utils\Route;
use App\Authorization\Authorization;


function navigation($active_path = "") {
  $authorization = new Authorization();
  $user = $authorization->get_authorized_user();
  $username = $user->get_username();

  $logout = Route::get_route("logout.php");

  $route_elements = build_navigation($active_path);

  echo <<<EOL
  <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Catálogo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" role="navigation">
        $route_elements
      </ul>
    </div>
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

function build_navigation($active_path = "") {
  $routes = array(
    array("path_name" => "", "file_name" => "index.php", "name" => "Inicio"),
    array("path_name" => "products", "file_name" => "products.php", "name" => "Productos")
  );

  $navigation_routes = "";
  foreach ($routes as $route) {
    $route_path = Route::get_route($route["file_name"]);
    $active_class = ($route["path_name"] === $active_path ? "active" : "");
    $route_name = $route["name"];

    $navigation_routes .= <<<EOL
      <li class="nav-item">
        <a class="nav-link $active_class" href="$route_path">$route_name</a>
      </li>
EOL;
  }

  return $navigation_routes;
}

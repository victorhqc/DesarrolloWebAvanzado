<?php

use App\Utils\Route;

function navigation() {
  $index = Route::get_route("");
  $logout = Route::get_route("logout.php");

  echo <<<EOL
  <nav class="navbar sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $index; ?>">Catálogo</a>
    <div>
      <span class="navbar-text">
        <button class="btn btn-outline-info" type="button">
          <a href="<?php echo $logout; ?>">Cerrar sesión</a>
        </button>
      </span>
    </div>
  </nav>
EOL;
}

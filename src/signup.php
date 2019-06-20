<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php");
require_once("./templates/dependencies.php");

use App\Utils\Route;
use App\Controllers\SignupController;

$controller = new SignupController();
$controller->handle_signup();

$form_target = Route::get_route("signup.php");
$login = Route::get_route("login.php");

// Posibles errores si el registro falla
$errors = Route::get_data_from_redirect();

?>
<!DOCTYPE html>
<html lang="es-MX" dir="ltr">
  <head>
    <title>Catálogo - Registrarse</title>
    <?php echo dependencies(); ?>
    <style type="text/css">
      body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
      }

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
      }

      .form-sugnin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }

      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }

      .form-signin input[name="password"] {
        border-radius: 0;
        margin-bottom: -1px;
      }

      .form-signin input[name="password2"] {
        margin-bottom: 10px;
        border-top-right-radius: 0;
        border-top-left-radius: 0;
      }
    </style>
  </head>
  <body class="text-center">
    <form class="form-signin" action="<?php echo $form_target; ?>" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Regístrate</h1>
      <?php
        if (sizeof($errors) > 0) {
          foreach ($errors as $key => $value) {
            echo <<<EOT
      <div class="alert alert-danger" role="alert">
        $value
      </div>
EOT;
          }
        }
      ?>
      <label class="sr-only" for="inputEmail">Correo electrónico</label>
      <input
        id="inputEmail"
        name="username"
        class="form-control"
        type="email"
        placeholder="Correo electrónico"
        required=""
        autofocus=""
        />
      <label class="sr-only" for="inputPassword">Contraseña</label>
      <input
        id="inputPassword"
        name="password"
        class="form-control"
        type="password"
        placeholder="Contraseña"
        required=""
      />
      <label class="sr-only" for="inputPassword">Repite la contraseña</label>
      <input
        id="inputPassword"
        name="password2"
        class="form-control"
        type="password"
        placeholder="Repite la Contraseña"
        required=""
      />
      <button class="btn btn-lg btn-primary btn-lock" type="submit">
        Registrarse
      </button>
      <p class="mt-5 mb-3">
        <a href="<?php echo $login; ?>">Inicia sesión</a>
      </p>
    </form>
  </body>
</html>

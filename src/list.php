<?php

  require_once(__DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php");
  require_once("./templates/dependencies.php");
  require_once("./templates/navigation.php");
  use App\Utils\Route;
  $delete = Route::get_route("deleteProduct.php");
?>
<!DOCTYPE html>
<html lang="es-MX" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Catálogo - Listado!</title>
    <?php echo dependencies(); ?>
  </head>
  <body>
    <?php echo navigation(); ?>
    <div class="container mt-4">
      <div class="jumbotron">
        <h1 class="display-4">
          Listado de productos!
        </h1>

        <p>
          <a class="btn btn-warning addProduct" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Registrar
          </a>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-body">
            <form action="addProduct.php">
              <input type="text" name="brandProduct" placeholder="Marca del producto" required>
              <input type="text" name="nameProduct" placeholder="Nombre del producto" required>
              <input type="text" name="descriptionProduct" placeholder="Descripción de producto" required>
              <button type="submit" class="btn btn-success">Registrar</button>
            </form>
          </div>
        </div>

        <hr class="my-4">
        <p>
          <?php
          if(isset($_SESSION['products']) && count($_SESSION['products'])>0):
            ?>
            Productos:
            <ul>
              <?php 
                foreach ($_SESSION['products'] as $key => $value):
                  if(isset($value['name']) && isset($value['description'])):
                    echo "<li>";
                      echo "Marca: ".$value['brand']."<br>";
                      echo "Nombre: ".$value['name']."<br>";
                      echo "Descripción: ".$value['description']."<br>";
                    echo "<a href='$delete?key=$key' class='btn btn-danger'>Eliminar producto</a>
                    </li>";  
                  endif;
                endforeach;            
                ?>
              </ul>
          <?php 
          else:
            echo "Ningún producto registrado.";
          endif;
          ?>          
         
        </p>
      </div>
    </div>
  </body>
</html>

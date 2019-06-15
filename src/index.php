<?php
header("Access-Control-Allow-Origin: *");

$name = $_GET['name'];

if(isset($name)) {
  echo "Saludos ".$name;
} else {
  echo "Hola desconocido ¿Cómo estás?";
}


echo "--------";

echo phpinfo();
?>

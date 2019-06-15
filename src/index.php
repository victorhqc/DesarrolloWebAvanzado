<?php
header("Access-Control-Allow-Origin: *");

if(isset($_GET['name'])) {
  echo "<p>Saludos ".$_GET['name']."</p>";
} else {
  echo "<p>Hola desconocido ¿Cómo estás?</p>";
}

echo "<br />";
echo "<p>--------</p>";

echo phpinfo();
?>

<?php

namespace App\Utils;

/**
 * Ruta que facilita la navegación en la página web. En producción, el sitio estará configurado de
 * forma distinta que en desarrollo. Esta clase provee una abstracción sencilla para manejar esta
 * diferencia en configuración y mantener las rutas de una forma estandarizada.
 */
class Route {
  private static $session_key = '__redirection_data__';

  public static function redirect_to(string $relative_path) {
    header("Location: ".self::get_route($relative_path));
    exit();
  }

  public static function get_route(string $relative_path) {
    return getenv('URL').$relative_path;
  }

  /**
   * Algunas veces es necesario hacer una redirección y al momento de llegar a la página redirigida
   * tener cierta información. Este método guarda la información en session para leerla después
   * de ser redirigido. Esto no es muy eficiente, pero por cuestión de simplicidad en el código es
   * suficiente.
   */
  public static function redirect_with_data(string $relative_path, array $data) {
    $_SESSION[self::$session_key] = array();
    foreach ($data as $key => $value) {
      $_SESSION[self::$session_key][$key] = $value;
    }

    self::redirect_to($relative_path);
  }

  public static function get_data_from_redirect() {
    if (!isset($_SESSION[self::$session_key])) {
      return array();
    }

    $data = $_SESSION[self::$session_key];
    unset($_SESSION[self::$session_key]);

    return $data;
  }
}

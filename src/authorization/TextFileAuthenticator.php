<?php
namespace App\Authorization;

use \Exception;
use App\Authorization\Authorize;
use App\Users\User;

/**
 * No utilizar esta clase directamente. Esta clase implementa la autorización por medio de un
 * archivo de texto y no maneja la sesión en PHP. Es simplemente una interfaz que se usa
 * internamente en `App\Authorization\Authorization`.
 */
class TextFileAuthenticator implements Authorize {
  private $users = array();

  public function register_user(string $username, string $password) {
    if ($this->is_user_registered($username)) {
      throw new Exception("El usuario ya está registrado.");
    }

    $file = $this->open_authorization_file("a");
    $encrypted_password = $this->encrypt_password($password);

    fputcsv($file, array($username, $encrypted_password));
    fclose($file);

    return new User($username, $encrypted_password);
  }

  public function is_user_registered(string $username) {
    $user = $this->get_user_from_file($username);

    if ($user == false) {
      return false;
    }

    return true;
  }

  public function verify_user(string $username, string $password) {
    $user = $this->get_user_from_file($username);
    if ($user == false) {
      return false;
    }

    $encrypted_password = $this->encrypt_password($password);

    if ($user->get_password() !== $encrypted_password) {
      return false;
    }

    return $user;
  }

  public function get_user(string $username) {
    return $this->get_user_from_file($username);
  }

  private function open_authorization_file(string $mode) {
    $file = fopen(getenv("AUTHORIZATION_FILE"), $mode);
    if ($file == false) {
      throw new Exception("Can't open the authorization file.");
    }

    return $file;
  }

  private function get_user_from_file(string $username) {
    $users = $this->get_users_from_file();

    foreach($users as $user) {
      if ($user->get_username() === $username) {
        return $user;
      }
    }

    return false;
  }

  private function get_users_from_file() {
    $file = $this->open_authorization_file("r");

    $users = array();
    while(!feof($file)) {
      $raw_user = fgetcsv($file, 128, ",");

      if (!$raw_user || sizeof($raw_user) <= 0) {
        continue;
      }

      $user = new User($raw_user[0], ($_SERVER['REQUEST_URI']=="/login.php" ? $raw_user[1] : ""));  
    
      array_push($users, $user);
    }

    fclose($file);

    return $users;
  }

  private function encrypt_password(string $password) {
    // SHA1 is unsafe for production.
    $UNSAFE_encrypted_password = sha1($password);

    return $UNSAFE_encrypted_password;
  }
}

<?php
namespace App\Authorization;

use App\Authorization\Authorize;
use App\Users\User;

class TextFileAuthenticator implements Authorize {
  private $filename = "users.csv";
  private $users = array();

  public function register_user($username, $password) {
    if ($this->is_user_registered($username)) {
      throw new Exception("The user is already registered.");
    }

    $this->add_user_to_file($username, $password);
  }

  public function is_user_registered($username) {
    $user = $this->get_user_from_file($username);
    if ($user == false) {
      return true;
    }

    return false;
  }

  public function verify_user($username, $password) {
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

  public function get_user($username) {
    return $this->get_user_from_file($username);
  }

  private function open_authorization_file($mode) {
    $file = fopen(__DIR__."../../".$this->filename, $mode);
    if ($file == false) {
      throw new Exception("Can't open the authorization file.");
    }

    return $file;
  }

  private function get_user_from_file($username) {
    $users = $this->get_users_from_file();

    foreach($users as $user) {
      if ($user->get_username() === $username) {
        return $user;
      }
    }

    return false;
  }

  private function get_users_from_file() {
    $file = $this->open_authorization_file('r');

    $users = array();
    while(!feof($file)) {
      $raw_user = fgetcsv($file, 128, ",");

      $user = new User($raw_user[0], $raw_user[1]);
      array_push($users, $user);
    }

    fclose($file);

    return $users;
  }

  private function add_user_to_file($username, $password) {
    $file = $this->open_authorization_file('a');
    $encrypted_password = $this->encrypt_password($password);

    fputcsv($file, "$username,$encrypted_password");
    fclose($file);
  }

  private function encrypt_password($password) {
    // SHA1 is unsafe for production.
    $UNSAFE_encrypted_password = sha1($password);

    return $UNSAFE_encrypted_password;
  }
}

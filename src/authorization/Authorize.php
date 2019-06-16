<?php

namespace App\Authorization;

interface Authorize {
  public function register_user($username, $password);
  public function is_user_registered($username);
  public function verify_user($username, $password);
  public function get_user($username);
}

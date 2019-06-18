<?php

namespace App\Authorization;

interface Authorize {
  public function register_user(string $username, string $password);
  public function is_user_registered(string $username);
  public function verify_user(string $username, string $password);
  public function get_user(string $username);
}

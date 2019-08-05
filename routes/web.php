<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$router->get('/', 'HomeController@showHome')->name('home');
$router->get('/home', 'HomeController@showHome')->name('home');

$router->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$router->post('login', 'Auth\LoginController@login');

$router ->get('logout', 'Auth\LoginController@logout')->name('logout');

$router->get('signup', 'Auth\SignupController@showSignupForm')->name('signup');
$router->post('signup', 'Auth\SignupController@signup');

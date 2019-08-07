<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran todas las rutas de la aplicación.
|
*/

$router->get('/', 'HomeController@showHome')->name('home');
$router->get('home', 'HomeController@showHome')->name('home');

$router->get('products', 'ProductsController@showProducts')->name('products');
$router->get('productAdd', 'ProductsController@addProducts')->name('productAdd');
$router->post('add', 'ProductsController@add');
$router->get('delete/{id}', 'ProductsController@delete')->name('delete');

$router->get('typeAdd', 'ProductsController@typeAdd')->name('typeAdd');
$router->post('addType', 'ProductsController@addType');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| A continuación, se registran todas las rutas que tienen que ver con la
| autenticación de usuarios.
 */
$router->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$router->post('login', 'Auth\LoginController@login');

$router ->get('logout', 'Auth\LoginController@logout')->name('logout');

$router->get('signup', 'Auth\SignupController@showSignupForm')->name('signup');
$router->post('signup', 'Auth\SignupController@signup');

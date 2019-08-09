<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran todas las rutas de la aplicación.
|
*/

$router->get('/', 'ProductsController@showProducts')->name('products');
$router->get('products', 'ProductsController@showProducts')->name('products');
$router->get('add_product', 'ProductsController@showAddProduct')->name('add_product');
$router->post('submit_product', 'ProductsController@submitProduct');

// Al tratarse de un request por un formulario debe usarse únicamente GET o POST.
// Una aplicación de tipo REST debería utilizar el método DELETE.
$router->post('remove_product', 'ProductsController@removeProduct');

// TODO: Mover a su propio controlador.
$router->get('add_product_type', 'TypeController@showAddProductType')->name('add_product_type');
$router->post('submit_product_type', 'TypeController@submitProductType');

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

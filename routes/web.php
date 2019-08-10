<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran todas las rutas de la aplicación.
|
*/

$router
    ->get('/', 'ProductsController@showProducts')
    ->name('products');
$router
    ->get('products', 'ProductsController@showProducts')
    ->name('products');

$router
    ->get('add_product', 'ProductsController@showAddProduct')
    ->middleware('only_admin')
    ->name('add_product');
$router
    ->post('submit_product', 'ProductsController@submitProduct')
    ->middleware('only_admin');

// Al tratarse de un request por un formulario debe usarse únicamente GET o POST.
// Una aplicación de tipo REST debería utilizar el método DELETE. Nosotros utilizamos el método
// POST para que al menos el usuario no pueda borrar un usuario accidentalmente al navegar a la
// ruta manualmente.
$router
    ->post('remove_product', 'ProductsController@removeProduct')
    ->middleware('only_admin');

$router
    ->get('add_product_type', 'BrandAndProductTypeController@showAddProductType')
    ->middleware('only_admin')
    ->name('add_product_type');
$router
    ->post('submit_product_type', 'BrandAndProductTypeController@submitProductType')
    ->middleware('only_admin');

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

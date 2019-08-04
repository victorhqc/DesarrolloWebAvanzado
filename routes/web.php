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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/login', function ()  {
    return view('login', ['name' => 'James']);
});

$router->get('/signup', function () {
    return view('signup', []);
});

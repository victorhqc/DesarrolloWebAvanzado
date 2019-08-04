<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/login', function ()  {
    return view('login', ['name' => 'James']);
});

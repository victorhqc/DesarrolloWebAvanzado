<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * El nombre de los cookies que no deben ser encriptados.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}

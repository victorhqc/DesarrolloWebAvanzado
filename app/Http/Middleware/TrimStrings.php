<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * El nombre de los atributos que no deben ser cortados.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}

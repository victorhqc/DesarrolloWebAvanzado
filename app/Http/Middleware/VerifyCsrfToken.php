<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indica si el cookie con XSRF-TOKEN debe de ser puesto en la respuesta.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * Los URIs que deben ser excluidos de la verificación de CSRF.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}

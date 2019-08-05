<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * Los proxies confiables para la aplicación.
     *
     * @var array|string
     */
    protected $proxies;

    /**
     * Las cabeceras que deben ser usadas para detectar proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}

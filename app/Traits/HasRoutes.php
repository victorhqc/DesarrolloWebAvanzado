<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

trait HasRoutes {
    protected $route_paths = [
        [
            "path_name" => "products",
            "name" => "Productos",
            "is_active" => false,
            "is_public" => true
        ],
        [
            "path_name" => "add_product",
            "name" => "Agregar producto",
            "is_active" => false,
            "is_public" => false
        ],
        [
            "path_name" => "add_product_type",
            "name" => "Agregar tipo o marca",
            "is_active" => false,
            "is_public" => false
        ],
    ];

    /**
     * Construye los datos necesarios para renderizar la barra de navegación.
     * @param  Request $request
     * @return Array
     */
    public function buildHeaderData(Request $request) {
        $user = $request->user();

        return [
            'isAdmin' => isset($user) ? $user->is_admin() : false,
            'email_img' =>  isset($user) ? $user->email_gravatar_url(30) : '',
            'email' => isset($user) ? $user->email : '',
            'name' =>  isset($user) ? $user->name() : '',
            'route_paths' => $this->buildRoutes($request),
        ];
    }

    /**
     * Construye las rutas a renderizar en la barra de navegación.
     * @param  Request $request
     * @return Array
     */
    protected function buildRoutes(Request $request) {
        $currentRoute = $request->route()->getName();

        $parsed_routes = array_map($this->iteratePaths($currentRoute), $this->route_paths);
        $filtered_routes = array_filter($parsed_routes, $this->filterPaths($request));

        return $filtered_routes;
    }

    /**
     * Elige la ruta activa.
     * @param  string $currentRoute
     * @return Array
     */
    protected function iteratePaths(string $currentRoute) {
        return function($path) use($currentRoute) {
            if ($currentRoute == $path["path_name"]) {
                $path["is_active"] = true;
            }

            return $path;
        };
    }

    /**
     * Oculta las rutas a los usuarios que no son administradores.
     * @param  Request $request
     * @return Array
     */
    protected function filterPaths(Request $request) {
        $user = $request->user();
        $isAdmin = isset($user) ? $user->is_admin() : false;

        return function($path) use($isAdmin) {

            // 1. Las rutas públicas siempre se muestran.
            // Si el usuario es administrador y la ruta no es pública, igual se muestra.
            if (
                $path["is_public"]
                || ($isAdmin && !$path["is_public"])
            ) {
                return true;
            }

            // Todo lo demás, no se muestra.
            return false;
        };
    }
}

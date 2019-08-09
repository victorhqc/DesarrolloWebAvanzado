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

    public function buildRoutes(Request $request) {
        $currentRoute = $request->route()->getName();

        $parsed_routes = array_map($this->iteratePaths($currentRoute), $this->route_paths);
        $filtered_routes = array_filter($parsed_routes, $this->filterPaths($request));

        return $filtered_routes;
    }

    protected function iteratePaths(string $currentRoute) {
        return function($path) use($currentRoute) {
            if ($currentRoute == $path["path_name"]) {
                $path["is_active"] = true;
            }

            return $path;
        };
    }

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

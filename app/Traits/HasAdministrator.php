<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait HasAdministrator {

    /**
     * Por default, cualquier usuario autorizado es administrador. Esto se debería cambiar una
     * vez que la aplicación requiera tener permisos más estrictos.
     * @param  Request $request
     * @return boolean
     */
    public function isAdmin(Request $request) {
        if (!$request->user()) {
            return false;
        }

        return true;
    }
}

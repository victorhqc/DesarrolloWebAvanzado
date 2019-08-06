<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait GravatarEmail {

    /**
     * Obtiene la URL para mostrar una imagen de gravatar utilizando el email del usuario.
     * Más información en:
     * https://en.gravatar.com/support/what-is-gravatar/
     * @param  Request $request
     * @return string
     */
    public function email_gravatar_url(Request $request, $size = 80, $image_set = 'identicon') {
        if (!$request->user()) {
            return "";
        }

        $email = strtolower(trim($request->user()->email));

        $gravatar_url = 'https://www.gravatar.com/avatar/';
        $gravatar_url .= md5($email);
        $gravatar_url .= "?s=$size&d=$image_set";

        return $gravatar_url;
    }
}

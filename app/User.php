<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Traits\UsesUuid;

class User extends Authenticatable {
    use Notifiable;
    use UsesUuid;

    /**
     * Los atributos que se pueden asignar al crearse/editarse.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password',
    ];

    /**
     * Los atributos que deben de estar ocultos.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Obtiene la URL para mostrar una imagen de gravatar utilizando el email del usuario.
     * Más información en:
     * https://en.gravatar.com/support/what-is-gravatar/
     * @param  integer $size
     * @param  string $image_set
     * @return string
     */
    public function email_gravatar_url($size = 80, $image_set = 'identicon') {
        $email = strtolower(trim($this->email));

        $gravatar_url = 'https://www.gravatar.com/avatar/';
        $gravatar_url .= md5($email);
        $gravatar_url .= "?s=$size&d=$image_set";

        return $gravatar_url;
    }

    /**
     * Por default, cualquier usuario autorizado es administrador. Esto se debería cambiar una
     * vez que la aplicación requiera tener permisos más estrictos.
     * @param  Request $request
     * @return boolean
     */
    public function is_admin() {
        return $this->id ? true : false;
    }
}

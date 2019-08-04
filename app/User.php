<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Traits\UsesUuid;

class User extends Authenticatable
{
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
}

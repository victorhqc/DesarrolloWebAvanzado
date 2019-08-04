<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * La llave utilizada como primaria, no es de autoincremento, sino UUID
     * @var bool
     */
    public $incrementing = false;

    /**
     * La llave primaria es de tipo string
     * @var string
     */
    public $keyType = 'string';

    /**
     * Los atributos que se pueden asignar al crearse/editarse.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Los atributos que deben ser "parseados" a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
    ];
}

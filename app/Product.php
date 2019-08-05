<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesUuid;

class ProductType extends Model {
    use UsesUuid;

    /**
     * Los atributos que se pueden asignar al crearse/editarse.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Un tipo de producto tiene muchos productos.
     */
    public function products() {
        return $this->hasMany('App\Product');
    }
}

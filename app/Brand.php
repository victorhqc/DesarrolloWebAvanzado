<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesUuid;

class Brand extends Model {
    use UsesUuid;

    /**
     * Los atributos que se pueden asignar al crearse/editarse.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Una marca tiene muchos productos.
     */
    public function products() {
        return $this->hasMany('App\Brand');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Traits\UsesUuid;

class Product extends Model
{
    use UsesUuid;

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
        'name', 'img_src', 'description', 'product_type_id', 'brand_id',
    ];

    /**
     * Busca productos utilizando una aguja por:
     * - nombre
     * - tipo de producto
     * - marca
     */
    public static function searchBy(String $needle) {
        return DB::table("products")
            ->join("brands", "products.brand_id", "=", "brands.id")
            ->join("product_types", "products.product_type_id", "=", "product_types.id")
            ->select(
                "products.*",
                "brands.name as brand_name",
                "product_types.name as product_type_name"
            )
            ->where("products.name", "like", "%$needle%")
            ->orWhere("brands.name", "like", "%$needle%")
            ->orWhere("product_types.name", "like", "%$needle%")
            ->get();
    }
}

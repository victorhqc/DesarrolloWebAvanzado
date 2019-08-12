<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Traits\UsesUuid;

class Product extends Model {
    use UsesUuid;

    /**
     * Los atributos que se pueden asignar al crearse/editarse.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'img_src', 'description', 'product_type_id', 'brand_id',
    ];

    /**
     * Un producto pertenece a una marca.
     */
    public function brand() {
        return $this->belongsTo('App\Brand');
    }

    public function brandName() {
        return $this->brand()->first()->name;
    }

    /**
     * Un producto pertenece a un tipo.
     */
    public function productType() {
        return $this->belongsTo('App\ProductType');
    }

    public function productTypeName() {
        return $this->productType()->first()->name;
    }

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

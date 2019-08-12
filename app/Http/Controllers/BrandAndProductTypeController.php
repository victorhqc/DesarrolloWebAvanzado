<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\ProductType;
use App\Brand;
use App\Traits\HasRoutes;


class BrandAndProductTypeController extends Controller {

    use HasRoutes;

    public function showAddProductType(Request $request) {
        return view('brand_and_product_type', $this->buildHeaderData($request));
    }

    public function submitProductType(Request $request) {
        $name = $request->input('name');

        switch ($request->input('type')) {
            case 'product_type':
                $this->addProductType($name);
                break;
            case 'brand':
                $this->addBrand($name);
                break;
        }

        return redirect(route('add_product'));
    }

    protected function addProductType($name) {
        ProductType::firstOrCreate([
            'name' => $name,
        ]);
    }

    protected function addBrand($name) {
        Brand::firstOrCreate([
            'name' => $name,
        ]);
    }
}

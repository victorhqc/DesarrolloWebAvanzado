<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Product;
use App\ProductType;
use App\Brand;
use App\Traits\HasRoutes;

class ProductsController extends Controller {

    use HasRoutes;

    public function showProducts(Request $request) {
        $user = $request->user();

        $products = $this->getProducts($request);

        return view('products', $this->getBaseRouteParams($request));
    }

    public function showAddProduct(Request $request) {
        $productsTypes = ProductType::all();
        $brands = Brand::all();

        return view('add_product', array_merge(
            $this->getBaseRouteParams($request),
            [
                'productsTypes' => $productsTypes,
                'brands' => $brands,
            ]
        ));
    }

    public function submitProduct(Request $request) {
        $file = $request->file('upload_file');
        $destinationPath = 'uploads';

        $file->move($destinationPath, $file->getClientOriginalName());

        Product::create([
            'name' => $request->input('product_name'),
            // Se concatena la ruta del servidor. Esto puede ocacionar algunos problemas al
            // migrar el servidor o la base de datos. Pero es fácil de manejar, y esto
            // nos evita concatenar la ruta del servidor cada vez que se haga una consulta.
            'img_src' => URL::to('/') . '/uploads/'. $file->getClientOriginalName(),
            'description' => $request->input('product_description'),
            'product_type_id' => $request->input('product_type'),
            'brand_id' => $request->input('product_brand'),
        ]);

        return redirect(route('products'));
    }

    public function removeProduct(Request $request) {
        $id = $request->input('id');

        $delete = Product::find($id);
        $delete->delete();

        return redirect(route('products'));
    }

    private function getBaseRouteParams(Request $request) {
        return array_merge(
            [
                'products' => $this->getProducts($request),
                'search' => $request->input('search'),
            ],
            $this->buildHeaderData($request)
        );
    }

    private function getProducts(Request $request) {
        $needle = $request->input('search');

        if (!isset($needle) || !$needle) {
            return Product::all();
        }

        return Product::searchBy(trim($needle));
    }
}

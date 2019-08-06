<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\HasAdministrator;
use App\Product;
use App\ProductType;
use App\Brand;

class ProductsController extends Controller {

    use HasAdministrator;

    public function showProducts(Request $request) {
        $isAdmin = $this->isAdmin($request);

        // TODO: Se debería de implementar un páginado en algún momento.
        $products = Product::all();

        return view('products', [
            'isAdmin' => $isAdmin,
            'products' => $products,
        ]);
    }

    public function addProducts(Request $request) {
        $isAdmin = $this->isAdmin($request);

        // TODO: Se debería de implementar un páginado en algún momento.
        $products = Product::all();
        $productsTypes = ProductType::all();
        $brands = Brand::all();

        return view('productAdd', [
            'isAdmin' => $isAdmin,
            'products' => $products,
            'productsTypes' => $productsTypes,
            'brands' => $brands,
        ]);
    }  

    public function add(Request $request) {

        $products = new Product();
        $products->id=Product::max('id')+1; 
        $products->name=$_REQUEST['nombre'];
        $products->img_src=$_REQUEST['nombre'];
        $products->description=$_REQUEST['descripcion'];
        $products->product_type_id=$_REQUEST['type'];
        $products->brand_id=$_REQUEST['brand'];
        $products->save();
        return redirect(route('products'));
    }    

    public function delete($id) {
        $delete = Product::find($id);
        $delete->delete();

        return redirect(route('products'));
    }       
}

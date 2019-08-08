<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'img_src' => $file->getClientOriginalName(),
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

    public function showAddProductType(Request $request) {
        return view('typeAdd');
    }

    public function submitProductType(Request $request) {
        if($_REQUEST['type']==1){
            $ProductType = new ProductType();
            $ProductType->id=ProductType::max('id')+1;
        }else{
            $ProductType = new Brand();
            $ProductType->id=Brand::max('id')+1;
        }
        $ProductType->name=$_REQUEST['nombre'];
        $ProductType->save();

        return redirect(route('productAdd'));
    }

    private function getBaseRouteParams(Request $request) {
        $user = $request->user();

        return [
            'isAdmin' => isset($user) ? $user->is_admin() : false,
            'products' => $this->getProducts($request),
            'email_img' =>  isset($user) ? $user->email_gravatar_url(30) : '',
            'email' => isset($user) ? $user->email : '',
            'search' => $request->input('search'),
            'route_paths' => $this->buildRoutes($request),
        ];
    }

    private function getProducts(Request $request) {
        $needle = $request->input('search');

        if (!isset($needle) || !$needle) {
            return Product::all();
        }

        return Product::searchBy(trim($needle));
    }
}

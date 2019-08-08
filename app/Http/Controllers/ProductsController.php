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

    public function addProducts(Request $request) {
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

    public function add(Request $request) {
        $file = $request->file('fileToUpload');
        $destinationPath = 'uploads';

        $file->move($destinationPath,$file->getClientOriginalName());

        $products = new Product();
        $products->id=Product::max('id')+1;
        $products->name=$_REQUEST['nombre'];
        $products->img_src=$file->getClientOriginalName();
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

    public function typeAdd(Request $request) {
        return view('typeAdd');
    }

    public function addType(Request $request) {
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

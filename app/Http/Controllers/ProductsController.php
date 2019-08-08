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
        $isAdmin = $this->isAdmin($request);

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
}

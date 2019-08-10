<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\ProductType;
use App\Brand;
use App\Traits\HasRoutes;


class TypeController extends Controller {

    use HasRoutes;

    public function showAddProductType(Request $request) {
        return view('add_type_or_brand', $this->buildHeaderData($request));
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

        return redirect(route('add_product'));
    }


}

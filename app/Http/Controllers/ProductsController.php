<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\HasAdministrator;

class ProductsController extends Controller {

    use HasAdministrator;

    public function showProducts(Request $request) {
        return view('products', ['isAdmin' => $this->isAdmin($request)]);
    }
}

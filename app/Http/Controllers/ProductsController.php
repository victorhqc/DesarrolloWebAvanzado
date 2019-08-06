<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductsController extends Controller {

    public function showProducts(Request $request) {
        $user = $request->user();

        // TODO: Se debería de implementar un páginado en algún momento.
        $products = Product::all();

        return view('products', [
            'isAdmin' =>  isset($user) ? $user->is_admin() : false,
            'products' => $products,
            'email_img' =>  isset($user) ? $user->email_gravatar_url(30) : '',
            'email' => isset($user) ? $user->email : '',
        ]);
    }
}

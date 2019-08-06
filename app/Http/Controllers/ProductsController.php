<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductsController extends Controller {

    public function showProducts(Request $request) {
        $user = $request->user();

        $products = $this->getProducts($request);

        return view('products', [
            'isAdmin' =>  isset($user) ? $user->is_admin() : false,
            'products' => $products,
            'email_img' =>  isset($user) ? $user->email_gravatar_url(30) : '',
            'email' => isset($user) ? $user->email : '',
            'search' => $request->input('search'),
        ]);
    }

    private function getProducts(Request $request) {
        $needle = $request->input('search');

        if (!isset($needle) || !$needle) {
            return Product::all();
        }

        return Product::searchBy(trim($needle));
    }
}

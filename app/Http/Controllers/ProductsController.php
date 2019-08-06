<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\HasAdministrator;
use App\Traits\GravatarEmail;

use App\Product;

class ProductsController extends Controller {

    use HasAdministrator;
    use GravatarEmail;

    public function showProducts(Request $request) {
        $isAdmin = $this->isAdmin($request);
        $user = $request->user();

        // TODO: Se debería de implementar un páginado en algún momento.
        $products = Product::all();

        return view('products', [
            'isAdmin' => $isAdmin,
            'products' => $products,
            'email_img' => $this->email_gravatar_url($request, 30),
            'email' => isset($user) ? $user->email : '',
        ]);
    }
}

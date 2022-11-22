<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $show_products = Product::find($id);
        $params = [
            'show_products' => $show_products,
        ];
        return view('pages.product_detail',$params);
    }
}

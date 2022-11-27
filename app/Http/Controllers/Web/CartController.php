<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Oder;
use App\Models\Oder_detail;
use App\Models\Product;
use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart') ?? [];

        $products = [];
        if(count($cart) > 0){
            $cart_ids = array_keys($cart);
            $products = Product::whereIn('id',$cart_ids)->get();
        }
        return view('pages.cart',compact('products','cart'));
    }


    public function add_to_cart(Request $request){
        // dd($request->all());
        $product_id = $request->product_id;
        $qty = $request->qty;
        $cart = $request->session()->get('cart') ?? [];
        if( isset( $cart[$product_id] ) ){
            $cart[$product_id] = $qty + $cart[$product_id];
        }else{
            $cart[$product_id] = $qty;
        }
        $request->session()->put('cart', $cart);

        // $cart = $request->session()->get('cart') ?? [];
        // dd ($cart);

        return redirect()->back();
    }


    public function update_cart(Request $request){
        // dd($request->all());

        $cart = $request->qty;
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
    }




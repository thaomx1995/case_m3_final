<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        return view('pages.login_checkout');
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        $data['oder_id'] = $request->oder_id;
        $id = DB::table('customer')->insertGetId($data);

        $request->session()->put('id', $id);
        $request->session()->put('name', $request->name);

        return redirect()->route('web.checkout.index');
    }
    public function checkout(Request $request )
    {

        $products = Product::all();
        $cart = $request->session()->get('cart') ?? [];
        // $table[$cart] ?? null;
        return view('pages.checkout', compact('products','cart'));
    }
    public function save_checkout(Request $request )
    {
        $data = array();
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['note'] = $request->note;
        $data['order_total_price'] = $request->order_total_price;
        $id = DB::table('oder')->insertGetId($data);

        $request->session()->put('id', $id);

        return redirect()->route('payment');

    }
    public function payment()
    {
        return 'ok';
    }
    public function logout_checkout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('web.login-checkout.login');

    }
    public function login_customer(Request $request)
    {

        $email =$request->email;
        $password =md5($request->password);
        $result = DB::table('customer')->where('email',$email)->where('password',$password)->first();
        $request->session()->put('id', $result);
        return redirect()->route('web.checkout.index');

    }

}

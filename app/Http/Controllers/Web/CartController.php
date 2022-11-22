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
    /**
 * Action Đặt hàng
 */
// public function order(Request $request)
// {
//     // dd($request);
//     // Data gởi mail
//     // $dataMail = [];
//     try {
//         // Tạo mới khách hàng
//         $khachhang = new Customer();
//         $khachhang->password = bcrypt('123456');
//         $khachhang->name = $request->khachhang['name'];
//         $khachhang->email = $request->khachhang['email'];
//         if(!empty($request->khachhang['phone'])) {
//             $khachhang->phone = $request->khachhang['phone'];
//         }
//         $khachhang->save();


//         // Tạo mới đơn hàng
//         $donhang = new Oder();
//         $donhang->dh_thoiGianDatHang = Carbon::now();
//         $donhang->note = $request->donhang['note'];
//         $donhang->address = $request->donhang['address'];
//         $donhang->order_total_price = $request->donhang['order_total_price'];
//         $donhang->save();

//         foreach($request->giohang['items'] as $sp)
//         {
//             $chitietdonhang = new Oder_detail();
//             $chitietdonhang->product_price = $donhang->product_price;
//             $chitietdonhang->product_quantity =  $donhang->product_quantity;
//             $chitietdonhang->product_total_price =  $donhang->product_total_price;
//             $chitietdonhang->m_ma = 1;
//             $chitietdonhang->ctdh_soLuong = $sp['_quantity'];
//             $chitietdonhang->ctdh_donGia = $sp['_price'];
//             $chitietdonhang->save();

//         }


//     }
//     catch(ValidationException $e) {
//         return response()->json(array(
//             'code'  => 500,
//             'message' => $e,
//             'redirectUrl' => route('web.cart.add.order')
//         ));
//     }
//     catch(Exception $e) {
//         throw $e;
//     }

//     return response()->json(array(
//         'code'  => 200,
//         'message' => 'Tạo đơn hàng thành công!',
//         'redirectUrl' => route('frontend.orderFinish')
//     ));
// }

// /**
//  * Action Hoàn tất Đặt hàng
//  */
// public function orderFinish()
// {
//     return view('frontend.pages.order-finish');
// }

    }




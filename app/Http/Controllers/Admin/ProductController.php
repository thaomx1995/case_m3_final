<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $brands = Brand::all();
        $categorys = Category::all();
        return view('admin.product.create',compact('categorys','brands'));
    }
    public function store(ProductRequest $request)
    {
        $products = new Product();
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->product_desc = $request->product_desc;
        $products->product_content = $request->product_content;
        $products->product_price = $request->product_price;
        // $products->product_image = $request->product_image;
        $get_image = $request->product_image;
            $path = 'public/images/'; //lưu file vào mục public/images với tê mới là $newFileName
            $get_name_image = $get_image->getClientOriginalName(); //jpg,png lấy ra định dạng file và trả về
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //45678908766.jpg
            $get_image->move($path,$new_image);
            $products->product_image = $new_image;
        $products->product_status = $request->product_status;
        $products->product_name = $request->product_name;
        $products->save();
        return redirect()->route('product.index');

    }
    public function edit($id)
    {
        $brands = Brand::all();
        $categorys = Category::all();
        $products = Product::find($id);
        return view('admin.product.edit',compact('products','categorys','brands'));

    }
    public function update(Request $request ,$id)
    {
        $products = Product::find($id);
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->product_desc = $request->product_desc;
        $products->product_content = $request->product_content;
        $products->product_price = $request->product_price;
        $get_image = $request->product_image;

        if($get_image){
            $path = 'public/images/'; //lưu file vào mục public/images với tê mới là $newFileName
            $get_name_image = $get_image->getClientOriginalName(); //jpg,png lấy ra định dạng file và trả về
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //45678908766.jpg
            $get_image->move($path,$new_image);
            $products->product_image = $new_image;
    }
        $products->product_status = $request->product_status;
        $products->product_name = $request->product_name;
        $products->save();
        return redirect()->route('product.index');
    }
    public function destroy(Product  $product)
    {
        $product->delete();
        // dd( $categorys);
        return redirect()->route('product.index');


    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->where('deleted_at',null);;

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
        $notification = [
            'message' => 'Thêm sản phẩm thành công!',
            'alert-type' => 'success'
        ];
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
        return redirect()->route('product.index')->with($notification);

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
        $notification = [
            'message' => 'Cập nhật sản phẩm thành công!',
            'alert-type' => 'success'
        ];
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
        return redirect()->route('product.index')->with($notification);
    }
    // public function destroy($id)
    // {
    //         $notification = [
    //             'message' => 'Xóa danh mục thành công!',
    //             'alert-type' => 'success'
    //         ];
    //         try {
    //             Product::onlyTrashed()->findOrFail($id)->forceDelete();
    //             Session::flash('success','Xóa Thành công');
    //             return redirect()->route('product.trash')->with($notification);
    //         } catch (\Throwable $e) {
    //             Log::error($e->getMessage());
    //             Session::flash('error','xóa thất bại ');
    //             return redirect()->route('product.trash')->with('error', 'xóa không thành công.Danh mục này đã tồn tại sản phẩm');
    //         }
    //     }
    public function destroy($id)
    {
        $notification = [
            'message' => 'Xóa sản phẩm  thành công!',
            'alert-type' => 'success'
        ];
        try {
            Product::onlyTrashed()->findOrFail($id)->forceDelete();
            Session::flash('success','Xóa Thành công');
            return redirect()->route('product.trash')->with($notification);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error','xóa thất bại ');
            return redirect()->route('product.trash')->with('error', 'xóa không thành công.Danh mục này đã tồn tại sản phẩm');
        }
    }
        public function trash(){
            $products = Product::onlyTrashed()->get();
            $param = ['products'    => $products];
            return view('admin.product.trash', $param);
        }
        public  function softdeletes($id){
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $products = Product::findOrFail($id);
            $products->deleted_at = date("Y-m-d h:i:s");
            $notification = [
                'message' => 'Đã chuyển vào thùng rác!',
                'alert-type' => 'success'
            ];
            $products->save();
            return redirect()->route('product.index')->with($notification);
        }
        public function restoredelete($id){
            $products=Product::withTrashed()->where('id', $id);
            $products->restore();
            $notification = [
                    'message' => 'Khôi phục thành công!',
                     'alert-type' => 'success'
                ];
            return redirect()->route('product.trash')->with($notification);
        }
        public function export()
        {
           return Excel::download(new ProductExport, 'users.xlsx');
        }

    }



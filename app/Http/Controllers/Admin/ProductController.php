<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('viewAny', Product::class);
        $products = Product::all()->where('deleted_at',null);;
        $categorys = Category::all();
        $brands = Brand::all();
        $key        = $request->key ?? '';
        $product_name      = $request->product_name ?? '';
        $product_price      = $request->product_price ?? '';
        $category_id      = $request->category_id ?? '';
        $brand_id      = $request->brand_id ?? '';
        $id         = $request->id ?? '';
        // dd($request->all());

        $query = Product::query(true);
        if ($product_name) {
            $query->where('product_name', 'LIKE', '%' . $product_name . '%');
        }
        if ($product_price) {
            $query->where('product_price', 'LIKE', '%' . $product_price . '%');
        }
        if ($category_id) {
            $query->where('category_id', 'LIKE', '%' . $category_id . '%');
        }
        if ($brand_id) {
            $query->where('brand_id', 'LIKE', '%' . $brand_id . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('product_name', 'LIKE', '%' . $key . '%');
            $query->orWhere('product_price', 'LIKE', '%' . $key . '%');
            $query->orWhere('category_id', 'LIKE', '%' . $key . '%');
            $query->orWhere('brand_id', 'LIKE', '%' . $key . '%');
        }
        // DB::enableQueryLog();
        $products = $query->get();
        // dd(DB::getQueryLog());
        $params = [
            'f_id'        => $id,
            'f_product_name'     => $product_name,
            'f_product_price'     => $product_price,
            'f_category_id'     => $category_id,
            'f_brand_id'     => $brand_id,
            'f_key'       => $key,
            'f_categorys' => $categorys,
            'f_brands' => $brands,
            'products'    => $products,
        ];
        // dd($products);
        return view('admin.product.index', $params);
        // $products = Product::all()->where('deleted_at',null);

        // return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        // $this->authorize('create', Product::class);
        $products = Product::all();
        $brands = Brand::all();
        $categorys = Category::all();

        return view('admin.product.create',compact('categorys','brands','products'));
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
        // $this->authorize('update', Product::class);

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
        // $this->authorize('forceDelete', Product::class);
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
            // $this->authorize('viewtrash', Product::class);
            $products = Product::onlyTrashed()->get();
            $param = ['products'    => $products];
            return view('admin.product.trash', $param);
        }
        public  function softdeletes($id){
            // $this->authorize('delete', Product::class);
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
            // $this->authorize('restore', Product::class);
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



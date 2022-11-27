<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('admin.brand.index', compact('brands'));
    }
    public function create()
    {

        return view('admin.brand.create');
    }
    public function store(BrandRequest $request)
    {
        $notification = [
            'message' => 'Thêm mới thành công!',
            'alert-type' => 'success'
        ];
        $brands = new Brand();
        $brands->brand_name = $request->brand_name;
        $brands->brand_desc = $request->brand_desc;
        $brands->brand_status = $request->brand_status;

        $brands->save();
        return redirect()->route('brand.index')->with($notification);

    }
    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit',compact('brands'));

    }
    public function update(Request $request ,$id)
    {
        $notification = [
            'message' => 'Cập nhật thành công!',
            'alert-type' => 'success'
        ];
        $brands = Brand::find($id);
        $brands->brand_name = $request->brand_name;
        $brands->brand_desc = $request->brand_desc;
        $brands->brand_status = $request->brand_status;
        $brands->save();
        return redirect()->route('brand.index')->with($notification);
    }
    public function destroy($id)
    {
        $notification = [
            'message' => 'Xóa thành công!',
            'alert-type' => 'success'
        ];
        try {
            Brand::onlyTrashed()->findOrFail($id)->forceDelete();
            Session::flash('success','Xóa Thành công');
            return redirect()->route('brand.trash')->with($notification);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error','xóa thất bại ');
            return redirect()->route('brand.trash')->with('error', 'xóa không thành công.Danh mục này đã tồn tại sản phẩm');;
        }
    }
    public function trash()
        {
            $brands = Brand::onlyTrashed()->get();
            $param = ['brands'=> $brands];
            return view('admin.brand.trash', $param);

        }
    public  function softdeletes($id){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $brands = Brand::findOrFail($id);
        $brands->deleted_at = date("Y-m-d h:i:s");
        $notification = [
            'message' => 'Đã chuyển vào kho lưu!',
            'alert-type' => 'success'
        ];
        $brands->save();
        return redirect()->route('brand.index')->with($notification);

    }
    public function restoredelete($id){
        $brands=Brand::withTrashed()->where('id', $id);
        $brands->restore();
        $notification = [
                'message' => 'Khôi phục thành công!',
                 'alert-type' => 'success'
            ];
        return redirect()->route('brand.trash')->with($notification);


    }
}

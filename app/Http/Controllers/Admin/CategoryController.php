<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
class CategoryController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Category::class);

        $categorys = Category::all()->where('deleted_at',null);

        return view('admin.category.index', compact('categorys'));
    }
    public function create()
    {
        // $this->authorize('create', Category::class);
        return view('admin.category.create');
    }
    public function store(CategoryRequest $request)
    {


        $notification = [
            'message' => 'Thêm danh mục thành công!',
            'alert-type' => 'success'
        ];
        $categorys = new Category();
        $categorys->category_name = $request->category_name;
        $categorys->category_desc = $request->category_desc;
        $categorys->category_status = $request->category_status;
        $categorys->save();
        return redirect()->route('category.index')->with($notification);

    }
    public function edit($id)
    {
        // $this->authorize('update', Category::class);

        $categorys = Category::find($id);
        return view('admin.category.edit',compact('categorys'));

    }
    public function update(Request $request ,$id)
    {
        $notification = [
            'message' => 'Cập nhật danh mục thành công!',
            'alert-type' => 'success'
        ];
        $categorys = Category::find($id);
        $categorys->category_name = $request->category_name;
        $categorys->category_desc = $request->category_desc;
        $categorys->category_status = $request->category_status;
        $categorys->save();
        return redirect()->route('category.index')->with($notification);
    }
    public function destroy($id)
    {
        // $this->authorize('forceDelete', Category::class);

        $notification = [
            'message' => 'Xóa danh mục thành công!',
            'alert-type' => 'success'
        ];
        try {
            Category::onlyTrashed()->findOrFail($id)->forceDelete();
            Session::flash('success','Xóa Thành công');
            return redirect()->route('category.trash')->with($notification);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error','xóa thất bại ');
            return redirect()->route('category.trash')->with('error', 'xóa không thành công.Danh mục này đã tồn tại sản phẩm');
        }
    }
    public function trash(){
        // $this->authorize('viewtrash', Category::class);

        $categorys = Category::onlyTrashed()->get();
        $param = ['categorys'    => $categorys];
        return view('admin.category.trash', $param);
    }
    public  function softdeletes($id){
        // $this->authorize('delete', Category::class);

        $notification = [
            'message' => 'Đã chuyển vào thùng rác!',
            'alert-type' => 'success'
        ];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $categorys = Category::findOrFail($id);
        $categorys->deleted_at = date("Y-m-d h:i:s");

        $categorys->save();
        return redirect()->route('category.index')->with($notification);

    }
    public function restoredelete($id){
        // $this->authorize('restore',Category::class);

        $notification = [
            'message' => 'Khôi phục thành công!',
            'alert-type' => 'success'
        ];
        $categorys=Category::withTrashed()->where('id', $id);
        $categorys->restore();

        return redirect()->route('category.trash')->with($notification);


    }
}

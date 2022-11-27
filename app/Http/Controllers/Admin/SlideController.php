<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $sliders = Slide::all();
        return view('includes.web.slider',compact('sliders'));
    }
    public function create()
    {
        return view('admin.slide.create');
    }
    public function store(Request $request)
    {

        $notification = [
            'message' => 'Thêm slide thành công!',
            'alert-type' => 'success'
        ];
        $sliders = new Slide();
        $get_image = $request->product_image;
        $path = 'public/slide/'; //lưu file vào mục public/images với tê mới là $newFileName
        $get_name_image = $get_image->getClientOriginalName(); //jpg,png lấy ra định dạng file và trả về
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //45678908766.jpg
        $get_image->move($path,$new_image);
        $sliders->product_image = $new_image;
        return redirect()->route('slide.index')->with($notification);

    }
}

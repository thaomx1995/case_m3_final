<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
        $brands = new Brand();
        $brands->brand_name = $request->brand_name;
        $brands->brand_desc = $request->brand_desc;
        $brands->brand_status = $request->brand_status;
        $brands->save();
        return redirect()->route('brand.index');

    }
    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit',compact('brands'));

    }
    public function update(Request $request ,$id)
    {
        $brands = Brand::find($id);
        $brands->brand_name = $request->brand_name;
        $brands->brand_desc = $request->brand_desc;
        $brands->brand_status = $request->brand_status;
        $brands->save();
        return redirect()->route('brand.index');
    }
    public function destroy(Brand  $Brand)
    {
        $Brand->delete();
        // dd( $categorys);
        return redirect()->route('brand.index');

    }
}

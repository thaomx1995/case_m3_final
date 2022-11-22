<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::all();

        return view('admin.category.index', compact('categorys'));
    }
    public function create()
    {

        return view('admin.category.create');
    }
    public function store(CategoryRequest $request)
    {
        $categorys = new Category();
        $categorys->category_name = $request->category_name;
        $categorys->category_desc = $request->category_desc;
        $categorys->category_status = $request->category_status;
        $categorys->save();
        return redirect()->route('category.index');

    }
    public function edit($id)
    {
        $categorys = Category::find($id);
        return view('admin.category.edit',compact('categorys'));

    }
    public function update(Request $request ,$id)
    {
        $categorys = Category::find($id);
        $categorys->category_name = $request->category_name;
        $categorys->category_desc = $request->category_desc;
        $categorys->category_status = $request->category_status;
        $categorys->save();
        return redirect()->route('category.index');
    }
    public function destroy(Category  $category)
    {
        $category->delete();
        // dd( $categorys);
        return redirect()->route('category.index');

    }
}

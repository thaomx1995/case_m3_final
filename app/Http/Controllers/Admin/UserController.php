<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(UserRequest $request)
    {

        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;

        $users->save();
        return redirect()->route('user.index');

    }
    public function edit($id)
    {

        $users = User::find($id);
        return view('admin.user.edit',compact('users'));

    }
    public function update(Request $request ,$id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;

        $users->save();
        return redirect()->route('user.index');
    }
    public function destroy(User  $user)
    {
        $user->delete();
        // dd( $categorys);
        return redirect()->route('user.index');

    }
}

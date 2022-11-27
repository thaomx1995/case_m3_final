<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(){
        // $this->authorize('viewAny', User::class);
        $users = User::all();
        $param = [
            'users' => $users,
        ];
        return view('admin.user.index', $param);
    }

    public function showAdmin(){

        $admins = User::get();
        $param = [
            'admins' => $admins,
        ];
        return view('admin.user.admin', $param);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', User::class);
        $groups = Group::get();
        $param = [
            'groups' => $groups,
        ];
        return view('admin.user.create', $param);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $file = $request->image;
        if ($request->hasFile('image')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('image')->storeAs('public/images', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $user->image = $fileExtension;
        }
        $user->save();

        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
        Mail::send('admin.mail.mail', compact('data'), function ($email) use($request) {
            $email->subject('eshopee');
            $email->to($request->email, $request->name);
        });

        $notification = [
            'message' => 'Đăng ký thành công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }

    public function show($id)
    {
        // $this->authorize('view', User::class);
        $user = User::findOrFail($id);
        $param =[
            'user'=>$user,
        ];


        // $productshow-> show();
        return view('admin.user.profile',  $param );
    }

    public function edit($id)
    {
        $this->authorize('view', User::class);
        $user = User::find($id);
        $groups=Group::get();
        $param = [
            'user' => $user ,
            'groups' => $groups
        ];
        return view('admin.user.edit' , $param);
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $file = $request->image;
        if ($request->hasFile('image')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('image')->storeAs('public/images', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $user->image = $fileExtension;
        }
        $user->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }
     //Hiển Thị Đăng Nhập
     public function viewLogin()
     {
         if (Auth::check()) {
             return redirect()->route('dashboard.home');
         } else {
             return view('auth.login');
         }
     }

     //xử lí đăng nhập
     public function login(Request $request)
     {
         $credentials = $request->validate([
             'email' => ['required', 'email'],
             'password' => ['required'],
         ]);

         if (Auth::attempt($credentials)) {
             // dd($request->all());
             $request->session()->regenerate();

             return redirect()->route('dashboard.home');
         }
         $notification = [
             'message' => 'error',
         ];
         return back()->with($notification);

     }

     //Hiển Thị Đăng Ký
     public function viewRegister()
     {
         return view('auth.register');
     }
     //xử lí đăng ký
     public function register(Request $request)
     {
         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = bcrypt($request->password);
         try {
             $user->save();



             return redirect()->route('login');
         } catch (\Exception $e) {
             Log::error("message:" . $e->getMessage());
         }
     }

     public function logout(Request $request)
     {
         Auth::logout();

         $request->session()->invalidate();

         $request->session()->regenerateToken();

         return redirect()->route('login');
     }
}

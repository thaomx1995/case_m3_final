<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index($id)
    {
        $customers = Customer::find($id);
        return view('includes.web.header',compact('customers'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OderExport;
use App\Http\Controllers\Controller;
use App\Models\Oder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class OderController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Order::class);

        $oders = Oder::all();
        return view('admin.oder.index',compact('oders'));
    }
    public function detail($id)
    {
        // $this->authorize('view', Order::class);
        $items=DB::table('oder_detail')
        ->join('oder','oder_detail.oder_id','=','oder.id')
        ->join('product','oder_detail.product_id','=','product.id')
        ->select('product.*', 'oder_detail.*','oder.id')
        ->where('oder.id','=',$id)->get();
        // dd($items);
        return view('admin.order.oder_detail',compact('items'));
    }
        public function export()
    {
    return Excel::download(new OderExport, 'oder.xlsx');
    }
}

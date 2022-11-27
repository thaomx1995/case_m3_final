<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OderExport;
use App\Http\Controllers\Controller;
use App\Models\Oder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OderController extends Controller
{
    public function index()
    {
        $oders = Oder::all();
        return view('admin.oder.index',compact('oders'));
    }
        public function export()
    {
    return Excel::download(new OderExport, 'oder.xlsx');
    }
}

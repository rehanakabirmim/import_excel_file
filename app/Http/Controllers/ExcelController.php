<?php

namespace App\Http\Controllers;
use App\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function import(){
        return view('excel');
    }

    public function importExcel(Request $request){
        // dd($request->all());

        Excel::import(new ExcelImport, $request->file('file'));
        return redirect()->back();
    }
}

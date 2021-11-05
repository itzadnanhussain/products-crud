<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use  App\Exports\ExportProduct;

class ExportController extends Controller
{
    ///Export_Product_Data
    public function Export_Product_Data(Request $request){
        return Excel::download(new ExportProduct, 'products.xlsx');
    }

}

 
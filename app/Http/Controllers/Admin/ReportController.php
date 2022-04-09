<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function report_sale(){
        
        $total_invoice = DB::table('invoices')->sum('total_payment');
        $total_import= DB::table('import_details')->sum('cost_price');
        
        return view('backend.report.index_report_sale')
        ->with('total_invoice',$total_invoice)->with('total_import',$total_import);
    }
   
}
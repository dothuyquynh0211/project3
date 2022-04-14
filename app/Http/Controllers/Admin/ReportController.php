<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function report_sale(){
        
        $total_invoice = DB::table('invoices')->where('status_order',2)->whereDate('created_at','=','2022-03-25')->sum('total_payment');
        // $total_invoice = DB::table('invoices')->sum('total_payment');
        $total_import= DB::table('import_details')->sum('cost_price');
        // $invoice_sale_month = DB::table('invoices')->where('status_order',2)->get();
        $invoice_sale_month = DB::table('invoices')->where('status_order',2)->whereDate('created_at','=','2022-03-25')->get();
        return view('backend.report.index_report_sale')
        ->with('total_invoice',$total_invoice)->with('total_import',$total_import)
        ->with('invoice',$invoice_sale_month);
    }
   
}
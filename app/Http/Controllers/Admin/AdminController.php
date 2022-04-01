<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth.admins');
    }
    function index()
    {
        $new_order = DB::table('invoices')->where('status_order', 1)->get()->count();
        $product = DB::table('products')->get()->count();
        return view('backend.home')->with('new_order', $new_order)->with('product', $product);
    }
}

// SELECT products.*,(sum_import.quantity_import - sum_invoice.quantity_invoice ) as product_inventory , sum_invoice.quantity_invoice ,sum_import.quantity_import 
//FROM (SELECT sum(quantity) as quantity_invoice , id_product FROM `invoice_details` GROUP BY id_product) as sum_invoice
// JOIN( SELECT sum(quantity) AS quantity_import , id_product FROM `import_details` GROUP BY id_product) as sum_import On sum_invoice.id_product = sum_import.id_product 
// join products on sum_import.id_product = products.id
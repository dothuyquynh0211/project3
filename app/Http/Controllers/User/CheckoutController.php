<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;
use Yajra\DataTables\DataTables;

class CheckoutController extends Controller
{
    //
    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function save_invoice(Request $request)
    {
        // dd(Cart::content());
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:m:s');
        $status_order = 1;
        $payment_method = 1;
        $total_payment = Cart::total();
        $total_payment = (float)str_replace([',', '.00'], '', $total_payment);
        DB::beginTransaction();
        try {
            DB::table('invoices')->insert([
                'receiver' => $request->receiver,
                'phone' => $request->phone,
                'address' => $request->address,
                'total_payment' => $total_payment,
                'created_at' => $today,
                'status_order' => $status_order,
                'note' => $request->note,
                'payment_method' => $payment_method,
                'id_admin' => null,
                'id_user' => $request->id_user,
            ]);
            $invoices_id = DB::getPDO()->lastInsertId();
            $product_invoice = Cart::content();

            foreach ($product_invoice as $item) {
                if ($item->options->discount == 0) {
                    $item->options->discount = $item->price;
                }
                DB::table('invoice_details')->insert([
                    'id_product' => $item->id,
                    'coupons_code' => $item->options->coupons_code,
                    'quantity' => $item->qty,
                    'price' => $item->options->discount,
                    'id_invoice' => $invoices_id,
                ]);
                if ($item->options->coupons_code !== null) {
                    $quantity = DB::table('coupons')->where('coupons_code', $item->options->coupons_code)->value('coupons_number');


                    DB::table('coupons')->where('coupons_code', $item->options->coupons_code)->update(['coupons_number' => $quantity - 1]);
                }
            }
            DB::commit();
            Cart::destroy();
            Session::push('couponCheck', null);
            return redirect('/history')->with('message', 'You have order');
        } catch (Exception $e) {
            DB::rollBack();
            // echo '<pre>';
            // print_r($e->getMessage());
            // echo '</pre>';

            return redirect()->back()->with('message', 'Something went wrong');
        }
    }

    public function history()
    {
        $id_user = auth()->user()->id;
        $invoice  = DB::table('invoices')->where('id_user', $id_user)->orderBy('id', 'DESC')->get();
        return view('frontend.history')->with('invoice', $invoice);
    }

    public function history_detail($id)
    {
        $invoice_detail = DB::table('invoice_details')->where('id_invoice', $id)->get();
        return view('frontend.history_detail')->with('invoice', $invoice_detail);
    }

    public function invoice()
    {
        return view('backend.invoice.index_invoice');
    }

    public function getInvoice()
    {
        $invoice  = DB::table('invoices')->orderBy('id', 'DESC')->get();
        return Datatable::of($invoice)->make(true);
    }

    public function update_invoice($id, $status)
    {
        $id_admin = Auth::guard('admins')->user()->id;
        if ($id == 0) {
            $invoice  = DB::table('invoices')->orderBy('id', 'DESC')->get();

            echo view('backend.invoice.index_invoice_table')->with('invoice', $invoice);
        } else {
            try {
                DB::table('invoices')->where('id', $id)->update(['status_order' => $status, 'id_admin' => $id_admin]);

                $invoice  = DB::table('invoices')->orderBy('id', 'DESC')->get();
                echo view('backend.invoice.index_invoice_table')->with('invoice', $invoice);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function invoice_detail($id)
    {
        $invoice_detail = DB::table('invoice_details')
            ->join('products', 'products.id', '=', 'invoice_details.id_product')
            ->join('brands', 'brands.id', '=', 'products.id_brand')
            ->join('categories', 'categories.id', '=', 'products.id_category')
            ->join('sizes', 'sizes.id', '=', 'products.id_size')
            ->join('colors', 'colors.id', '=', 'products.id_color')
            ->where('invoice_details.id_invoice', $id)
            ->get(['invoice_details.quantity', 'invoice_details.coupons_code', 'products.*', 'brands.name as brand_name', 'colors.name as name_color', 'categories.name as category_name', 'sizes.name as size_name']);
        // echo '<pre>';
        // print_r($invoice_detail);
        // echo '</pre>';

        return view('backend.invoice.detail_invoice')->with('invoice', $invoice_detail);
    }
    public function cancel_order($id)
    {
        try {
            DB::table('invoices')->where('id', $id)->update(['status_order' => 0]);
            $invoice  = DB::table('invoices')->orderBy('id', 'DESC')->get();
            return redirect()->back();
            // return view('frontend.history')->with('invoice', $invoice);
        } catch (\Throwable $th) {
            echo "error";
        }
    }
}
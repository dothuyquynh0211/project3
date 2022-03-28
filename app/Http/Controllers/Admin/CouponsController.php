<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponsController extends Controller
{
    //
    public function indexCoupons()
    {
        $data = array(
            'list' => DB::table('coupons')->get()
        );
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        return view('backend.coupons.index_coupons', $data)->with('today', $today);
    }

    public function add()
    {
        return view('backend.coupons.add_coupons');
    }
    public function addCoupons(Request $request)
    {
        if ($request->input('status') == 'on') {
            $status = '1';
        } else {
            $status = '0';
        }
        DB::beginTransaction();
        try {
            DB::table('coupons')->insert([
                'name' => $request->input('name'),
                'value' => $request->input('value'),
                'coupons_code' => $request->input('coupons_code'),
                'coupons_number' => $request->input('coupons_number'),
                'coupons_condition' => $request->input('coupons_condition'),
                'status' => $status,
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
            ]);
            $coupons_id = DB::getPDO()->lastInsertId();
            foreach ($request->product_id as $p_id) {
                DB::table('product_coupons')->insert([
                    'id_product' => $p_id,
                    'id_coupons' => $coupons_id,
                ]);
            }
            DB::commit();
            return redirect('/admin/coupons')->with('message', 'Data have been successfully inserted');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message', 'Something went wrong');
        }

        // echo "<pre>";
        // print_r($coupons_id);
        // echo "</pre>";
    }

    public function editCoupons($id)
    {
        $row = DB::table('coupons')->where('id', $id)->first();
        $data = array(
            'info' => $row,
        );
        return view('backend.coupons.edit_coupons', $data);
    }

    public function updateCoupons(Request $request)
    {
        if ($request->input('status') == 'on') {
            $status = '1';
        } else {
            $status = '0';
        }
        $query = DB::table('coupons')->where('id', $request->input('id'))->update([
            'name' => $request->input('name'),
            'value' => $request->input('value'),
            'coupons_code' => $request->input('coupons_code'),
            'coupons_number' => $request->input('coupons_number'),
            'coupons_condition' => $request->input('coupons_condition'),
            'status' => $status,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);
        return redirect('/admin/coupons');
    }

    public function deleteCoupons($id)
    {
        $delete = DB::table('coupons')->where('id', $id)->delete();
        return redirect('/admin/coupons');
    }
    public function action(Request $request)
    {

        $value = $request->all()['value'];
        $filter_data = Product::select('*')->where('name', 'LIKE', '%' . $value . '%')
            //     // ->orWhere('sku', 'LIKE', '%' . $query . '%')
            ->get(5);
        echo json_encode($filter_data, JSON_UNESCAPED_UNICODE);
    }
    public function getProduct(Request $request)
    {

        $value = $request->all()['id'];
        $filter_data = Product::select('*')->where('id', '=', $value)
            //     // ->orWhere('sku', 'LIKE', '%' . $query . '%')
            ->get(1);
        echo json_encode($filter_data, JSON_UNESCAPED_UNICODE);
    }

    public function detailCoupons($id)
    {
        $product_coupons = DB::table('product_coupons')
            ->join('products', 'products.id', '=', 'product_coupons.id_product')
            ->where('product_coupons.id_coupons',$id)
            ->get();
        return view('backend.coupons.detail_coupons')->with('product', $product_coupons);
    }
    
}
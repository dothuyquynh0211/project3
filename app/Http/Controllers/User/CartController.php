<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function save_cart(Request $request)
    {

        $quantity = $request->qty;
        $productId = $request->productid_hidden;
        // dd($productId);
        $product_Inf = DB::table('products')->where('id', $productId)->first();
        $data['id'] = $product_Inf->id;
        $data['name'] = $product_Inf->name;
        $data['qty'] = $quantity;
        $data['price'] = $product_Inf->price;
        $data['weight'] = $product_Inf->price;
        $data['options']['image'] = $product_Inf->image;
        $data['options']['discount'] = 0;

        Cart::add($data);
        return redirect('/shop_cart');
    }
    public function shop_cart()
    {
        echo view('frontend.shop_cart');
    }

    public function shop_cart_content()
    {
        $brands = DB::table('brands')->get();
        $categories = DB::table('categories')->get();
        $cart = Cart::content();
        $coupon_list = [];
        foreach ($cart as $item) {
            $product_id = $item->id;
            $coupon = DB::table('coupons')->join('product_coupons', 'product_coupons.id_coupons', '=', 'coupons.id')
                ->join('products', 'product_coupons.id_product', '=', 'products.id')
                ->where('coupons.status', '=', 1)
                ->where('product_coupons.id_product', $product_id)
                ->select('coupons.coupons_code', 'coupons.coupons_condition', 'coupons.value', 'product_coupons.id_product', 'products.name as product_name', 'products.price')
                ->get();
            array_push($coupon_list, $coupon);
        }
        $cart = Cart::content();
        $total = 0;
        $discount_total = 0;
        foreach ($cart as $items) {
            if ($items->options->discount > 0) {
                $total += $items->options->discount * $items->qty;
                $discount_total += ($items->price * $items->qty) - $total;
            } else {
                $total += ($items->price * $items->qty);
            }
        }


        Session::put('total', $total);
        Session::put('discount_total', $discount_total);


        return view('frontend.shop_cart_content')->with('categories', $categories)->with('brands', $brands)->with('coupon', $coupon_list);
    }


    public function delete_cart(Request $request)
    {
        $rowId = $request->all()['rowId'];
        try {
            Cart::remove($rowId);
            echo $this->shop_cart_content();
        } catch (\Throwable $th) {
            echo "error";
        }
    }
    public function update_cart(Request $request)
    {
        $param = $request->all();
        try {
            Cart::update($param['rowId'], ['qty' => $param['qty']]);
            echo $this->shop_cart_content();
        } catch (\Throwable $th) {
            echo "error";
        }
    }



    public function check_coupons(Request $request)
    {
        $rowId = $this->getRowIdByProductId($request->productId);
        $image = Cart::get($rowId)->options->image;
        $coupons_code = $request->coupons_code;

        $couponCheck = Session::get('couponCheck');

        $checka = [
            'productId' => $request->productId,
            'couponCode' => $request->coupons_code
        ];
        $check = false;
        if (getType($couponCheck) == 'array') {
            for ($i = 0; $i < count($couponCheck); $i++) {
                if ($couponCheck[$i]['productId'] == $request->productId) {
                    $couponCheck[$i]['couponCode'] = $coupons_code;
                    $check = true;
                };
            };
        } else {
            $couponCheck = [];
        }

        if (!$check) {
            array_push($couponCheck, $checka);
        }

        Session::put('couponCheck', $couponCheck);


        // echo $image; 
        Cart::update($rowId, [
            'options' => [
                'image' => $image,
                'discount' => $request->discount,
                'coupons_code' => $request->coupons_code,
            ]
        ]);
        echo $this->shop_cart_content();
    }

    private function getRowIdByProductId($product_id)
    {
        $cart = Cart::content();
        foreach ($cart as $item) {
            if ($product_id == $item->id) {
                return $item->rowId;
            }
        }
    }
}
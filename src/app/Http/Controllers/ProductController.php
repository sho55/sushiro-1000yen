<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Result a listing items.
     *
     * @return \Illuminate\Http\Response
     */
    public function result(Request $request)
    {
        $store_type = $request['store_type'];
        $total_price = $total_kcal = 0;
        $arr_items = [];

        $total_max = 1000;

        $_total_price = 0;
        $arr_price = [];
        $arr_kcal = [];
        while($_total_price < $total_max){

            $res = DB::table('products')->where($store_type,'<', $total_max - $_total_price)->inRandomOrder()->first();
            $arr_res = (array)$res;

            if(array_key_exists($store_type,$arr_res)){   
                if (($arr_res[$store_type] + $_total_price) > $total_max ){
                    break;
                }
                // var_dump($arr_res[$store_type]);
                $_price = $arr_res[$store_type]; 
                $_kcal = $arr_res['kcal'] ?? 0;

                array_push($arr_items, $arr_res);
                array_push($arr_price, $_price);
                array_push($arr_kcal, $_kcal);
            }else{
                // var_dump('no data...');
            }
            $_total_price = $_total_price + $_price;  
        }

        $total_price = array_sum($arr_price);
        // var_dump('合計金額:'.$total_price);

        $total_kcal = array_sum($arr_kcal);
        // var_dump('トータルカロリー:'.$total_kcal);

        // var_dump($arr_items);

        return view('result',[
            'store_type' => $store_type,
            'total_price' => $total_price,
            'total_kcal' => $total_kcal,
            'arr_items' => $arr_items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

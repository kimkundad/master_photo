<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\delirank;
use Auth;

class ApiController extends Controller
{
    //
    public function shipping_data_2(Request $request){

      $id = $request['ship_id'];

      $get_item = DB::table('deliverops')
            ->where('deli_id', $id)
            ->get();
            $all_item = "<option value='' data-value=''> -- เลือกรูปแบบการจัดส่ง -- </option> </option>";
            if(isset($get_item)){
              foreach($get_item as $u){
                $all_item .= "<option value='".$u->deli_name."' data-value='$u->deli_price'>".$u->deli_name." ราคา ".$u->deli_price."</option>";
              }
            }


      $get_data = DB::table('deliveries')
            ->where('id', $id)
            ->first();


          $tag_html = "<p>".$get_data->de_detail."</p>
            <div class='form-group '>
              <label>เลือกรูปแบบการจัดส่ง ".$get_data->name."</label>
               <select class='form-control' onchange='run()' id='get_option12' name='van_shipping'>
                 $all_item
               </select>
             </div>";

      return response()->json([
      'data' => [
        'html' => $tag_html,
      ]
    ]);

    }


    public function shipping_data_3(Request $request){

      $id = $request['ship_id'];
      $price_pro = $request['price_pro'];

      // group id product $group_id Auth::user()->id
      $group_id = DB::table('cart_details')
          ->selectRaw('cart_details.*')
          ->where('user_id', 1)
          ->groupBy('product_id')
          ->get();

          $get_id_first = [];

          if(isset($group_id)){
          foreach($group_id as $u){

            $get_id_first[] = $u->product_id;

          }
        }



        $shipping_total = 0;

        $inventory = delirank::where('deli_main_id', $id)
            ->whereIn('product_id', $get_id_first)
            ->get();



      //  return $get_id_first;  12:52 1:150
        // 30

        $id_rank = [];

        foreach ($group_id as $u) {

          $inventory = delirank::where('deli_main_id', $id)
              ->where('product_id', $u->product_id)
              ->where('start_rank', '<=', $u->sum_image)
              ->where('end_rank', '>=', $u->sum_image)
              ->first();

              $id_rank[] = $inventory->id;
              //
        }

        $max_price = delirank::whereIn('id', $id_rank)
        ->max('total_price');

        $max_price_id = delirank::whereIn('id', $id_rank)
        ->where('total_price', $max_price)
        ->first();

        foreach ($group_id as $u) {

          $inventory = delirank::where('deli_main_id', $id)
              ->where('product_id', $u->product_id)
              ->where('start_rank', '<=', $u->sum_image)
              ->where('end_rank', '>=', $u->sum_image)
              ->first();

              if($max_price_id->id == $inventory->id){
                $shipping_total+= $inventory->total_price;
              }else{
                $shipping_total+= $inventory->total_price2;
              }

        }


    //   return $shipping_total;





      return response()->json([
      'data' => [
        'id' => $id,
        'price' => $shipping_total,
      ]
    ]);


    }






}

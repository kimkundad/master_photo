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

      $get_data = DB::table('deliveries')
            ->where('id', $id)
            ->first();

      $get_item = DB::table('deliverops')
            ->where('deli_id', $id)
            ->get();
            $all_item = "<option value='' data-value=''> -- เลือกรูปแบบการจัดส่ง -- </option> </option>";
            if(isset($get_item)){
              foreach($get_item as $u){
                $all_item .= "<option value='".$u->deli_name."' data-free='".$get_data->de_status."' data-value='$u->deli_price'>".$u->deli_name." ราคา ".$u->deli_price."</option>";
              }
            }

 //de_status




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


    public function result_payment(Request $request){



      //full response
      //  $response = file_get_contents('php://input');
      //	echo "Response:<br/><textarea style='width:100%;height:80px'>".$response."</textarea>";

      $version = $_REQUEST["version"];
    	$request_timestamp = $_REQUEST["request_timestamp"];
    	$merchant_id = $_REQUEST["merchant_id"];
    	$currency = $_REQUEST["currency"];
    	$order_id = $_REQUEST["order_id"];
    	$amount = $_REQUEST["amount"];
    	$invoice_no = $_REQUEST["invoice_no"];
    	$transaction_ref = $_REQUEST["transaction_ref"];
    	$approval_code = $_REQUEST["approval_code"];
    	$eci = $_REQUEST["eci"];
    	$transaction_datetime = $_REQUEST["transaction_datetime"];
    	$payment_channel = $_REQUEST["payment_channel"];
    	$payment_status = $_REQUEST["payment_status"];
    	$channel_response_code = $_REQUEST["channel_response_code"];
    	$channel_response_desc = $_REQUEST["channel_response_desc"];
    	$masked_pan = $_REQUEST["masked_pan"];
    	$stored_card_unique_id = $_REQUEST["stored_card_unique_id"];
    	$backend_invoice = $_REQUEST["backend_invoice"];
    	$paid_channel = $_REQUEST["paid_channel"];
    	$recurring_unique_id = $_REQUEST["recurring_unique_id"];
    	$paid_agent = $_REQUEST["paid_agent"];
    	$payment_scheme = $_REQUEST["payment_scheme"];
    	$user_defined_1 = $_REQUEST["user_defined_1"];
    	$user_defined_2 = $_REQUEST["user_defined_2"];
    	$user_defined_3 = $_REQUEST["user_defined_3"];
    	$user_defined_4 = $_REQUEST["user_defined_4"];
    	$user_defined_5 = $_REQUEST["user_defined_5"];
    	$browser_info = $_REQUEST["browser_info"];
    	$ippPeriod = $_REQUEST["ippPeriod"];
    	$ippInterestType = $_REQUEST["ippInterestType"];
    	$ippInterestRate = $_REQUEST["ippInterestRate"];
    	$ippMerchantAbsorbRate = $_REQUEST["ippMerchantAbsorbRate"];
    	$payment_scheme = $_REQUEST["payment_scheme"];
    	$process_by = $_REQUEST["process_by"];
    	$sub_merchant_list = $_REQUEST["sub_merchant_list"];
      	$hash_value = $_REQUEST["hash_value"];
      	echo "version: ".$version."<br/>";
      	echo "request_timestamp: ".$request_timestamp."<br/>";
      	echo "merchant_id: ".$merchant_id."<br/>";
      	echo "currency: ".$currency."<br/>";
      	echo "order_id: ".$order_id."<br/>";
      	echo "amount: ".$amount."<br/>";
      	echo "invoice_no: ".$invoice_no."<br/>";
      	echo "transaction_ref: ".$transaction_ref."<br/>";
      	echo "approval_code: ".$approval_code."<br/>";
      	echo "eci: ".$eci."<br/>";
      	echo "transaction_datetime: ".$transaction_datetime."<br/>";
      	echo "payment_channel: ".$payment_channel."<br/>";
      	echo "payment_status: ".$payment_status."<br/>";
      	echo "channel_response_code: ".$channel_response_code."<br/>";
      	echo "channel_response_desc: ".$channel_response_desc."<br/>";
      	echo "masked_pan: ".$masked_pan."<br/>";
      	echo "stored_card_unique_id: ".$stored_card_unique_id."<br/>";
      	echo "backend_invoice: ".$backend_invoice."<br/>";
      	echo "paid_channel: ".$paid_channel."<br/>";
      	echo "recurring_unique_id: ".$recurring_unique_id."<br/>";
    	echo "sub_merchant_list: " .$sub_merchant_list."<br/>";
      	echo "payment_scheme: ".$payment_scheme."<br/>";
      	echo "user_defined_1: ".$user_defined_1."<br/>";
      	echo "user_defined_2: ".$user_defined_2."<br/>";
      	echo "user_defined_3: ".$user_defined_3."<br/>";
      	echo "user_defined_4: ".$user_defined_4."<br/>";
      	echo "user_defined_5: ".$user_defined_5."<br/>";
      	echo "browser_info: ".$browser_info."<br/>";
        echo "ippPeriod: " .$ippPeriod."<br/>";
    	echo "ippInterestType: " .$ippInterestType."<br/>";
    	echo "ippInterestRate: " .$ippInterestRate."<br/>";
    	echo "ippMerchantAbsorbRate: " .$ippMerchantAbsorbRate."<br/>";
    	echo "payment_scheme: " .$payment_scheme."<br/>";
    	echo "process_by: " .$process_by."<br/>";
    	echo "sub_merchant_list: " .$sub_merchant_list."<br/>";
      	echo "hash_value: ".$hash_value."<br/>";

    	//check response hash value (for security, hash value validation is Mandatory)
    	$checkHashStr = $version . $request_timestamp . $merchant_id . $order_id .
    	$invoice_no . $currency . $amount . $transaction_ref . $approval_code .
    	$eci . $transaction_datetime . $payment_channel . $payment_status .
    	$channel_response_code . $channel_response_desc . $masked_pan .
    	$stored_card_unique_id . $backend_invoice . $paid_channel . $paid_agent .
    	$recurring_unique_id . $user_defined_1 . $user_defined_2 . $user_defined_3 .
    	$user_defined_4 . $user_defined_5 . $browser_info . $ippPeriod .
    	$ippInterestType . $ippInterestRate . $ippMerchantAbsorbRate . $payment_scheme .
    	$process_by . $sub_merchant_list;

    	$SECRETKEY = "QnmrnH6QE23N";
        $checkHash = hash_hmac('sha256',$checkHashStr, $SECRETKEY,false);
    	echo "checkHash: ".$checkHash."<br/><br/>";

    if(strcmp(strtolower($hash_value), strtolower($checkHash))==0){
    	echo "Hash check = success. it is safe to use this response data.";
    }
    else{
    	echo "Hash check = failed. do not use this response data.";
    }

    }


    public function shipping_data_3(Request $request){

      $id = $request['ship_id'];
      $price_pro = $request['price_pro'];

      // group id product $group_id Auth::user()->id
      $group_id = DB::table('cart_details')
          ->selectRaw('cart_details.*')
          ->where('user_id', Auth::user()->id)
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

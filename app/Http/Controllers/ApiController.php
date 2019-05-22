<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\delirank;
use Session;
use Cookie;
use App\cart_detail;
use App\cart_image;
use App\cart_option;
use App\user_payment;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManagerStatic as Image;
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

    public function upload_new_image(Request $request){


      $gallary = $request->file('file');

      if(Auth::guest()){
        $user_id = Session::get('cart');
      }else{
        $user_id = Auth::user()->id;
      }



        //////////////   check_Auth   //////////////////////////////////

        $exp = array();
        $size_photo = $request['size_photo'];
        $path1 = explode(",", $size_photo);
    //    dd($get_count_cart);

        $exp = array_merge($exp, $path1);


          $cat = DB::table('products')->select(
            'products.*'
            )
            ->where('products.id', $request['product_id'])
            ->first();

            $check_old_cart = 0;
            $set_link = 0;

              $get_price = DB::table('option_items')->select(
                'option_items.*'
                )
                ->whereIn('id', $exp)
                ->where('item_status', 1)
                ->sum('item_price');

                $check_first = DB::table('cart_details')
                  ->where('user_id', $user_id)
                  ->first();

                if($check_first != null){
                  //////////////   check_first    //////////////////////////////////


                  $check_second = DB::table('cart_details')
                    ->where('user_id', $user_id)
                    ->where('product_id', $request['product_id'])
                    ->where('option_check', $size_photo)
                    ->first();
                  //  sleep(5);
                    //////////////   check_second    ////////////////////////////////// ถ้า user เดียวกับ สินค้าเดียวกัน

                    if($check_second != null){
                        //////////////   check_second    ////////////////////////////////// ถ้ามีนะ เช็ค option ก่อน

                        $get_option = DB::table('cart_options')
                          ->where('cart_id_detail', $check_second->id)
                          ->get();

                          $check_option = [];

                          foreach($get_option as $ch){
                            $check_option[] = $ch->option_id;
                          }

                          if($exp == $check_option){

                            //////////////   check_second    ////////////////////////////////// ถ้ามันมีค่าเท่ากัน

                            $path = 'assets/image/all_image/';
                            $ext = $gallary->getClientOriginalExtension();
                            $pin = rand(1000000, 9999999);
                            $filename = time()."-test-".$pin.".".$ext;
                            $gallary->move(($path), $filename);

                            $obj = new cart_image();
                            $obj->cart_id_detail = $check_second->id;
                            $obj->cart_image = $filename;
                            $obj->cart_image_id = 1;
                            $obj->cart_image_sum = 1;
                            $obj->save();

                            $check_image = DB::table('cart_images')
                                  ->where('cart_id_detail', $check_second->id)
                                  ->count();

                                  DB::table('cart_details')
                                  ->where('id', $check_second->id)
                                  ->update(['sum_image' => $check_image]);


                          $response = array (
                                      'status'    => 'success',
                                      'file_link' => $check_second->id
                                    );

                          }else{
                            //////////////   check_second    ////////////////////////////////// ถ้ามันไม่ค่าเท่ากัน ให้ส่วน cart ใหม่เลย

                            $set_num_date = (\random_int(100, 999));

                            $obj = new cart_detail();
                            $obj->product_id = $request['product_id'];
                            $obj->user_id = $user_id;
                            $obj->product_name = $cat->pro_name;
                            $obj->option_check = $size_photo;
                            $obj->sum_image = 0;
                            $obj->sum_price = $get_price;
                            $obj->list_link = $set_num_date;
                            $obj->save();

                            $obj_id = $obj->id;

                            foreach($exp as $k){

                              $obj = new cart_option();
                              $obj->cart_id_detail = $obj_id;
                              $obj->option_id = $k;
                              $obj->save();

                            }

                            $path = 'assets/image/all_image/';
                            $ext = $gallary->getClientOriginalExtension();
                            $pin = rand(1000000, 9999999);
                            $filename = time()."-test-".$pin.".".$ext;
                            $gallary->move(($path), $filename);

                            $obj = new cart_image();
                            $obj->cart_id_detail = $obj_id;
                            $obj->cart_image = $filename;
                            $obj->cart_image_id = 1;
                            $obj->cart_image_sum = 1;
                            $obj->save();


                            $check_image = DB::table('cart_images')
                                  ->where('cart_id_detail', $obj_id)
                                  ->count();

                                  DB::table('cart_details')
                                  ->where('id', $obj_id)
                                  ->update(['sum_image' => $check_image]);


                          $response = array (
                                      'status'    => 'success',
                                      'file_link' =>  $obj_id
                                        );

                          }



                    }else{
                      //////////////   check_second    ////////////////////////////////// ถ้ามัน user เดียวกัน แต่คนละสินค้า

                      $set_num_date = (\random_int(100, 999));

                      $obj = new cart_detail();
                      $obj->product_id = $request['product_id'];
                      $obj->user_id = $user_id;
                      $obj->product_name = $cat->pro_name;
                      $obj->option_check = $size_photo;
                      $obj->sum_image = 0;
                      $obj->sum_price = $get_price;
                      $obj->list_link = $set_num_date;
                      $obj->save();

                      $obj_id = $obj->id;

                      foreach($exp as $k){

                        $obj = new cart_option();
                        $obj->cart_id_detail = $obj_id;
                        $obj->option_id = $k;
                        $obj->save();

                      }

                      $path = 'assets/image/all_image/';
                      $ext = $gallary->getClientOriginalExtension();
                      $pin = rand(1000000, 9999999);
                      $filename = time()."-test-".$pin.".".$ext;
                      $gallary->move(($path), $filename);

                      $obj = new cart_image();
                      $obj->cart_id_detail = $obj_id;
                      $obj->cart_image = $filename;
                      $obj->cart_image_id = 1;
                      $obj->cart_image_sum = 1;
                      $obj->save();


                      $check_image = DB::table('cart_images')
                            ->where('cart_id_detail', $obj_id)
                            ->count();

                            DB::table('cart_details')
                            ->where('id', $obj_id)
                            ->update(['sum_image' => $check_image]);

                    $response = array (
                                'status'    => 'success',
                                'file_link' => $obj_id
                                  );

                    }



                }else{

                  //////////////   check_first    //////////////////////////////////

                  $set_num_date = (\random_int(100, 999));

                  $obj = new cart_detail();
                  $obj->product_id = $request['product_id'];
                  $obj->user_id = $user_id;
                  $obj->product_name = $cat->pro_name;
                  $obj->option_check = $size_photo;
                  $obj->sum_image = 0;
                  $obj->sum_price = $get_price;
                  $obj->list_link = $set_num_date;
                  $obj->save();

                  $obj_id = $obj->id;

                  foreach($exp as $k){

                    $obj = new cart_option();
                    $obj->cart_id_detail = $obj_id;
                    $obj->option_id = $k;
                    $obj->save();

                  }

                  $path = 'assets/image/all_image/';
                  $ext = $gallary->getClientOriginalExtension();
                  $pin = rand(1000000, 9999999);
                  $filename = time()."-test-".$pin.".".$ext;
                  $gallary->move(($path), $filename);

                  $obj = new cart_image();
                  $obj->cart_id_detail = $obj_id;
                  $obj->cart_image = $filename;
                  $obj->cart_image_id = 1;
                  $obj->cart_image_sum = 1;
                  $obj->save();


                  $check_image = DB::table('cart_images')
                        ->where('cart_id_detail', $obj_id)
                        ->count();

                        DB::table('cart_details')
                        ->where('id', $obj_id)
                        ->update(['sum_image' => $check_image]);

                $response = array (
                            'status'    => 'success',
                            'file_link' => $obj_id
                              );
                }
















      echo json_encode($response);
      exit;



    }

    public function line_update(Request $request){

      DB::table('settings')
            ->where('id', 1)
            ->update(['line_noti' => $request['token_line']]);

      return redirect(url('admin/line_notify/'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }

    public function line_notify(){
      $objs = DB::table('settings')
          ->where('id', 1)
          ->first();

          $data['datahead'] = "Line Notify";
          $data['objs'] = $objs;
          return view('admin.line_notify.index', $data);
    }

    public function api_address(Request $request){
      $id = $request['add_id'];

      $get_data = DB::table('user_addresses')
            ->where('id', $id)
            ->first();

          //  dd($get_data->phone_ad);

            $tag_html = "<div class='col-md-6 col-sm-6'>
              <div class='form-group'>
                <label>เบอร์โทร</label>
                <input type='text' class='form-control' name='phone_ad' value='$get_data->phone_ad' readonly>
              </div>
            </div>";

            return response()->json([
            'data' => [
              'html' => $tag_html,
            ]
          ]);


    }


    public function result_payment(Request $request){



      $response = file_get_contents('php://input');
  	echo "Response:<br/><textarea style='width:100%;height:80px'>".$response."</textarea>";

  	//each response params:
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
    /*	echo "version: ".$version."<br/>";

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
    	echo "hash_value: ".$hash_value."<br/>"; */

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

  	$SECRETKEY = "dsbqppYP703G";
      $checkHash = hash_hmac('sha256',$checkHashStr, $SECRETKEY,false);
/*  	echo "checkHash: ".$checkHash."<br/><br/>";

  if(strcmp(strtolower($hash_value), strtolower($checkHash))==0){
  	echo "Hash check = success. it is safe to use this response data.";
  }
  else{
  	echo "Hash check = failed. do not use this response data.";
  } */

  $a = $order_id;
  $count_a = strlen($a);
  for($i=1;$i<=$count_a;$i++)
  {
      //echo $a[$i];
      if($a[$i] != '0'){
        break;
      }
  }


  $b = $amount;
  $count_b = strlen($b);
  for($j=1;$j<=$count_b;$j++)
  {
      //echo $a[$i];
      if($b[$j] != '0'){
        break;
      }
  }

  $new_oreder_id = substr($b, $j, 12);
  $count_var = strlen($new_oreder_id);
  $test_num2 = substr($new_oreder_id, -2);
  $test_num1 = substr($new_oreder_id, 0, $count_var-2);
  $amount2 = $test_num1.'.'.$test_num2;

  //echo $amount2;


  $order_id = substr($a, $i, 12);

  //echo $new_oreder_id;


      $time_tran = date_format(date_create($transaction_datetime),"d-m-Y");
      $time2_tran = date_format(date_create($transaction_datetime),"H:i:s");


      $order_data = DB::table('orders')
            ->where('id', $order_id)
            ->first();



      $package = new user_payment();
      $package->order_id = $order_data->code_gen;
      $package->pay_type = 2;
      $package->bank = 0;
      $package->money = $amount2;
      $package->time_tran = $time_tran;
      $package->time2_tran = $time2_tran;
      $package->payment_status = $payment_status;
      $package->save();

      if($payment_status == '000' || $payment_status == '001'){
        $code_status = 1;
      }else{
        $code_status = 0;
      }

      DB::table('orders')
            ->where('id', $order_id)
            ->update(['status' => $code_status]);

      return redirect(url('payment_notify_item2/'.$order_id))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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

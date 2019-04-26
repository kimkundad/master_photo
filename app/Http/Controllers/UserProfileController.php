<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Response;
use Session;
use Auth;
use App\User;
use App\delirank;
use App\order;
use App\order_detail;
use App\order_image;
use App\category;
use App\user_payment;
use App\user_address;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class UserProfileController extends Controller
{
    //


    public function post_edit_profile(Request $request){

      $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
      ]);

      $email = $request['email'];
      $id = $request['user_id'];

      $check_email = DB::table('users')
          ->select(
          'users.*'
          )
          ->where('id', '!=', $id)
          ->where('email', $email)
          ->count();

        //  dd($check_email);

      if($check_email > 0){

        return redirect(url('profile/'.$id.'/edit'))->with('error','Edit successful');

      }else{

        $package = User::find($id);
        $package->name = $request['name'];
        $package->email = $request['email'];
        $package->phone = $request['phone'];
        $package->id_card_no = $request['id_card_no'];
        $package->branch_code = $request['branch_code'];
        $package->save();

      return redirect(url('profile/'))->with('edit_success','Edit successful');

      }

    }


    public function check_toupic(Request $request){

      $set_size_option = $request['set_size_option'];
      $get_text = "";
      for ($i = 0; $i < sizeof($set_size_option); $i++) {

        if($i == 0){
          $get_text.= $set_size_option[$i];
        }else{
          $get_text.= ",".$set_size_option[$i];
        }
      }

      $get_data = DB::table('taopixes')
          ->where('arrays_data', $get_text)
          ->count();

          if($get_data > 0){

            $get_data_2 = DB::table('taopixes')
                ->where('arrays_data', $get_text)
                ->first();

            return response()->json([
      'data' => 'success',
      'set_data' => $get_text,
      'set_url' => $get_data_2->url_taopix,
    ]);

          }else{

            return response()->json([
      'data' => 'null',
      'set_data' => $get_text,
      'set_url' => 'null',
    ]);

          }



    }


    public function my_order(){

      $get_detail_o = [];

      $order = DB::table('orders')
            ->where('user_id', Auth::user()->id)
            ->get();

            foreach($order as $u){

              $order_de = DB::table('order_details')->select(
                    'order_details.*',
                    'order_details.id as id_de',
                    'order_details.created_at as created_ats',
                    'products.*'
                    )
                    ->leftjoin('products', 'products.id',  'order_details.product_id')
                    ->where('order_details.order_id', $u->id)
                    ->get();


                    foreach($order_de as $h){



                          $order_option = DB::table('order_options')
                            ->where('order_id_detail', $h->id_de)
                            ->where('option_id', '!=', 0)
                            ->get();

                            $order_option_count = DB::table('order_options')
                              ->where('order_id_detail', $h->id_de)
                              ->count();

                            foreach($order_option as $j){

                              $name_option = DB::table('option_items')
                                    ->where('id', $j->option_id)
                                    ->first();
                                $j->get_option = $name_option;
                            }


                            $h->get_all_option = $order_option;
                            $h->check = $order_option_count;

                    }
                  //  dd($order_de);

                    $get_detail_o[] = $order_de;

                    $u->option = $order_de;

            }

          //  dd($order);
            $data['order'] = $order;

      return view('my_order', $data);

    }



    public function pay_order_choose($id){

      $order_de = DB::table('order_details')
            ->where('id', $id)
            ->first();

          //  dd($order_de);

          $total = $order_de->sum_image*$order_de->sum_price;
        //  dd($total);

            $order_option = DB::table('order_options')->select(
                  'order_options.*',
                  'order_options.id as id_op',
                  'option_items.*'
                  )
                  ->leftjoin('option_items', 'option_items.id',  'order_options.option_id')
                  ->where('order_options.order_id_detail', $order_de->id)
                  ->get();
                  $order_de->order_option = $order_option;

      $get_main_id = $order_de->order_id;

    //  หาจำนวนทั้งหมดของ order นี้
    $order_count = DB::table('order_details')
          ->where('order_id', $get_main_id)
          ->count();

    // รายการทั้งหมดของ ออเดอร์นี้
    $order_all = DB::table('order_details')
          ->where('order_id', $get_main_id)
          ->get();

    // ข้อมูงของออเดอรืหลัก

    $order_main = DB::table('orders')->select(
          'orders.*',
          'orders.id as id_or',
          'deliveries.name as name_deli'
          )
          ->leftjoin('deliveries', 'deliveries.id',  'orders.deliver_order')
          ->where('orders.id', $get_main_id)
          ->first();



    /*  if($order_main->bill_address == 3){


        $inventory = delirank::where('deli_main_id', $order_main->deliver_order)
        ->where('product_id', $order_de->product_id)
        ->where('start_rank', '<=', $total)
        ->where('end_rank', '>=', $total)
        ->first();

          dd($inventory->total_price);


      } */

      $data['order_de'] = $order_de;
      $data['order_main'] = $order_main;
      $data['order_count'] = $order_count;
      $data['order_all'] = $order_all;
      return view('pay_order_choose', $data);
    }



    public function my_order_detail($id){




      $order_de = DB::table('order_details')->select(
            'order_details.*',
            'order_details.id as id_de',
            'order_details.created_at as created_ats',
            'products.*'
            )
            ->leftjoin('products', 'products.id',  'order_details.product_id')
            ->where('order_details.id', $id)
            ->first();


            $order_main = DB::table('orders')
                  ->where('id', $order_de->order_id)
                  ->first();
            $data['order_main'] = $order_main;


            $order_get = DB::table('orders')->select(
                  'orders.*'
                  )
                  ->where('id', $order_de->order_id)
                  ->first();

                  $data['objs'] = $order_get;


                  $check_bill = DB::table('user_addresses')->select(
                        'user_addresses.*'
                        )
                        ->where('user_id', $order_get->user_id)
                        ->where('type_address', 1)
                        ->count();


                        if($check_bill > 0){

                          $get_address_bill = DB::table('user_addresses')->select(
                                'user_addresses.*'
                                )
                                ->where('user_id', $order_get->user_id)
                                ->where('type_address', 1)
                                ->first();


                                $province_bill = DB::table('province')
                                     ->select(
                                     'province.*'
                                     )
                                     ->where('PROVINCE_ID', $get_address_bill->province)
                                     ->first();
                                 $data['province_bill'] = $province_bill;

                                 $district_bill = DB::table('amphur')
                                      ->select(
                                      'amphur.*'
                                      )
                                      ->where('AMPHUR_ID', $get_address_bill->district)
                                      ->first();
                                  $data['district_bill'] = $district_bill;


                                  $subdistricts_bill = DB::table('district')
                                       ->select(
                                       'district.*'
                                       )
                                       ->where('DISTRICT_ID', $get_address_bill->sub_district)
                                       ->first();
                                   $data['subdistricts_bill'] = $subdistricts_bill;



                        }else{
                          $get_address_bill = null;
                        }


                        $check_address = DB::table('user_addresses')->select(
                              'user_addresses.*'
                              )
                              ->where('id', $order_get->shipping_address)
                              ->count();


                              $get_address = DB::table('user_addresses')->select(
                                    'user_addresses.*'
                                    )
                                    ->where('id', $order_get->shipping_address)
                                    ->first();


                                    if($check_address > 0){


                                      $province = DB::table('province')
                                           ->select(
                                           'province.*'
                                           )
                                           ->where('PROVINCE_ID', $get_address->province)
                                           ->first();
                                       $data['province'] = $province;

                                       $district = DB::table('amphur')
                                            ->select(
                                            'amphur.*'
                                            )
                                            ->where('AMPHUR_ID', $get_address->district)
                                            ->first();
                                        $data['district'] = $district;


                                        $subdistricts = DB::table('district')
                                             ->select(
                                             'district.*'
                                             )
                                             ->where('DISTRICT_ID', $get_address->sub_district)
                                             ->first();
                                         $data['subdistricts'] = $subdistricts;

                                    }




              $order_option = DB::table('order_options')->select(
                    'order_options.*',
                    'order_options.id as id_op',
                    'option_items.*'
                    )
                    ->leftjoin('option_items', 'option_items.id',  'order_options.option_id')
                    ->where('order_options.order_id_detail', $order_de->id_de)
                    ->get();


                    $order_images = DB::table('order_images')->select(
                          'order_images.*',
                          'order_images.id as id_img'
                          )
                          ->where('order_id_detail', $order_de->id_de)
                          ->get();





                  //  $get_option = $order_option;
                    $order_de->order_option = $order_option;
                    $order_de->order_images = $order_images;


            $data['get_address_bill'] = $get_address_bill;
            $data['order_de'] = $order_de;
            $data['get_address'] = $get_address;
      return view('my_order_detail', $data);

    }



    public function payment_notify(){

      $objs = DB::table('payment_options')
        ->get();

    $data['bank'] = $objs;


      return view('payment_notify', $data);
    }


    public function payment_notify_id($id){

      $get_data_price = 0;
      $check_order = DB::table('orders')
            ->where('code_gen', $id)
            ->count();

      if($check_order > 0){

        $get_data = DB::table('orders')
              ->where('code_gen', $id)
              ->first();
              $get_data_price = $get_data->order_price+$get_data->shipping_p;
      }else{

        $get_data = DB::table('order_details')
              ->where('code_gen_d', $id)
              ->first();

              $get_data_price = $get_data->sum_image*$get_data->sum_price;

      }

      $objs = DB::table('payment_options')
        ->get();
        $data['get_data_price'] = $get_data_price;
        $data['bank'] = $objs;
        $data['id'] = $id;

      return view('payment_notify_id', $data);
    }


    public function post_payment_notify(Request $request){
      $image = $request->file('image');
      $this->validate($request, [
            'image' => 'required|max:8048',
            'name' => 'required',
            'order_id' => 'required',
            'email' => 'required',
            'bank' => 'required',
            'money' => 'required',
            'filter_date' => 'required',
            'image' => 'required'
      ]);


     $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

     $destinationPath = asset('assets/image/slip/');
     $img = Image::make($image->getRealPath());
     $img->resize(800, 533, function ($constraint) {
     $constraint->aspectRatio();
     })->save('assets/image/slip/'.$input['imagename']);

      $package = new user_payment();
      $package->order_id = $request['order_id'];
      $package->name = $request['name'];
      $package->email = $request['email'];
      $package->bank = $request['bank'];
      $package->money = $request['money'];
      $package->time_tran = $request['filter_date'];
      $package->image_tran = $input['imagename'];
      $package->save();

      return redirect(url('payment_notify_success/'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }


    public function payment_notify_success(){

      return view('payment_notify_success');
    }



    public function post_edit_address_book(Request $request){

      $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province' => 'required',
            'amphur' => 'required',
            'district' => 'required',
            'postcode' => 'required'
      ]);

      $request['type_ad'] = 0;

      $id = $request['address_id'];

      $package = user_address::find($id);
      $package->name_ad = $request['name'];
      $package->phone_ad = $request['phone'];
      $package->address_ad = $request['address'];
      $package->province = $request['province'];
      $package->district = $request['amphur'];
      $package->id_card_no = $request['id_card_no'];
      $package->branch_code = $request['branch_code'];
      $package->sub_district = $request['district'];
      $package->zip_code = $request['postcode'];
      $package->type_address = $request['type_ad'];
      $package->save();

      if($request['type_ad'] == 3){
        DB::table('user_addresses')
        ->where('user_id', Auth::user()->id)
        ->where('id', '!=', $id)
        ->update(array('type_address' => 2));
      }elseif($request['type_ad'] == 1){



        DB::table('user_addresses')
        ->where('user_id', Auth::user()->id)
        ->where('id', '!=', $id)
        ->where('type_address', 3)
        ->update(array('type_address' => 0));


      }elseif($request['type_ad'] == 0){


      /*  DB::table('user_addresses')
        ->where('user_id', Auth::user()->id)
        ->where('id', '!=', $id)
        ->where('type_address', 3)
        ->update(array('type_address' => 2)); */

      }else{

      }




      return redirect(url('address_book/'))->with('edit_address','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    public function delete_address_book(Request $request){

      $id = $request['address_id'];

    //  dd($user_id);

      $obj = user_address::find($id);
      $obj->delete();

      return redirect(url('address_book'))->with('delete','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }


    public function post_new_address_book(Request $request){


      $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province' => 'required',
            'amphur' => 'required',
            'district' => 'required',
            'postcode' => 'required'
      ]);

      $request['type_ad'] = 0;

      $user_id = Auth::user()->id;

      $package = new user_address();
      $package->name_ad = $request['name'];
      $package->user_id = Auth::user()->id;
      $package->phone_ad = $request['phone'];
      $package->address_ad = $request['address'];
      $package->province = $request['province'];
      $package->district = $request['amphur'];

      $package->sub_district = $request['district'];
      $package->zip_code = $request['postcode'];
      $package->type_address = $request['type_ad'];
      $package->save();
      return redirect(url('address_book/'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }




    public function new_address_book(){

      return view('new_address_book');
    }






    public function address_book(){

      $address = DB::table('user_addresses')
          ->select(
          'user_addresses.*'
          )
          ->where('user_id', Auth::user()->id)
          ->get();

      $data['address'] = $address;

      return view('address_book', $data);


    }





    public function edit_address_book($id){


      $package = user_address::find($id);

      $objs = DB::table('users')
          ->select(
          'users.*'
          )
          ->where('id', $package->user_id)
          ->first();


         $province = DB::table('province')
              ->select(
              'province.*'
              )
              ->where('PROVINCE_ID', $package->province)
              ->first();
          $data['province'] = $province;


          $district = DB::table('amphur')
               ->select(
               'amphur.*'
               )
               ->where('AMPHUR_ID', $package->district)
               ->first();
           $data['district'] = $district;


           $subdistricts = DB::table('district')
                ->select(
                'district.*'
                )
                ->where('DISTRICT_ID', $package->sub_district)
                ->first();
            $data['subdistricts'] = $subdistricts;



      $data['package'] = $package;
      $data['objs'] = $objs;


      return view('edit_address_book', $data);



    }




}

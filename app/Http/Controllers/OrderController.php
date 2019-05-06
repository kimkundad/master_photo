<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\order;
use App\order_detail;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
use Carbon\Carbon;
use Illuminate\Http\Response;
use File;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('orders')->select(
              'orders.*',
              'orders.created_at as created_ats',
              'orders.id as id_or',
              'users.id as id_pro',
              'users.name',
              'users.phone'
              )
              ->leftjoin('users', 'users.id',  'orders.user_id')
              ->orderBy('orders.id', 'desc')
              ->paginate(15);

              $data['objs'] = $cat;
              $data['datahead'] = "order สั่งสินค้า";
              return view('admin.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function api_order_status(Request $request){

     $user = order::findOrFail($request->user_id);

               if($user->order_status == 1){
                   $user->order_status = 0;
               } else {
                   $user->order_status = 1;
               }


       return response()->json([
       'data' => [
         'success' => $user->save(),
       ]
     ]);

     }


     public function search_order(Request $request){

       $start = $request['start'];
       $end = $request['end'];
       if($end == null){
         $end = $start;
       }
       $status = $request['status'];

       $dateS = new Carbon($start);
       $dateE = new Carbon($end);

       //dd($dateS);

       if($status != 100){

         $cat = DB::table('orders')->select(
           'orders.*',
           'orders.created_at as created_ats',
           'orders.id as id_or',
           'users.id as id_pro',
           'users.name',
           'users.phone'
           )
               ->leftjoin('users', 'users.id',  'orders.user_id')
               ->whereBetween('orders.created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])
               ->where('orders.status', $status)
               ->orderBy('orders.id', 'desc')
               ->paginate(15);

       }else{

         $cat = DB::table('orders')->select(
           'orders.*',
           'orders.created_at as created_ats',
           'orders.id as id_or',
           'users.id as id_pro',
           'users.name',
           'users.phone'
           )
               ->leftjoin('users', 'users.id',  'orders.user_id')
               ->whereBetween('orders.created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])
               ->orderBy('orders.id', 'desc')
               ->paginate(15);

       }



             $data['start'] = $start;
             $data['end'] = $end;
             $data['status'] = $status;

             $data['objs'] = $cat;
             $data['datahead'] = "order สั่งสินค้า";
             return view('admin.order.search', $data);

     }



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

    public function order_print($id){

      $obj = DB::table('orders')->select(
            'orders.*',
            'orders.id as id_or',
            'users.id as id_pro',
            'users.name',
            'users.email',
            'users.phone',
            'deliveries.name as name_deli'
            )
            ->leftjoin('users', 'users.id',  'orders.user_id')
            ->leftjoin('deliveries', 'deliveries.id',  'orders.deliver_order')
            ->where('orders.id', $id)
            ->first();

            $data['obj'] = $obj;


            $check_address = DB::table('user_addresses')->select(
                  'user_addresses.*'
                  )
                  ->where('id', $obj->shipping_address)
                  ->count();


            $get_address = DB::table('user_addresses')->select(
                  'user_addresses.*'
                  )
                  ->where('id', $obj->shipping_address)
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


                  $order_detail = DB::table('order_details')->select(
                        'order_details.*',
                        'order_details.id as id_de',
                        'products.*'
                        )
                        ->leftjoin('products', 'products.id',  'order_details.product_id')
                        ->where('order_details.order_id', $id)
                        ->get();

                        $get_option = [];

                        foreach($order_detail as $j){

                          $order_option = DB::table('order_options')->select(
                                'order_options.*',
                                'order_options.id as id_op',
                                'option_items.*'
                                )
                                ->leftjoin('option_items', 'option_items.id',  'order_options.option_id')
                                ->where('order_options.order_id_detail', $j->id_de)
                                ->get();


                                $order_images = DB::table('order_images')->select(
                                      'order_images.*',
                                      'order_images.id as id_img'
                                      )
                                      ->where('order_id_detail', $j->id_de)
                                      ->get();





                              //  $get_option = $order_option;
                                $j->order_option = $order_option;
                                $j->order_images = $order_images;

                        }

                        $data['order_detail'] = $order_detail;

      $data['get_address'] = $get_address;

      $data['datahead'] = "order สั่งสินค้า";
      return view('admin.order.print', $data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $obj = DB::table('orders')->select(
              'orders.*',
              'orders.id as id_or',
              'users.id as id_pro',
              'users.name',
              'users.email',
              'users.phone',
              'deliveries.name as name_deli'
              )
              ->leftjoin('users', 'users.id',  'orders.user_id')
              ->leftjoin('deliveries', 'deliveries.id',  'orders.deliver_order')
              ->where('orders.id', $id)
              ->first();


              //ถ้ามีการขอใบกำกับภาษี
              if($obj->bil_req == 1){

                if($obj->address_shipping_bill != 0){

                  $get_address_bill = DB::table('user_addresses')->select(
                        'user_addresses.*'
                        )
                        ->where('user_id', $obj->user_id)
                        ->where('id', $obj->address_shipping_bill)
                        ->first();

                }else{
                  

                  $get_address_bill = DB::table('user_addresses')->select(
                        'user_addresses.*'
                        )
                        ->where('user_id', $obj->user_id)
                        ->where('type_address', 1)
                        ->first();

                }




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
//check_bill

              $check_bill = DB::table('user_addresses')->select(
                    'user_addresses.*'
                    )
                    ->where('user_id', $obj->user_id)
                    ->where('type_address', 1)
                    ->count();




                    $data['get_address_bill'] = $get_address_bill;
// end check_bill

              $check_address = DB::table('user_addresses')->select(
                    'user_addresses.*'
                    )
                    ->where('id', $obj->shipping_address)
                    ->count();


              $get_address = DB::table('user_addresses')->select(
                    'user_addresses.*'
                    )
                    ->where('id', $obj->shipping_address)
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









      $order_detail = DB::table('order_details')->select(
            'order_details.*',
            'order_details.id as id_de',
            'products.*'
            )
            ->leftjoin('products', 'products.id',  'order_details.product_id')
            ->where('order_details.order_id', $id)
            ->get();

            $get_option = [];

            foreach($order_detail as $j){

              $order_option = DB::table('order_options')->select(
                    'order_options.*',
                    'order_options.id as id_op',
                    'option_items.*'
                    )
                    ->leftjoin('option_items', 'option_items.id',  'order_options.option_id')
                    ->where('order_options.order_id_detail', $j->id_de)
                    ->get();


                    $order_images = DB::table('order_images')->select(
                          'order_images.*',
                          'order_images.id as id_img'
                          )
                          ->where('order_id_detail', $j->id_de)
                          ->get();





                  //  $get_option = $order_option;
                    $j->order_option = $order_option;
                    $j->order_images = $order_images;

            }

            $data['order_detail'] = $order_detail;


        //    dd($order_detail);

          /*  foreach($order_detail as $u){

              $order_option = DB::table('option_items')->select(
                    'option_items.*',
                    'option_items.id as id_op'
                    )
                    ->where('id', $u->size_photo)
                    ->first();

                    $u->order_option = $order_option;


                    $order_option2 = DB::table('option_items')->select(
                          'option_items.*',
                          'option_items.id as id_op'
                          )
                          ->where('id', $u->image_radio)
                          ->first();
                          $u->order_option2 = $order_option2;

              $order_image = DB::table('order_images')->select(
                    'order_images.*',
                    'order_images.id as id_img'
                    )
                    ->where('order_id_detail', $u->id)
                    ->get();
                  $u->image_option = $order_image;
                //  dd($order_optio
            }*/
          //  dd($order_detail);

      $data['datahead'] = "ข้อมูล Order";
      $data['get_address'] = $get_address;
      $data['objs'] = $obj;
      $data['url'] = url('admin/order/'.$id);
      $data['method'] = "put";

    //  dd($order_detail);
      return view('admin.order.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
           'option_type' => 'required'
       ]);

       $package = order::find($id);
        $package->status = $request['option_type'];
        $package->note_admin = $request['note_admin'];
        $package->save();

      return redirect(url('admin/order/'.$id.'/edit'))->with('edit_success','แก้ไขหมวดหมู่ ');


    }

    public function load_img($id){

      $zipper = new \Chumper\Zipper\Zipper;
      setlocale(LC_ALL, 'th_TH');

      $order = DB::table('orders')
            ->where('id', $id)
            ->first();

            DB::table('order_options')->where('option_id', 0)->delete();

            $order_de = DB::table('order_details')->select(
                  'order_details.*',
                  'order_details.id as id_de',
                  'products.*'
                  )
                  ->leftjoin('products', 'products.id',  'order_details.product_id')
                  ->where('order_details.order_id', $order->id)
                  ->get();

                //  dd($order_de);

                  $name_op = [];
                  $name_op1 = [];


                  $maon_f = 'order_'.$order->code_gen;
                  @mkdir(public_path('zip/'.$maon_f), 0777, true);

                  foreach($order_de as $u){

                    $order_option_count = DB::table('order_options')->select(
                          'order_options.*',
                          'order_options.id as id_op',
                          'option_items.*'
                          )
                          ->leftjoin('option_items', 'option_items.id',  'order_options.option_id')
                          ->where('order_options.order_id_detail', $u->id_de)
                          ->count();

                          $order_option = DB::table('order_options')->select(
                                'order_options.*',
                                'order_options.id as id_op',
                                'option_items.*'
                                )
                                ->leftjoin('option_items', 'option_items.id',  'order_options.option_id')
                                ->where('order_options.order_id_detail', $u->id_de)
                                ->get();

                                for($i = 0; $i < $order_option_count; $i++){

                                  $name_op[] = $order_option[$i]->item_name;
                                  $name_op1=implode(',',$name_op);

                                //  $name_op1.="".serialize($name_op);
                                }


                                $order_images = DB::table('order_images')->select(
                                      'order_images.*'
                                      )
                                      ->where('order_id_detail', $u->id_de)
                                      ->get();


                                      $order_images_count = DB::table('order_images')->select(
                                            'order_images.*'
                                            )
                                            ->where('order_id_detail', $u->id_de)
                                            ->count();

                            @mkdir(public_path('zip/'.$maon_f.'/'.$u->product_name), 0777, true);

                            @mkdir(public_path('zip/'.$maon_f.'/'.$u->product_name.'/'.$name_op1), 0777, true);



                            foreach($order_images as $k){
                              @mkdir(public_path('zip/'.$maon_f.'/'.$u->product_name.'/'.$name_op1.'/X'.$k->order_image_sum), 0777, true);
                              copy(public_path('assets/image/all_image/'.$k->order_image), public_path('zip/'.$maon_f.'/'.$u->product_name.'/'.$name_op1.'/X'.$k->order_image_sum.'/'.$k->order_image));
                            }

                            $name_op = array();
                            $name_op1 = array();
                  }

                  $maon_l = public_path('zip/order_'.$order->code_gen.'/');
                  $zipper->make(public_path('zip/order_'.$order->code_gen.'.zip'))->folder($order->code_gen)->add($maon_l)->close();





            return response()->download(public_path('zip/order_'.$order->code_gen.'.zip'));




    }


    public function load_img2($id){

      $order_code = DB::table('order_details')->select(
            'order_details.*',
            'order_details.id as id_de',
            'products.*'
            )
            ->leftjoin('products', 'products.id',  'order_details.product_id')
            ->where('order_details.id', $id)
            ->first();


            $order_option_count = DB::table('order_options')->select(
                  'order_options.*',
                  'order_options.id as id_op',
                  'option_items.*'
                  )
                  ->leftjoin('option_items', 'option_items.id',  'order_options.option_id')
                  ->where('order_options.order_id_detail', $id)
                  ->count();


            $order_option = DB::table('order_options')->select(
                  'order_options.*',
                  'order_options.id as id_op',
                  'option_items.*'
                  )
                  ->leftjoin('option_items', 'option_items.id',  'order_options.option_id')
                  ->where('order_options.order_id_detail', $id)
                  ->get();


                //  dd($order_option_count);
                  $name_op = [];
                  $name_op1 = [];
                //  dd($order_option[0]->item_name);

                for($i = 0; $i < $order_option_count; $i++){
                  $name_op[] = $order_option[$i]->item_name;
                  $name_op1=implode(',',$name_op);

                //  $name_op1.="".serialize($name_op);
                }

                //dd($name_op1);


      $zipper = new \Chumper\Zipper\Zipper;
      $order_images = DB::table('order_images')->select(
            'order_images.*'
            )
            ->where('order_id_detail', $id)
            ->get();


            $order_images_count = DB::table('order_images')->select(
                  'order_images.*'
                  )
                  ->where('order_id_detail', $id)
                  ->count();

                //  dd($order_images_count);

            $save_data = [];

            $a = 1;
            setlocale(LC_ALL, 'th_TH');

            $maon_f = 'order_'.$order_code->code_gen_d;


            @mkdir(public_path($maon_f), 0777, true);





          //  @mkdir(public_path("$order_code->pro_name,$name_op1 x $order_code->sum_image"), 0777, true);
          //  copy(public_path('assets/image/4765.jpg'), public_path("$order_code->pro_name,$name_op1 x $order_code->sum_image/4765.jpg"));
          //  $files = 'public/files/';





          //  return response()->download(public_path('order_'.$order_code->code_gen_d.'.zip'));
          //  dd($a);

            foreach($order_images as $u){
              //  $save_data[] = public_path('assets/image/all_image/'.$u->order_image);
            //    @mkdir("$a.'.'.$order_code->pro_name.','.$name_op1.',x'.$order_code->sum_image",0777);

            @mkdir(public_path($maon_f.'/ID'.$u->id.','.$order_code->pro_name.','.$name_op1.','.$u->order_image_sum), 0777, true);
            copy(public_path('assets/image/all_image/'.$u->order_image), public_path($maon_f.'/ID'.$u->id.','.$order_code->pro_name.','.$name_op1.','.$u->order_image_sum.'/'.$u->order_image));
          //  $var=fopen($maon_f.'/'.$order_code->pro_name,$name_op1,$u->order_image_sum."/note.txt","wb");
          //  fwrite($var, "$order_code->pro_name , $name_op1 จำนวน $u->order_image_sum");

                $a++;
              }

            //  dd($a);


            $maon_l = public_path('order_'.$order_code->code_gen_d.'/');
            $zipper->make(public_path('order_'.$order_code->code_gen_d.'.zip'))->folder($order_code->code_gen_d)->add($maon_l)->close();




    /*  $zipper->make(public_path('order_'.$order_code->code_gen_d.'.zip'))->folder($order_code->code_gen_d)->add(
        $save_data);
      $zipper->close(); */

      return response()->download(public_path('order_'.$order_code->code_gen_d.'.zip'));
    //  File::delete(public_path('order_'.$order_code->code_gen_d.'.zip'));
    //  $filepath = public_path('assets/image/all_image/').$order_images->order_image;
    //  return Response::download($filepath);

    //  return response()->download(public_path('assets/image/all_image/').$order_images->order_image);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $objs = DB::table('orders')
            ->select(
               'orders.*'
               )
            ->where('id', $id)
            ->first();

            $order_detail = DB::table('order_details')->select(
                  'order_details.*'
                  )
                  ->where('order_id', $id)
                  ->get();

                  foreach($order_detail as $u){

                    $objs_img = DB::table('order_images')
                      ->select(
                         'order_images.*'
                         )
                      ->where('order_id_detail', $u->id)
                      ->get();


                      foreach($objs_img as $j){

                        $file_path = 'assets/image/all_image/'.$j->order_image;
                        unlink($file_path);

                      }

                      DB::table('order_images')
                      ->where('order_id_detail', $u->id)
                      ->delete();

                      //$u->option[] = $objs_img;

                  }


                  DB::table('order_details')
                  ->where('order_id', $id)
                  ->delete();


                  DB::table('orders')
                  ->where('id', $id)
                  ->delete();

                  return redirect(url('admin/order/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');

                //  dd($order_detail);


    }


















}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Response;
use Session;
use Auth;
use App\delirank;
use App\User;
use App\user_address;
use App\order;
use App\order_option;
use App\order_detail;
use App\order_image;
use App\category;
use App\delivery;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
use Carbon\Carbon;
use App\cart_detail;
use App\cart_image;
use App\cart_option;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    // session()->forget('cart');
  //   session()->flush();
  //  $request->session()->pull('cart.data2.data.image.image', '1534488467-logo-Isuzu.png');
  //  session()->push('cart.data1.data.image', ['image' => '1534488467-logo-Isuzu.jpg', 'id' => 6]);
  //  $image = Session::get('cart.'.$ids.'.data.image.'.$num.'.image');

  //    session()->pull('cart.data2.data.image.image', '1534489077-logo-major.png');

      if(Session::get('cart') == null){
        $set_num_date = (\random_int(1000000, 9999999));
        Session::put(['cart' => $set_num_date]);
      }else{

      }


      $arrivals = DB::table('products')->select(
        'products.*',
        'products.id as id_p',
        'sub_categories.*'
        )
        ->where('products.pro_status_show', 2)
        ->leftjoin('sub_categories', 'sub_categories.id',  'products.pro_category')
        ->limit(3)
        ->get();


        $arrivals_t_l = DB::table('products')->select(
          'products.*',
          'products.id as id_p',
          'sub_categories.*'
          )
          ->where('products.pro_status_show', 6)
          ->leftjoin('sub_categories', 'sub_categories.id',  'products.pro_category')
          ->first();

        //  dd($arrivals_t_l);

          $arrivals_t_r = DB::table('products')->select(
            'products.*',
            'products.id as id_p',
            'sub_categories.*'
            )
            ->where('products.pro_status_show', 7)
            ->leftjoin('sub_categories', 'sub_categories.id',  'products.pro_category')
            ->first();


            $data['arrivals_t_l'] = $arrivals_t_l;
            $data['arrivals_t_r'] = $arrivals_t_r;


        $hot = DB::table('products')->select(
          'products.*',
          'products.id as id_p',
          'sub_categories.*'
          )
          ->where('products.pro_status_show', 3)
          ->leftjoin('sub_categories', 'sub_categories.id',  'products.pro_category')
          ->limit(8)
          ->get();


          $slide = DB::table('slide_shows')->select(
                'slide_shows.*'
                )
                ->where('slide_status', 1)
                ->get();

            $data['slide'] = $slide;


          $hot_new = DB::table('products')->select(
            'products.*',
            'products.id as id_p',
            'sub_categories.*'
            )
            ->where('products.pro_status_show', 4)
            ->leftjoin('sub_categories', 'sub_categories.id',  'products.pro_category')
            ->limit(4)
            ->get();






            /////////////////////////////////////////////////////////////

        /*    $check_count = DB::table('cart_details')->select(
              'cart_details.*'
              )
              ->where('product_id', $request['product_id'])
              ->where('user_id', Auth::user()->id)
              ->count();

          if($check_count > 0){


            $get_ids = DB::table('cart_details')->select(
              'cart_details.*'
              )
              ->where('product_id', $request['product_id'])
              ->where('user_id', Auth::user()->id)
              ->first(); */

            //////////////////////////////////////////////////////////////


            if(Auth::guest()){

            }else{

            //  $set_num_date = count(Session::get('cart'));


              if(Session::get('cart') != null){


                $check_cart = DB::table('cart_details')
                      ->where('user_id', Session::get('cart'))
                      ->get();

                      foreach($check_cart as $u){

                              $get_data_de = DB::table('cart_details')
                                    ->where('user_id', Auth::user()->id)
                                    ->where('product_id', $u->product_id)
                                    ->where('option_check', $u->option_check)
                                    ->first();

                                    if($get_data_de != null){

                                      //dd($get_data_de);


                                      DB::table('cart_images')
                                      ->where('cart_id_detail', $u->id)
                                      ->update(['cart_id_detail' => $get_data_de->id]);

                                      DB::table('cart_details')
                                      ->where('id', $get_data_de->id)
                                      ->update(['sum_image' => $u->sum_image+$get_data_de->sum_image]);

                                      DB::table('cart_options')
                                      ->where('cart_id_detail', $u->id)
                                      ->delete();

                                      DB::table('cart_details')
                                      ->where('id', $u->id)
                                      ->delete();



                                    }else{

                                      DB::table('cart_details')
                                          ->where('id', $u->id)
                                          ->where('user_id', Session::get('cart'))
                                          ->update(['user_id' => Auth::user()->id]);

                                    }


                      }








                session()->forget('cart');
              }

            }


          //  dd($arrivals_t_l);


        $data['arrivals'] = $arrivals;
        $data['hot'] = $hot;
        $data['hot_new'] = $hot_new;

        return view('welcome', $data);
    }



    public function new_arrivals(){


      $arrivals = DB::table('products')->select(
        'products.*'
        )
        ->where('pro_status_show', 2)
        ->get();

        $data['arrivals'] = $arrivals;


        return view('new_arrivals', $data);

    }

    public function what_hot(){

      $arrivals = DB::table('products')->select(
        'products.*'
        )
        ->where('pro_status_show', 3)
        ->get();

        $data['arrivals'] = $arrivals;


        return view('what_hot', $data);

    }

    public function what_new(){

      $arrivals = DB::table('products')->select(
        'products.*'
        )
        ->where('pro_status_show', 4)
        ->get();

        $data['arrivals'] = $arrivals;


        return view('what_new', $data);

    }

    public function about(){
      return view('about');
    }

    public function product_price(){
      return view('product_price');
    }

    public function product_price_2(){
      return view('product_price_2');
    }

    public function options_derivatives(){
      return view('options_derivatives');
    }

    public function kerry_express(){
      return view('kerry_express');
    }



    public function ems_thai(){
      return view('ems_thai');
    }
    public function delivery(){
      return view('delivery');
    }
    public function contact_master(){
      return view('contact_master');
    }
    public function payment_option(){
      return view('payment_option');
    }
    public function terms_conditions(){
      return view('terms_conditions');
    }

    public function product_1(){
      return view('product_1');
    }


    public function product_get($id, $theme_id){

    //  dd($theme_id);

      $get_product = DB::table('products')->select(
        'products.*'
        )
        ->where('id', $id)
        ->first();

        $option_count = DB::table('product_items')->select(
            'product_items.*'
            )
            ->where('product_set_id', $id)
            ->count();


        $option_product = DB::table('product_items')->select(
            'product_items.*'
            )
            ->where('product_set_id', $id)
            ->get();

            foreach ($option_product as $objd) {

        $options = DB::table('option_products')
            ->where('id', $objd->option_set_id)
            ->first();




          $option_data_item = DB::table('option_items')->select(
              'option_items.*'
              )
              ->where('item_option_id', $options->id)
              ->get();

              $options->opt = $option_data_item;



          $objd->options_detail = $options;


      }

        $img_all = DB::table('galleries')->select(
          'galleries.*'
          )
          ->where('pro_id', $id)
          ->get();

        //  dd($option_count);
        $data['option_product'] = $option_product;
        $data['option_count'] = $option_count;
        $data['img_all'] = $img_all;

        $a = 1;
        $data['a'] = $a;

        $b_set = 2;
        $data['b_set'] = $b_set;

        $s = 1;
        $data['s'] = $s;

        $k = 1;
        $data['k'] = $k;

        $j = 1;
        $data['j'] = $j;

        $h = 1;
        $data['h'] = $h;

        $data['product'] = $get_product;
        $data['get_theme_id'] = $theme_id;
        $data['get_product_id'] = $id;
      return view('product_1', $data);
    }


    public function themes_pro($id){

      $get_product = DB::table('products')->select(
        'products.*'
        )
        ->where('id', $id)
        ->first();

        if($get_product == null){
          abort(404);
        }

        $sub_categories = DB::table('sub_categories')->select(
          'sub_categories.*'
          )
          ->where('id', $get_product->pro_category)
          ->first();

      $product = DB::table('themepros')->select(
        'themepros.*'
        )
        ->where('pro_id', $id)
        ->paginate(16);

        $data['sub_categories'] = $sub_categories;
        $data['product'] = $product;
        $data['product_id'] = $id;
        $data['get_product'] = $get_product;

      //  dd($product);

      return view('themes', $data);
    }

    public function category($id){



      $sub_categories = DB::table('sub_categories')->select(
        'sub_categories.*'
        )
        ->where('id', $id)
        ->first();


        $cat_head = DB::table('sub_categories')->select(
          'sub_categories.*'
          )
          ->where('sub_category', $sub_categories->sub_category)
          ->get();
        //  dd($cat_head);

          $get_product_ar = [];

          foreach($cat_head as $b){

            $get_product = DB::table('products')->select(
              'products.*'
              )
              ->where('pro_category', $b->id)
              ->where('pro_status', 1)
              ->paginate(12);

            //  $get_product_ar[] = $get_product;
              $b->option = $get_product;

          }

        //  dd($cat_head);

      $product = DB::table('products')->select(
        'products.*'
        )
        ->where('pro_category', $id)
        ->where('pro_status', 1)
        ->paginate(16);

        $data['cat_head'] = $cat_head;
        $data['p_id'] = $id;
        $data['product'] = $product;
        $data['sub_categories'] = $sub_categories;

      return view('category', $data);
    }



    public function payment($id){

      $bank = DB::table('payment_options')->get();

      $order = DB::table('orders')->select(
             'orders.*'
             )
             ->where('id', $id)
             ->first();


      $data['bank'] = $bank;
      $data['order'] = $order;
      return view('payment', $data);
    }


      public function shipping(){



      $delivery = delivery::all();
      $data['delivery'] = $delivery;



      //dd();

    //  $set_num_date = count(Session::get('cart'));



      if(Auth::guest()){

        Session::put('cart_redirect', 1);
        return redirect('/login');

      }else{


      //  dd($set_num_date);


      $check_count_cart_f = DB::table('cart_details')->select(
            'cart_details.*'
            )
            ->where('user_id', Auth::user()->id)
            ->count();

      if($check_count_cart_f == 0){
        return redirect('/');
      }


      if(Session::get('cart') != null){

        foreach(Session::get('cart') as $u){


          $check_count = DB::table('cart_details')->select(
                'cart_details.*'
                )
                ->where('product_id', $u['data']['id'])
                ->where('user_id', Auth::user()->id)
                ->count();

                $get_ids = DB::table('cart_details')
                        ->where('product_id', $u['data']['id'])
                        ->where('user_id', Auth::user()->id)
                        ->first();


                        if($check_count > 0){

                          ////////////////////   check option   //////////////////////////

                          $get_option = DB::table('cart_options')
                            ->where('cart_id_detail', $get_ids->id)
                            ->get();

                            $check_option = [];

                            foreach($get_option as $ch){
                              $check_option[] = $ch->option_id;
                            }

                            if($u['data'][0]['size_photo'] == $check_option){




                                $get_deatial = DB::table('cart_details')->select(
                                  'cart_details.*'
                                  )
                                ->where('id', $get_ids->id)
                                ->first();

                                $sum_img = $u['data'][2]['sum_image'];

                                $v4 = $get_deatial->sum_image + $sum_img;



                                $obj = cart_detail::find($get_ids->id);
                                $obj->sum_image = $v4;
                                $obj->save();

                                $obj_id = $get_ids->id;

                              //dd('มีข้อมูลซ้ำนะ');

                            }else{

                              $obj = new cart_detail();
                              $obj->product_id = $u['data']['id'];
                              $obj->user_id = Auth::user()->id;
                              $obj->product_name = $u['data']['pro_name'];
                              $obj->sum_image = $u['data'][2]['sum_image'];
                              $obj->sum_price = $u['data'][3]['sum_price'];
                              $obj->list_link = $u['data']['list_link'];
                              $obj->save();

                              $obj_id = $obj->id;


                              foreach($u['data'][0]['size_photo'] as $k){

                                $obj = new cart_option();
                                $obj->cart_id_detail = $obj_id;
                                $obj->option_id = $k;
                                $obj->save();

                               //  echo ($j['image']);
                              }

                            //  dd('ไม่มีข้อมูลซ้ำนะ');
                            }

                            foreach($u['data']['image'] as $j){

                            $obj = new cart_image();
                            $obj->cart_id_detail = $obj_id;
                            $obj->cart_image = $j['image'];
                            $obj->cart_image_id = $j['id'];
                            $obj->cart_image_sum = $j['num'];
                            $obj->save();

                          }






                        }else{

                          $obj = new cart_detail();
                        $obj->product_id = $u['data']['id'];
                        $obj->user_id = Auth::user()->id;
                        $obj->product_name = $u['data']['pro_name'];
                        $obj->sum_image = $u['data'][2]['sum_image'];
                        $obj->sum_price = $u['data'][3]['sum_price'];
                        $obj->list_link = $u['data']['list_link'];
                        $obj->save();

                        $obj_id = $obj->id;


                        foreach($u['data'][0]['size_photo'] as $k){

                          $obj = new cart_option();
                          $obj->cart_id_detail = $obj_id;
                          $obj->option_id = $k;
                          $obj->save();

                         //  echo ($j['image']);
                        }

                        foreach($u['data']['image'] as $j){

                          $obj = new cart_image();
                          $obj->cart_id_detail = $obj_id;
                          $obj->cart_image = $j['image'];
                          $obj->cart_image_id = $j['id'];
                          $obj->cart_image_sum = $j['num'];
                          $obj->save();

                        }

                      //  dd('ไม่มีข้อมูลใน cart online');



                        }


/*

          if($check_count == 0){

          $cat = DB::table('products')->select(
            'products.*'
            )
            ->where('products.id', $u['data']['id'])
            ->first();

          $obj = new cart_detail();
          $obj->product_id = $u['data']['list_link'];
          $obj->user_id = Auth::user()->id;
          $obj->product_name = $u['data']['pro_name'];
          $obj->sum_image = $u['data'][2]['sum_image'];
          $obj->sum_price = $u['data'][3]['sum_price'];
          $obj->list_link = $u['data']['list_link'];
          $obj->save();

          $obj_id = $obj->id;


          foreach($u['data'][0]['size_photo'] as $k){

            $obj = new cart_option();
            $obj->cart_id_detail = $obj_id;
            $obj->option_id = $k;
            $obj->save();

           //  echo ($j['image']);
          }


        }else{

          $get_ids = DB::table('cart_details')->select(
            'cart_details.*'
            )
            ->where('product_id', $u['data']['id'])
            ->where('user_id', Auth::user()->id)
            ->first();


            $get_deatial = DB::table('cart_details')->select(
              'cart_details.*'
              )
            ->where('id', $get_ids->id)
            ->first();

            $sum_img = $u['data'][2]['sum_image'];

            $v4 = $get_deatial->sum_image + $sum_img;



            $obj = cart_detail::find($get_ids->id);
            $obj->sum_image = $v4;
            $obj->save();

            $obj_id = $get_ids->id;

        }

        foreach($u['data']['image'] as $j){

          $obj = new cart_image();
          $obj->cart_id_detail = $obj_id;
          $obj->cart_image = $j['image'];
          $obj->cart_image_id = $j['id'];
          $obj->cart_image_sum = $j['num'];
          $obj->save();

        }









*/








        }
        session()->forget('cart');
      }




        $count_data = DB::table('cart_details')->select(
            'cart_details.*'
            )
            ->where('user_id', Auth::user()->id)
            ->count();

        $group_id = DB::table('cart_details')
            ->selectRaw('*, sum(sum_image) as sum')
            ->where('user_id', Auth::user()->id)
            ->groupBy('product_id')
            ->get();



          //  dd($group_id);

        $get_data = DB::table('cart_details')->select(
            'cart_details.*'
            )
            ->where('user_id', Auth::user()->id)
            ->get();

            $get_id_first = [];

            if($count_data > 0){
            foreach($get_data as $u){

              $get_id_first[] = $u->product_id;

            }
          }



              $get_max_ship = DB::table('products')->select(
                  'products.*'
                  )
                  ->whereIn('id', $get_id_first)
                  ->orderBy('a_price_o', 'desc')
                  ->first();



                  $get_data_max_price = DB::table('cart_details')->select(
                      'cart_details.*'
                      )
                      ->where('user_id', Auth::user()->id)
                      ->where('product_id', $get_max_ship->id)
                      ->orderBy('sum_image', 'desc')
                      ->first();

                    //  dd($get_data_max_price->id);


            $get_all_price = []; // หาค่าขนส่ง มาเก็บไว้ใน array
          //  $pack_buy = []; // คิดราคาแบบ pack
            $get_id_pro = [];
            $get_test = [];
            $get_test2 = [];
            $get_sum_ship = 0;
            $get_sum_ship2 = 0;

            foreach($get_data as $k){

              // หาค่าขนส่ง มาเก็บไว้ใน array
              $get_pro = DB::table('products')->select(
                  'products.*'
                  )
                  ->where('id', $k->product_id)
                  ->first();

                  $get_id_pro[] = $get_pro->id;
                //  $total_image += $k->sum_image;

            }





            $get_pro_max = DB::table('products')->select(
                'products.*'
                )
                ->whereIn('id', $get_id_pro)
                ->orderBy('a_price_o', 'desc')->value('id');



                foreach($group_id as $h){
                  $get_pro = DB::table('products')->select(
                      'products.*'
                      )
                      ->where('id', $h->product_id)
                      ->first();

                      $pack_buy = floor($h->sum_image / $get_pro->set_limit); //ปัดเศษทิ้ง

                      $piece_buy = $h->sum_image % $get_pro->set_limit;//หารแบบเอาเศษ


                      if($get_data_max_price->id == $h->id){

                        $get_sum_ship += $pack_buy*$get_pro->a_price_o;
                        $get_sum_ship2 += $pack_buy*$get_pro->a2_price_o;

                        if($piece_buy != 0){
                          $get_sum_ship += $get_pro->a_price_o;
                          $get_sum_ship2 += $get_pro->a2_price_o;
                        }

                      }else{

                        $get_sum_ship += $pack_buy*$get_pro->b_price_o;
                        $get_sum_ship2 += $pack_buy*$get_pro->b2_price_o;
                        if($piece_buy != 0){
                          $get_sum_ship += $get_pro->b_price_o;
                          $get_sum_ship2 += $get_pro->b2_price_o;
                          $h->shipping_price += $get_pro->b_price_o;
                        }

                      }

                }

              //  dd($get_sum_ship);



            //dd($get_pro_max); ค่าไอดีที่มากสุดสุด

            foreach($get_data as $h){

              $h->shipping_price = 0;
              $h->shipping_price2 = 0;

              $get_pro = DB::table('products')->select(
                  'products.*'
                  )
                  ->where('id', $h->product_id)
                  ->first();

                  $pack_buy = floor($h->sum_image / $get_pro->set_limit); //ปัดเศษทิ้ง
                //  $total_pack_buy_price = $pack_buy * $get_pro->a_price_o;//คิดราคาแบบ pack
              //    $get_test2[] = floor($h->sum_image / $get_pro->set_limit); //ปัดเศษทิ้ง

                  $piece_buy = $h->sum_image % $get_pro->set_limit;//หารแบบเอาเศษ

              //    $get_test[] = $h->sum_image % $get_pro->set_limit;//หารแบบเอาเศษ

                $h->shipping_price2 += $pack_buy*$get_pro->a_price_o;

                if($piece_buy != 0){
                  $h->shipping_price2 += $get_pro->a_price_o;
                }


                  //เช็คราคา เอาตัวมากที่สุด คิดราคาแรก
                  if($get_data_max_price->id == $h->id){

                //  $get_sum_ship += $pack_buy*$get_pro->a_price_o;
                  $h->shipping_price += $pack_buy*$get_pro->a_price_o;
                  // คิดว่ามีส่วนที่เหลือไหม ถ้ามีให้ + ราคาเข้าไป 1
                    if($piece_buy != 0){
                    //  $get_sum_ship += $get_pro->a_price_o;
                      $h->shipping_price += $get_pro->a_price_o;
                    }
                  // คิดว่ามีส่วนที่เหลือไหม
                  }else{

                  //  $get_sum_ship += $pack_buy*$get_pro->b_price_o;
                    $h->shipping_price += $pack_buy*$get_pro->b_price_o;
                    // คิดว่ามีส่วนที่เหลือไหม ถ้ามีให้ + ราคาเข้าไป 1
                      if($piece_buy != 0){
                    //    $get_sum_ship += $get_pro->b_price_o;
                        $h->shipping_price += $get_pro->b_price_o;
                      }

                  }


                  $package = cart_detail::find($h->id);
                  $package->shipping_price = $h->shipping_price;
                  $package->shipping_price_2 = $h->shipping_price2;
                  $package->save();




                //  $piece_price = $piece_buy * $product_xx_price;// ราคาของส่วนที่เหลือจากแพ็ก
            }

          //  dd($get_data);
          //  dd(max($get_all_price)); // ค่ามากที่สุดใน array สินค้าทั้งหมด

        $data['get_sum_ship'] = $get_sum_ship;
        $data['get_sum_ship2'] = $get_sum_ship2;
        $data['count_data2'] = $count_data;
        $data['get_data2'] = $get_data;

      }



      //Auth::user()->

      $user_addresses = DB::table('user_addresses')->select(
             'user_addresses.*'
             )
             ->where('user_id', Auth::user()->id)
             ->count();

      if($user_addresses > 0){

/*



        $package_check_add_3 = DB::table('user_addresses')
            ->where('user_id', Auth::user()->id)
            ->where('type_address', 3)
            ->count();



            if($package_check_add_3 > 0){

              $check_address = 3;



              $package = DB::table('user_addresses')
                  ->where('user_id', Auth::user()->id)
                  ->where('type_address', 3)
                  ->first();


            }else{



              $package_check_add_0 = DB::table('user_addresses')
                  ->where('user_id', Auth::user()->id)
                  ->where('type_address', 0)
                  ->count();

              if($package_check_add_0 > 0){

                $check_address = 1;

                $package = DB::table('user_addresses')
                    ->where('user_id', Auth::user()->id)
                    ->where('type_address', 0)
                    ->first();

                    $package_check_1 = DB::table('user_addresses')
                        ->where('user_id', Auth::user()->id)
                        ->where('type_address', 1)
                        ->count();

                        if($package_check_1 == 0){

                          $check_address = 3;

                        }else{


                          $package_1 = DB::table('user_addresses')
                              ->where('user_id', Auth::user()->id)
                              ->where('type_address', 1)
                              ->first();


                                 $province = DB::table('province')
                                      ->select(
                                      'province.*'
                                      )
                                      ->where('PROVINCE_ID', $package->province)
                                      ->first();
                                  $data['province1'] = $province;


                                  $district = DB::table('amphur')
                                       ->select(
                                       'amphur.*'
                                       )
                                       ->where('AMPHUR_ID', $package->district)
                                       ->first();
                                   $data['district1'] = $district;


                                   $subdistricts = DB::table('district')
                                        ->select(
                                        'district.*'
                                        )
                                        ->where('DISTRICT_ID', $package->sub_district)
                                        ->first();
                                    $data['subdistricts1'] = $subdistricts;

                                $data['package_1'] = $package_1;

                        }



              }else{

                $check_address = 2;

                $package = DB::table('user_addresses')
                    ->where('user_id', Auth::user()->id)
                    ->where('type_address', 1)
                    ->first();


                    $package_0 = DB::table('user_addresses')
                        ->where('user_id', Auth::user()->id)
                        ->where('type_address', 0)
                        ->count();
                   if($package_0 == 0){
                     $check_address = 3;
                   }

              }



            }






        if($package != null){


          //  dd(get address);
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
          //  //  dd(get address);
          $data['address_id'] = $package->id;

        }else{
          $check_address = 10;
        }


        $get_my_add_count = DB::table('user_addresses')
            ->where('user_id', Auth::user()->id)
            ->where('type_address', 1)
            ->count();

        if($get_my_add_count > 0){


          $get_my_add = DB::table('user_addresses')
              ->where('user_id', Auth::user()->id)
              ->where('type_address', 1)
              ->get();

              foreach($get_my_add as $add){

                //  dd(get address);
                   $provincez = DB::table('province')
                        ->select(
                        'province.*'
                        )
                        ->where('PROVINCE_ID', $add->province)
                        ->first();
                    $add->provincez = $provincez->PROVINCE_NAME;

                    $districtz = DB::table('amphur')
                         ->select(
                         'amphur.*'
                         )
                         ->where('AMPHUR_ID', $add->district)
                         ->first();
                     $add->districtz = $districtz->AMPHUR_NAME;


                     $subdistrictsz = DB::table('district')
                          ->select(
                          'district.*'
                          )
                          ->where('DISTRICT_ID', $add->sub_district)
                          ->first();
                      $add->subdistrictsz = $subdistrictsz->DISTRICT_NAME;
                //  //  dd(get address);

              }



          $data['get_my_add'] = $get_my_add;



        }else{
          $data['get_my_add'] = null;
        }




        $get_my_add_3 = DB::table('user_addresses')
            ->where('user_id', Auth::user()->id)
            ->get();

            foreach($get_my_add_3 as $add){


                 $provincez = DB::table('province')
                      ->select(
                      'province.*'
                      )
                      ->where('PROVINCE_ID', $add->province)
                      ->first();
                  $add->provincez = $provincez->PROVINCE_NAME;

                  $districtz = DB::table('amphur')
                       ->select(
                       'amphur.*'
                       )
                       ->where('AMPHUR_ID', $add->district)
                       ->first();
                   $add->districtz = $districtz->AMPHUR_NAME;


                   $subdistrictsz = DB::table('district')
                        ->select(
                        'district.*'
                        )
                        ->where('DISTRICT_ID', $add->sub_district)
                        ->first();
                    $add->subdistrictsz = $subdistrictsz->DISTRICT_NAME;


            }



*/



$get_my_add = DB::table('user_addresses')
    ->where('user_id', Auth::user()->id)
    ->get();

    foreach($get_my_add as $add){

      //  dd(get address);
         $provincez = DB::table('province')
              ->select(
              'province.*'
              )
              ->where('PROVINCE_ID', $add->province)
              ->first();
          $add->provincez = $provincez->PROVINCE_NAME;

          $districtz = DB::table('amphur')
               ->select(
               'amphur.*'
               )
               ->where('AMPHUR_ID', $add->district)
               ->first();
           $add->districtz = $districtz->AMPHUR_NAME;


           $subdistrictsz = DB::table('district')
                ->select(
                'district.*'
                )
                ->where('DISTRICT_ID', $add->sub_district)
                ->first();
            $add->subdistrictsz = $subdistrictsz->DISTRICT_NAME;
      //  //  dd(get address);

    }

  //  dd($check_address);

$data['get_my_add'] = $get_my_add;



      $data['get_my_add_3'] = $get_my_add;

      $data['get_my_add_count'] = $user_addresses;

      $deliveries = DB::table('deliveries')
            ->get();

            $deli_set = DB::table('deliveries')
                  ->where('id', 12)
                  ->first();

        $data['deli'] = $deliveries;
        $data['deli_set'] = $deli_set;
        $data['package'] = $package;



        $bsk = DB::table('deliverops')
              ->where('deli_id', 13)
              ->get();
        $data['bsk'] = $bsk;

        $van = DB::table('deliverops')
              ->where('deli_id', 8)
              ->get();
        $data['van'] = $van;

        $train = DB::table('deliverops')
              ->where('deli_id', 9)
              ->get();
        $data['train'] = $train;


    //    $data['check_address'] = $check_address;
    $data['check_address'] = 5;

        return view('shipping_2', $data);

      }else{

        $check_address = 0;
        $data['check_address'] = $check_address;
        $data['package'] = null;
        return view('shipping_new', $data);
      }



    }


    public function del_cart(Request $request){

      $ids = $request['ids'];

        $image = DB::table('cart_images')
              ->where('cart_id_detail', $ids)
              ->get();

        if($image != null){

          foreach ($image as $k) {

          $file_path = 'assets/image/all_image/'.$k->cart_image;
          unlink($file_path);
          DB::table('cart_images')->where('id', $k->id)->delete();
        }

        }

        DB::table('cart_options')
              ->where('cart_id_detail', $ids)
              ->delete();

              DB::table('cart_details')
                    ->where('id', $ids)
                    ->delete();



      return redirect('/cart');
    }



   public function add_address_order(Request $request){

     $this->validate($request, [
           'name_ad' => 'required',
           'phone_ad' => 'required',
           'address' => 'required',
           'province' => 'required',
           'amphur' => 'required',
           'district' => 'required',
           'postcode' => 'required'
     ]);
     $check_address = $request['check_address'];
     $user_id = Auth::user()->id;


     $delivery = delivery::all();
     $data['delivery'] = $delivery;
     $data['check_address'] = 3;


     $count_data = DB::table('cart_details')->select(
         'cart_details.*'
         )
         ->where('user_id', Auth::user()->id)
         ->count();

     $get_data = DB::table('cart_details')->select(
         'cart_details.*'
         )
         ->where('user_id', Auth::user()->id)
         ->get();

     $data['count_data2'] = $count_data;
     $data['get_data2'] = $get_data;


     $get_my_add_count = DB::table('user_addresses')
         ->where('user_id', Auth::user()->id)
         ->where('type_address', 1)
         ->count();

         $data['get_my_add_count'] = $get_my_add_count;

     if($check_address == 0){


       $user_addresses = DB::table('user_addresses')->select(
              'user_addresses.*'
              )
              ->where('user_id', Auth::user()->id)
              ->count();

          if($user_addresses > 0){

            $package = DB::table('user_addresses')
                ->select(
                'user_addresses.*'
                )
                ->where('user_id', Auth::user()->id)
                ->where('type_address', 3)
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

            return redirect(url('shipping'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

          }else{

            $package = new user_address();
            $package->name_ad = $request['name_ad'];
            $package->user_id = Auth::user()->id;
            $package->phone_ad = $request['phone_ad'];
            $package->address_ad = $request['address'];
            $package->province = $request['province'];
            $package->district = $request['amphur'];

            $package->sub_district = $request['district'];
            $package->zip_code = $request['postcode'];
            $package->type_address = 3;
            $package->save();


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
            $data['check_address'] = 3;
        //    return view('shipping_2', $data);

            return redirect(url('shipping'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

          }




     }else{

     }

  /* $package = new user_address();
     $package->name_ad = $request['name'];
     $package->user_id = Auth::user()->id;
     $package->phone_ad = $request['phone'];
     $package->address_ad = $request['address'];
     $package->province = $request['province'];
     $package->district = $request['amphur'];

     $package->sub_district = $request['district'];
     $package->zip_code = $request['postcode'];
     $package->type_address = $request['type_ad'];
     $package->save(); */

    //

   }



    public function add_order(Request $request){
    //    dd(Session::get('cart'));
        $c1 =$request['c1'];
        // ยอมรับเงื่อนไข

        $type_ship = $request['type_ship'];
        $text_re_user = $request['text_re_user'];

        if($type_ship == 1 || $type_ship == 3){

          $this->validate($request, [
               'address_shipping_order' => 'required',
               'address_type_order' => 'required',
               'deliver_order' => 'required',
               'total' => 'required',
               'get_sum_ship' => 'required',
               'order_price' => 'required',
               'deliver_order' => 'required',
               'c1' => 'required'
           ]);

        }else{

          $this->validate($request, [
               'address_shipping_order' => 'required',
               'address_type_order' => 'required',
               'deliver_order' => 'required',
               'total' => 'required',
               'get_sum_ship' => 'required',
               'order_price' => 'required',
               'deliver_order' => 'required',
               'van_shipping' => 'required',
               'c1' => 'required'
           ]);

        }

        if($text_re_user == 3){

          if($request['name'] == null || $request['phone'] == null || $request['address'] == null || $request['province'] == null){
            return redirect(url('shipping'))->with('null_data_bill','เพิ่ม เสร็จเรียบร้อยแล้ว');
          }

        }


      //   return $request->all();

//dd($c1);

         $id_address_u = $request['address_shipping_order'];

         //เลือกที่จัดส่งใบกำกับภาษี
         $id_card_no = $request['id_card_no'];
         $branch_code = $request['branch_code'];

         $check_order = $request['check_order'];
         //ขอใบกำกับภาษี



         if($request['check_order'] == null){
           $check_order = 0;
         }
         if($check_order == 1 && $request['id_card_no'] != null){

           $user = user_address::find($id_address_u);
           $user->id_card_no = $request['id_card_no'];
           $user->branch_code = $request['branch_code'];
           $user->save();

         } // ถ้าขอใบกำกับภาษี จะเพิ่มไปยังที่อยู่ของ user


         if($text_re_user == 3){
           //เลือกที่จัดส่งใบกำกับภาษี แบบกำหนดเอง
           $user_id = Auth::user()->id;

           $package = new user_address();
           $package->name_ad = $request['name'];
           $package->user_id = Auth::user()->id;
           $package->phone_ad = $request['phone'];
           $package->address_ad = $request['address'];
           $package->province = $request['province'];
           $package->district = $request['amphur'];
           $package->id_card_no = $request['id_card_no'];
           $package->branch_code = $request['branch_code'];
           $package->sub_district = $request['district'];
           $package->zip_code = $request['postcode'];
           $package->type_address = 1;
           $package->save();
           $address_shipping_bill = $package->id;
         }else{
           $address_shipping_bill = 0;
         }



         $get_order_zero = DB::table('orders')
           ->orderBy('id', 'desc')
           ->count();

           $get_order_last = DB::table('orders')
             ->orderBy('id', 'desc')
             ->first();

           if($get_order_zero == 0){

             $new_gen_code = '00000000-0-0000';

           }else{

             $get_order_last = DB::table('orders')
               ->orderBy('id', 'desc')
               ->first();
               $new_gen_code = $get_order_last->code_gen;
           }






      //  $name_user = $request['firstname_order']; 2019-04-30 08:38:34
      // $randomSixDigitInt = date("d").''.date("m").''.date("Y").'-'.Auth::user()->id.'-'.$get_count_or;
      // $date = date_create($get_order_last->created_at);

       $get_count_or = DB::table('orders')
         ->whereDate('created_at', Carbon::today())
         ->count();

        $get_count_or+=1;
        $get_last_number = str_pad($get_count_or,3,"0",STR_PAD_LEFT);






          $rs = explode('-',$new_gen_code);
          $var_sum = str_pad($rs[2]+1,4,"0",STR_PAD_LEFT);

          if($var_sum < 10000){
            $test = 'ไม่เกิน';
          }else{
            $var_sum = str_pad(1,4,"0",STR_PAD_LEFT);
            $test = 'เกินเกิน';
          }
        //  dd($var_sum);
       //dd(str_pad($get_count_or,3,"0",STR_PAD_LEFT));

       $randomSixDigitInt = date("d").''.date("m").''.date("Y").'-'.Auth::user()->id.'-'.$var_sum;

       //dd($randomSixDigitInt);

       $package = new order();
       $package->user_id = Auth::user()->id;
       $package->code_gen = $randomSixDigitInt;
       $package->shipping_address = $request['address_shipping_order'];
       $package->address_shipping_bill =$address_shipping_bill;
       $package->bill_address = $type_ship;
       $package->type_order_check = $request['address_type_order'];
       $package->bil_req = $check_order;
       $package->text_re_user = $text_re_user;
       $package->deliver_order = $request['deliver_order'];
       $package->shipping_t2 = $request['van_shipping'];
       $package->note = $request['message_order'];
       $package->order_price = $request['order_price'];
       $package->shipping_p = $request['get_sum_ship'];
       $package->total = $request['total'];
       $package->discount = $request['discount'];
       $package->save();

       $the_id = $package->id;


       if(Auth::guest()){



       }else{



         $count_data = DB::table('cart_details')->select(
             'cart_details.*'
             )
             ->where('user_id', Auth::user()->id)
             ->count();

         $get_data = DB::table('cart_details')->select(
             'cart_details.*'
             )
             ->where('user_id', Auth::user()->id)
             ->get();

             foreach($get_data as $k){


               if($type_ship == 3){
                 $total = $k->sum_image;
                 $inventory = delirank::where('deli_main_id', $package->deliver_order)
                 ->where('product_id', $k->product_id)
                 ->where('start_rank', '<=', $total)
                 ->where('end_rank', '>=', $total)
                 ->first();

                 if($inventory == null){
                   $sumary = 0;
                 }else{
                   $sumary = $inventory->total_price;
                 }



               }else{
                   $sumary = $request['get_sum_ship'];
               }

               $count_data_de = DB::table('cart_details')->select(
                   'cart_details.*'
                   )
                   ->where('user_id', Auth::user()->id)
                   ->count();

                   $count_data_de += 1;

               $cat = DB::table('products')->select(
                 'products.*'
                 )
                 ->where('products.id', $k->product_id)
                 ->first();


                 $get_image = DB::table('cart_images')->select(
                     'cart_images.*'
                     )
                     ->where('cart_id_detail', $k->id)
                     ->get();


                     $get_option = DB::table('cart_options')->select(
                         'cart_options.*'
                         )
                         ->where('cart_id_detail', $k->id)
                         ->get();

                 //$randomSixDigitInt2 = '62-'.($the_id).'-'.(\random_int(100000, 999999));
                 $randomSixDigitInt2 = date("d").''.date("m").''.date("Y").'-'.Auth::user()->id.'-'.$get_last_number.'-'.$count_data_de;

                 $obj = new order_detail();
                 $obj->order_id = $the_id;
                 $obj->code_gen_d = $randomSixDigitInt2;
                 $obj->product_id = $cat->id;
                 $obj->product_name = $cat->pro_name;
                 $obj->sum_image = $k->sum_image;
                 $obj->sum_price = $k->sum_price;
                 $obj->list_link = $k->list_link;
                 $obj->sum_shipping = $sumary;
                 $obj->save();

                 $obj_id = $obj->id;


                 foreach($get_image as $j){

                   $obj = new order_image();
                   $obj->order_id_detail = $obj_id;
                   $obj->order_image = $j->cart_image;
                   $obj->order_image_id = $j->cart_image_id;
                   $obj->order_image_sum = $j->cart_image_sum;
                   $obj->save();

                 }

                 foreach($get_option as $p){

                   $obj = new order_option();
                   $obj->order_id_detail = $obj_id;
                   $obj->option_id = $p->option_id;
                   $obj->save();

                  //  echo ($j['image']);
                 }


                 DB::table('cart_images')
                       ->where('cart_id_detail', $k->id)
                       ->delete();

                       DB::table('cart_options')
                             ->where('cart_id_detail', $k->id)
                             ->delete();

             }


             /// delete cart user






                   DB::table('cart_details')
                         ->where('user_id', Auth::user()->id)
                         ->delete();



             /// delete cart user



       }



       $order_detail = DB::table('order_details')->select(
              'order_details.*'
              )
              ->where('order_id', $package->id)
              ->get();



//noreply@masterphotonetwork.com

/*


       date_default_timezone_set("Asia/Bangkok");
       $data_date = date("Y-m-d H:i:s");


       // send email
            $data_toview = array();
          //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";

          date_default_timezone_set("Asia/Bangkok");
          $data_toview['data_detail'] = $order_detail;
          $data_toview['data'] = $package;
          $data_toview['datatime'] = date("d-m-Y H:i:s");

            $email_sender   = 'masterphotonetworkonline@gmail.com';
            $email_pass     = 'Master206';


            $email_to       =  $request['email_order'];

            $backup = \Mail::getSwiftMailer();

            try{

                        //https://accounts.google.com/DisplayUnlockCaptcha
                        // Setup your gmail mailer
                        $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'SSL');
                        $transport->setUsername($email_sender);
                        $transport->setPassword($email_pass);

                        // Any other mailer configuration stuff needed...
                        $gmail = new Swift_Mailer($transport);

                        // Set the mailer as gmail
                        \Mail::setSwiftMailer($gmail);

                        $data['emailto'] = $email_sender;
                        $data['sender'] = $email_to;
                        //Sender dan Reply harus sama

                        Mail::send('mail.customer', $data_toview, function($message) use ($data)
                        {
                            $message->from($data['sender'], 'Master Photo Network');
                            $message->to($data['sender'])
                            ->replyTo($data['sender'], 'Master Photo Network.')
                            ->subject('มีรายการใหม่จาก Master Photo Network');

                            //echo 'Confirmation email after registration is completed.';
                        });


                        Mail::send('mail.customer', $data_toview, function($message) use ($data)
                        {
                            $message->from($data['sender'], 'Master Photo Network');
                            $message->to($data['emailto'])
                            ->replyTo($data['sender'], 'Master Photo Network.')
                            ->subject('คุณได้ทำรายการจาก Master Photo Network');

                            //echo 'Confirmation email after registration is completed.';
                        });

            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
                echo $response;

            }


            // Restore your original mailer
            Mail::setSwiftMailer($backup);
            // send email


*/

$settings = DB::table('settings')
    ->where('id', 1)
    ->first();

$message = Auth::user()->name." มีการสั่งซื้อสินค้าเข้ามาใหม่ Order ID : ".$randomSixDigitInt;
$lineapi = $settings->line_noti;

$mms =  trim($message);
$chOne = curl_init();
curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($chOne, CURLOPT_POST, 1);
curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
$headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'',);
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($chOne);
if(curl_error($chOne)){
echo 'error:' . curl_error($chOne);
}else{
$result_ = json_decode($result, true);
echo "status : ".$result_['status'];
echo "message : ". $result_['message'];
}
curl_close($chOne);



          $id = $the_id;
          session()->forget('cart');

       return redirect(url('payment/'.$id));

    }


    public function update_profile(Request $request){

      $this->validate($request, [
           'name' => 'required',
           'Zip' => 'required',
           'country' => 'required',
           'email' => 'required'
       ]);

       $image = $request->file('image');
       $id = Auth::user()->id;

       if($image == NULL){

        $package = User::find($id);
        $package->name = $request['name'];
        $package->email = $request['email'];
        $package->phone = $request['phone'];
        $package->birthday = $request['hbd'];
        $package->address = $request['address'];
        $package->country = $request['country'];
        $package->zipcode = $request['Zip'];
        $package->save();

       }else{

      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $img = Image::make($image->getRealPath());
      $img->resize(400, 400, function ($constraint) {
      $constraint->aspectRatio();
      })->save('assets/images/avatar/'.$input['imagename']);


      $package = User::find($id);
      $package->name = $request['name'];
      $package->email = $request['email'];
      $package->phone = $request['phone'];
      $package->birthday = $request['hbd'];
      $package->address = $request['address'];
      $package->country = $request['country'];
      $package->zipcode = $request['Zip'];
      $package->avatar = $input['imagename'];
      $package->save();

       }



       return redirect(url('profile/'))->with('update_success','คุณทำการเพิ่มอสังหา สำเร็จ');




    }





    public function add_qty2_photo(Request $request){

      $qty2 = $request['qty2'];
      $ids = $request['ids'];
      $num_img = $request['num_img'];
      $img_set = $request['img_set'];





        $get_detail = DB::table('cart_details')->select(
          'cart_details.*'
          )
        ->where('id', $ids)
        ->first();

        $v1 = DB::table('cart_images')->select(
          'cart_images.*'
          )
        ->where('id', $num_img)
        ->first();

          $get_v1 = $v1->cart_image_sum;
          $get_v2 = $qty2;
          $get_v3 = $get_detail->sum_image;

          $sum_var = $get_v2 - $get_v1;

          $v4 = $get_v3 + $sum_var;

         $package = cart_image::find($num_img);
         $package->cart_image_sum = $qty2;
         $package->save();

         $obj = cart_detail::find($ids);
         $obj->sum_image = $v4;
         $obj->save();




      return Response::json([
            'status' => 1001
        ], 200);






    }


    public function update_photo_print(Request $request){

      $list_link = $request['list_link'];
      $gallary = $request->file('file');
      $ids = $request['ids'];





        $get_deatial = DB::table('cart_details')->select(
          'cart_details.*'
          )
        ->where('id', $ids)
        ->first();



        $path = 'assets/image/all_image/';
        $ext = $gallary->getClientOriginalExtension();
        $pin = rand(1000000, 9999999);
        $filename = time()."-test-".$pin.".".$ext;
        $gallary->move(($path), $filename);

        $obj = new cart_image();
        $obj->cart_id_detail = $ids;
        $obj->cart_image = $filename;
        $obj->cart_image_id = 1;
        $obj->cart_image_sum = 1;
        $obj->save();

        $check_image = DB::table('cart_images')
              ->where('cart_id_detail', $ids)
              ->count();

              DB::table('cart_details')
              ->where('id', $ids)
              ->update(['sum_image' => $get_deatial->sum_image+1]);


      $response = array (
                  'status'    => 'success',
                  'file_link' => $ids
                );

      /*  if(Session::get('cart.'.$ids.'.data.size_photo') == 0){
          $total_money_ses = ($cat->pro_price * Session::get('cart.'.$ids.'.data.1.sum_image'));
        }else{
          $total_money_ses = ($item->item_price * Session::get('cart.'.$ids.'.data.1.sum_image'));
        }

        session()->put('cart.'.$ids.'.data.2', ['sum_price' => $total_money_ses]); */

        echo json_encode($response);
        exit;

    //  return redirect(url('photo_edit/'.$list_link))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ'); Auth::user()->id
    }


    public function profile_edit($id){

      //dd($id);
      $user = DB::table('users')
          ->where('id', Auth::user()->id)
          ->first();

          //dd($user);
          if($user == null){
            abort(404);
          }

      $data['objs'] = $user;
      return view('profile_edit', $data);


    }

    public function profile(){

      $provinces = DB::table('province')
          ->orderBy('PROVINCE_ID', 'asc')
          ->get();




          if(Auth::user()->country !== null){

            $provinces_1 = DB::table('province')
                ->where('PROVINCE_ID', Auth::user()->country)
                ->first();

                $data['province_user'] = $provinces_1->PROVINCE_NAME;

          }else{

            $data['province_user'] = "null";

          }






      $data['provinces'] =  $provinces;


    //  dd($order);

      return view('profile2', $data);
    }

    public function cart(){


      if(Auth::guest()){
        $user_id = Session::get('cart');
      }else{
        $user_id = Auth::user()->id;
      }




        $count_data = DB::table('cart_details')->select(
            'cart_details.*'
            )
            ->where('user_id', $user_id)
            ->count();


            if($count_data == 0){
              return redirect(url('/'));
            }

        $get_data = DB::table('cart_details')->select(
            'cart_details.*'
            )
            ->where('user_id', $user_id)
            ->get();

            foreach($get_data as $k){

              $get_image = DB::table('cart_images')
                  ->where('cart_id_detail', $k->id)
                  ->first();
              $k->image = $get_image->cart_image;

              $get_option = DB::table('cart_options')->select(
                'cart_options.*'
                )
                ->where('cart_id_detail', $k->id)
                ->where('option_id', '!=', 0)
                ->get();

                foreach ($get_option as $j) {
                  // code...
                  $option = DB::table('option_items')->select(
                    'option_items.*'
                    )
                    ->where('id', $j->option_id)
                    ->first();
                    $k->option[] = $option;
                }


            }

          //  dd($get_data);

        $data['get_data'] = $get_data;
        $data['count_data'] = $count_data;

        if($count_data == 0){
          return view('empty_cart', $data);
        }else{
          return view('cart', $data);
        }


      //  return view('cart', $data);





    }

    public function photo_print($id){

      if(Auth::guest()){
        if(Session::get('cart') == null){
          $set_num_date = (\random_int(1000000, 9999999));
          Session::put(['cart' => $set_num_date]);
        }else{

        }
      }else{

      }


      $check_zero = DB::table('products')
        ->where('products.id', $id)
        ->first();

        if($check_zero == null){
          abort(404);
        }


  //    dd(Session::get('cart'));

      $img_all = DB::table('galleries')->select(
          'galleries.*'
          )
          ->where('pro_id', $id)
          ->get();


          $option_product = DB::table('product_items')->select(
              'product_items.*'
              )
              ->where('product_set_id', $id)
              ->orderBy('sort_no')
              ->get();


              $check_option_count = DB::table('product_items')->select(
                  'product_items.*'
                  )
                  ->leftjoin('option_products', 'product_items.option_set_id',  'option_products.id')
                  ->where('product_items.product_set_id', $id)
                  ->where('option_products.option_type', 1)
                  ->count();

                //  dd($check_option_count);

              foreach ($option_product as $objd) {

          $options = DB::table('option_products')
              ->where('id', $objd->option_set_id)
              ->first();




            $option_data_item = DB::table('option_items')->select(
                'option_items.*'
                )
                ->where('item_option_id', $options->id)
                ->get();

                $options->opt = $option_data_item;



            $objd->options_detail = $options;


        }

      //  dd($option_product);

          $cat = DB::table('products')->select(
            'products.*',
            'products.id as id_q',
            'products.created_at as create',
            'sub_categories.*'
            )
            ->leftjoin('sub_categories', 'sub_categories.id',  'products.pro_category')
            ->where('products.id', $id)
            ->first();

            if(Session::get('cart.'.$id) != null){
              $option_set = 1;
            }else{
              $option_set = 0;
            }

            $data['check_option_count'] = $check_option_count;
            $data['objs'] = $cat;
            $data['option_set'] = $option_set;
            $data['option_product'] = $option_product;
            $data['img_all'] = $img_all;

            $data['pro_id'] = $id;

          //  dd($option_product);
      return view('photo_print', $data);
    }

    public function photo_edit($id){

      //dd(Session::get('cart.'.$id.'.data.image'));

      if(Auth::guest()){
        $user_id = Session::get('cart');
      }else{
        $user_id = Auth::user()->id;
      }



      $check_zero =DB::table('cart_details')->select(
        'cart_details.*'
        )
        ->where('id', $id)
        ->where('user_id', $user_id)
        ->first();

        if($check_zero == null){
          abort(404);
        }else{

          $get_image_count = DB::table('cart_images')->select(
            'cart_images.*'
            )
            ->where('cart_id_detail', $check_zero->id)
            ->count();

            if($get_image_count == 0){

              DB::table('cart_options')
                    ->where('cart_id_detail', $id)
                    ->delete();

                    DB::table('cart_details')
                          ->where('id', $id)
                          ->delete();

                        return redirect('/');

            }

        }


      $get_option = DB::table('cart_options')->select(
        'cart_options.*'
        )
        ->where('cart_id_detail', $id)
        ->where('option_id', '!=', 0)
        ->get();

        foreach ($get_option as $k) {
          // code...
          $option = DB::table('option_items')->select(
            'option_items.*'
            )
            ->where('id', $k->option_id)
            ->first();
            $k->option[] = $option;
        }

        $get_idproduct = DB::table('cart_details')->select(
          'cart_details.*'
          )
          ->where('id', $id)
          ->first();

        $cat = DB::table('products')->select(
          'products.*'
          )
          ->where('products.id', $get_idproduct->product_id)
          ->first();

          $get_image = DB::table('cart_images')->select(
            'cart_images.*'
            )
            ->where('cart_id_detail', $id)
            ->get();

      //  dd($get_option);

        $data['id'] = $id;
        $data['objs'] = $cat;
        $data['set_cart'] = $id;
        $data['option_images'] = $get_option;
        $data['get_image'] = $get_image;
        $data['sum_price_value'] = $get_idproduct->sum_price;
        $data['sum_image_value'] = $get_idproduct->sum_image;


    //  dd($get_option);
      return view('photo_edit', $data);
    }

    public function del_upload_image(Request $request){




      $num = $request['num_image'];
      $list_link = $request['list_link'];


        $objs = DB::table('cart_images')
          ->select(
             'cart_images.*'
             )
          ->where('id', $num)
          ->first();




      $get_detail = DB::table('cart_details')
        ->select(
           'cart_details.*'
           )
        ->where('id', $objs->cart_id_detail)
        ->first();

          $sum_image1 = $get_detail->sum_image - $objs->cart_image_sum;
          $id = $objs->cart_id_detail;

          $package = cart_detail::find($id);
          $package->sum_image = $sum_image1;
          $package->save();

      $file_path = 'assets/image/all_image/'.$objs->cart_image;
      unlink($file_path);

      DB::table('cart_images')
        ->where('id', $num)
        ->delete();


      return redirect(url('photo_edit/'.$list_link))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }



    public function upload_image(Request $request){

    //  $count_cart = count(Session::get('cart'));

      if(Auth::guest()){
      //  dd($request['size_photo']);
        $gallary = $request->file('file');




      //  $get_count_cart = count(Session::get('cart'));
        $exp = array();
        $size_photo = $request['size_photo'];
        $path1 = explode(",", $size_photo);
    //    dd($get_count_cart);

        Session::put('status_user', 1);

        $exp = array_merge($exp, $path1);

        $this->validate($request, [
               'size_photo' => 'required',
               'product_id' => 'required'
           ]);

        //  $sum_img = sizeof($gallary);

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

                /////////////////////////////////////////////////////

        if(Session::get('cart') != null){
          foreach(Session::get('cart') as $u){
            if($u['data'][0]['size_photo'] == $exp && $u['data']['id'] == $request['product_id']){
              $check_old_cart += 1;
              $set_link = $u['data']['list_link'];
            }else{
              $check_old_cart += 0;
            }
        }
        }

//////////////////////////////////////////////////////////////
      //

      //  dd($exp);
      if($check_old_cart == 0){

        if (sizeof($gallary) > 0) {
         for ($i = 0; $i < sizeof($gallary); $i++) {


           $path = 'assets/image/all_image/';
           $ext = $gallary[$i]->getClientOriginalExtension();
           $filename = time()."-".$i."-".time().".".$ext;
           $gallary[$i]->move($path, $filename);

           $admins[] = [
               'image' => $filename,
               'id' => $i,
               'num' => 1
           ];


         }

       }

      // $set_num_date = count(Session::get('cart'));

       $set_num_date = (\random_int(100, 999));

     //  $data_url = $set_num_date;
     //  $set_num_date = "data".$set_num_date;

       $item = [
         'id' => $request['product_id'],
         ['size_photo' => $exp],
         'image_pro' => $cat->pro_image,
         'pro_name' => $cat->pro_name,
         'image' => $admins,
         ['status' => 0],
         ['sum_image' => $sum_img],
         ['sum_price' => $get_price],
         'list_link' => $set_num_date
       ];


       //dd($item);



     //  Session::put('cart.'.$request['product_id'], ['data' => $item]);
       Session::put('cart.'.$set_num_date, ['data' => $item]);

       return Response::json([
             'date_set' => $set_num_date,
             'status' => 'success'
         ], 200);

      }else{

        $set_num_img = count(Session::get('cart.'.$set_link.'.data.image'));

        if (sizeof($gallary) > 0) {
         for ($i = 0; $i < sizeof($gallary); $i++) {
           $path = 'assets/image/all_image/';
           $ext = $gallary[$i]->getClientOriginalExtension();
           $filename = time()."-".$i."-".time().".".$ext;
           $gallary[$i]->move($path, $filename);
           session()->push('cart.'.$set_link.'.data.image', ['image' => $filename, 'id' => $set_num_img+$i, 'num' => 1]);
         }
       }

       $sum_img = sizeof($gallary);
       session()->put('cart.'.$set_link.'.data.2', ['sum_image' => (Session::get('cart.'.$set_link.'.data.2.sum_image')+$sum_img)]);


       return Response::json([
             'date_set' => $set_link,
             'status' => 'success'
         ], 200);

      }






        /*  return Response::json([
              'status' => 'success'
          ], 200); */


      }else{

        $exp = array();
        $size_photo = $request['size_photo'];
        //dd($size_photo);
        $path1 = explode(",", $size_photo);
        $exp = array_merge($exp, $path1);

      //  dd($exp);

        $gallary = $request->file('file');



        $sum_img = sizeof($gallary);

        $cat = DB::table('products')->select(
          'products.*'
          )
          ->where('products.id', $request['product_id'])
          ->first();

          $get_price = DB::table('option_items')->select(
            'option_items.*'
            )
            ->whereIn('id', $exp)
            ->where('item_status', 1)
            ->sum('item_price');


            $check_count = DB::table('cart_details')->select(
              'cart_details.*'
              )
              ->where('product_id', $request['product_id'])
              ->where('user_id', Auth::user()->id)
              ->count();

          if($check_count > 0){


            $get_ids = DB::table('cart_details')->select(
              'cart_details.*'
              )
              ->where('product_id', $request['product_id'])
              ->where('user_id', Auth::user()->id)
              ->first();


            ////////////////////   check option   //////////////////////////

            $get_option = DB::table('cart_options')
              ->select(
              'cart_options.*'
              )
              ->where('cart_id_detail', $get_ids->id)
              ->get();

            $check_option = [];

            foreach($get_option as $ch){

              $check_option[] = $ch->option_id;

            }

            //dd($check_option);
            ////////////////////   check option   //////////////////////////

            if($exp == $check_option){


                            $get_deatial = DB::table('cart_details')->select(
                              'cart_details.*'
                              )
                            ->where('id', $get_ids->id)
                            ->first();

                            $sum_img = sizeof($gallary);

                            $v4 = $get_deatial->sum_image + $sum_img;



                            $obj = cart_detail::find($get_ids->id);
                            $obj->sum_image = $v4;
                            $obj->save();


                            if (sizeof($gallary) > 0) {
                             for ($i = 0; $i < sizeof($gallary); $i++) {
                               $path = 'assets/image/all_image/';
                               $ext = $gallary[$i]->getClientOriginalExtension();
                               $filename = time()."-".$i."-".time().".".$ext;
                               $gallary[$i]->move($path, $filename);

                               $admins[] = [
                                   'cart_id_detail' => $get_ids->id,
                                   'cart_image' => $filename,
                                   'cart_image_id' => $i,
                                   'cart_image_sum' => 1
                               ];
                             }
                             cart_image::insert($admins);
                           }


                      /*     DB::table('cart_options')->select(
                             'cart_options.*'
                             )
                           ->where('cart_id_detail', $get_ids->id)
                           ->delete();


                           foreach($exp as $k){

                             $obj = new cart_option();
                             $obj->cart_id_detail = $get_ids->id;
                             $obj->option_id = $k;
                             $obj->save();

                            //  echo ($j['image']);
                          }  */

                           $the_id = $get_ids->id;

            }else{


              $obj = new cart_detail();
              $obj->user_id = Auth::user()->id;
              $obj->product_id = $cat->id;
              $obj->product_name = $cat->pro_name;
              $obj->sum_image = $sum_img;
              $obj->sum_price = $get_price;
              $obj->list_link = $cat->id;
              $obj->save();
              $the_id = $obj->id;



              if (sizeof($gallary) > 0) {
               for ($i = 0; $i < sizeof($gallary); $i++) {
                 $path = 'assets/image/all_image/';
                 $ext = $gallary[$i]->getClientOriginalExtension();
                 $filename = time()."-".$i."-".time().".".$ext;
                 $gallary[$i]->move($path, $filename);

                 $admins[] = [
                     'cart_id_detail' => $the_id,
                     'cart_image' => $filename,
                     'cart_image_id' => $i,
                     'cart_image_sum' => 1
                 ];
               }
               cart_image::insert($admins);
             }


             foreach($exp as $k){

               if($k != ''){

                 $obj = new cart_option();
                 $obj->cart_id_detail = $the_id;
                 if($k != 0){
                   $obj->option_id = $k;
                 }
                 $obj->save();

               }


              //  echo ($j['image']);
             }



            }




            ////////////////////   check option   //////////////////////////ห






          }else{

            $obj = new cart_detail();
            $obj->user_id = Auth::user()->id;
            $obj->product_id = $cat->id;
            $obj->product_name = $cat->pro_name;
            $obj->sum_image = $sum_img;
            $obj->sum_price = $get_price;
            $obj->list_link = $cat->id;
            $obj->save();
            $the_id = $obj->id;



            if (sizeof($gallary) > 0) {
             for ($i = 0; $i < sizeof($gallary); $i++) {
               $path = 'assets/image/all_image/';
               $ext = $gallary[$i]->getClientOriginalExtension();
               $filename = time()."-".$i."-".time().".".$ext;
               $gallary[$i]->move($path, $filename);

               $admins[] = [
                   'cart_id_detail' => $the_id,
                   'cart_image' => $filename,
                   'cart_image_id' => $i,
                   'cart_image_sum' => 1
               ];
             }
             cart_image::insert($admins);
           }


           foreach($exp as $k){

             $obj = new cart_option();
             $obj->cart_id_detail = $the_id;
             $obj->option_id = $k;
             $obj->save();

            //  echo ($j['image']);
           }

          }






          return Response::json([
                'date_set' => $the_id,
                'status' => 'success'
            ], 200);



      }






    }



    public function images_delete(){
      return Response::json([
          'status' => 'success'
      ], 200);
    }
}

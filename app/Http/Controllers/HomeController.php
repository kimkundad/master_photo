<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Response;
use Session;
use Auth;
use App\User;
use App\order;
use App\order_option;
use App\order_detail;
use App\order_image;
use App\category;
use App\delivery;
use App\user_address;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

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
  //   session()->forget('cart');
  //   session()->flush();
  //  $request->session()->pull('cart.data2.data.image.image', '1534488467-logo-Isuzu.png');
  //  session()->push('cart.data1.data.image', ['image' => '1534488467-logo-Isuzu.jpg', 'id' => 6]);
  //  $image = Session::get('cart.'.$ids.'.data.image.'.$num.'.image');

  //    session()->pull('cart.data2.data.image.image', '1534489077-logo-major.png');

      $arrivals = DB::table('products')->select(
        'products.*'
        )
        ->where('pro_status_show', 2)
        ->limit(3)
        ->get();


        $hot = DB::table('products')->select(
          'products.*'
          )
          ->where('pro_status_show', 3)
          ->limit(8)
          ->get();


          $slide = DB::table('slide_shows')->select(
                'slide_shows.*'
                )
                ->where('slide_status', 1)
                ->get();

            $data['slide'] = $slide;


          $hot_new = DB::table('products')->select(
            'products.*'
            )
            ->where('pro_status_show', 4)
            ->limit(3)
            ->get();



        $data['arrivals'] = $arrivals;
        $data['hot'] = $hot;
        $data['hot_new'] = $hot_new;

        return view('welcome', $data);
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

    public function category($id){

      $sub_categories = DB::table('sub_categories')->select(
        'sub_categories.*'
        )
        ->where('id', $id)
        ->first();

      $product = DB::table('products')->select(
        'products.*'
        )
        ->where('pro_category', $id)
        ->paginate(16);

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

      $set_num_date = count(Session::get('cart'));
      if($set_num_date == 0){
        return redirect('/');
      }else{
        Session::put('cart_redirect', 1);
      }

      //Auth::user()->

      $user_addresses = DB::table('user_addresses')->select(
             'user_addresses.*'
             )
             ->where('user_id', Auth::user()->id)
             ->count();

      if($user_addresses > 0){


        $package_check_add_3 = DB::table('user_addresses')
            ->where('user_id', Auth::user()->id)
            ->where('type_address', 3)
            ->count();

            if($package_check_add_3 > 0){

              $check_address = 3;

              //ภ้าเจอ 3 ให้ใช้ 3ไป อันแรก ไว้ใน $package

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

                              //  dd(get address); สำหรับ type 1
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
                              //  //  dd(get address); สำหรับ type 1
                                $data['package_1'] = $package_1;
                            //    dd($data['package_1']);
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



        //  dd($package);


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

        //  dd($get_my_add);

        }else{
          $data['get_my_add'] = null;
        }


        $data['get_my_add_count'] = $get_my_add_count;

      //  dd($get_my_add);

        $data['package'] = $package;
        $data['check_address'] = $check_address;

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

      $get_all_image = [];

      foreach(Session::get('cart.'.$ids.'.data.image') as $u){

      //  $get_all_image[] = $u['image'];
        $file_path = 'assets/image/all_image/'.$u['image'];
        unlink($file_path);

      }



    //  dd($get_all_image);
      session()->forget('cart.'.$ids);
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

            return view('shipping_2', $data);

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
            return view('shipping_2', $data);

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
      //   dd($c1);

        $this->validate($request, [
             'address_shipping_order' => 'required',
             'address_type_order' => 'required',
             'deliver_order' => 'required',
             'total' => 'required',
             'order_price' => 'required',
             'c1' => 'required'
         ]);

//dd($c1);


         $id_card_no = $request['id_card_no'];
         $branch_code = $request['branch_code'];

         $check_order = $request['check_order'];
         if($request['check_order'] == null){
           $check_order = 0;
         }

         if($check_order == 1){

           $id = Auth::user()->id;

           $user = User::find($id);
           $user->id_card_no = $request['id_card_no'];
           $user->branch_code = $request['branch_code'];
           $user->save();

         }




      //  $name_user = $request['firstname_order'];

       $package = new order();
       $package->user_id = Auth::user()->id;
       $package->shipping_address = $request['address_shipping_order'];
       $package->bill_address = $request['address_bill_order'];
       $package->type_order_check = $request['address_type_order'];
       $package->bil_req = $check_order;
       $package->deliver_order = $request['deliver_order'];
       $package->note = $request['message_order'];
       $package->order_price = $request['order_price'];
       $package->total = $request['total'];
       $package->discount = $request['discount'];
       $package->save();

       $the_id = $package->id;

       foreach(Session::get('cart') as $u){

         //dd($u['data']['image']);


         $cat = DB::table('products')->select(
           'products.*'
           )
           ->where('products.id', $u['data']['id'])
           ->first();

         $obj = new order_detail();
         $obj->order_id = $the_id;
         $obj->product_id = $cat->id;
         $obj->product_name = $cat->pro_name;
         $obj->sum_image = $u['data'][2]['sum_image'];
         $obj->sum_price = $u['data'][3]['sum_price'];
         $obj->list_link = $u['data']['list_link'];
         $obj->save();

         $obj_id = $obj->id;


         foreach($u['data']['image'] as $j){

           $obj = new order_image();
           $obj->order_id_detail = $obj_id;
           $obj->order_image = $j['image'];
           $obj->order_image_id = $j['id'];
           $obj->order_image_sum = $j['num'];
           $obj->save();

          //  echo ($j['image']);
         }

         foreach($u['data'][0]['size_photo'] as $k){

           $obj = new order_option();
           $obj->order_id_detail = $obj_id;
           $obj->option_id = $k;
           $obj->save();

          //  echo ($j['image']);
         }


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

      $cat = DB::table('products')->select(
        'products.*'
        )
        ->where('products.id', Session::get('cart.'.$ids.'.data.id'))
        ->first();

        $item = DB::table('option_items')->select(
          'option_items.*'
          )
          ->where('option_items.id', Session::get('cart.'.$ids.'.data.size_photo'))
          ->first();

      $v1 = Session::get('cart.'.$ids.'.data.image.'.$num_img.'.num');
      $v2 = $qty2;
      $v3 = Session::get('cart.'.$ids.'.data.2.sum_image');

        $sum_var = $v2 - $v1;
        //dd($v2 - $v1);
        $v4 = $v3 + $sum_var;
        session()->put('cart.'.$ids.'.data.2', ['sum_image' => $v4]);

      /*  if(Session::get('cart.'.$ids.'.data.size_photo') == 0){
          $total_money_ses = ($cat->pro_price * Session::get('cart.'.$ids.'.data.1.sum_image'));
        }else{
          $total_money_ses = ($item->item_price * Session::get('cart.'.$ids.'.data.1.sum_image'));
        }

        session()->put('cart.'.$ids.'.data.2', ['sum_price' => $total_money_ses]); */

      $data = ['image' => $img_set, 'id' => $num_img, 'num' => $qty2];
      session()->put('cart.'.$ids.'.data.image.'.$num_img.'', $data);
    //dd(Session::get('cart.'.$ids.'.data.image.'.$num_img.'.num'));





      return Response::json([
            'status' => 1001
        ], 200);

    }


    public function update_photo_print(Request $request){

      $list_link = $request['list_link'];
      $gallary = $request->file('file');
      $ids = $request['ids'];
      $set_num_img = count(Session::get('cart.'.$ids.'.data.image'));

      if (sizeof($gallary) > 0) {
       for ($i = 0; $i < sizeof($gallary); $i++) {
         $path = 'assets/image/all_image/';
         $filename = time()."-".$gallary[$i]->getClientOriginalName();
         $gallary[$i]->move($path, $filename);
         session()->push('cart.'.$ids.'.data.image', ['image' => $filename, 'id' => $set_num_img+$i, 'num' => 1]);
       }
     }

     $sum_img = sizeof($gallary);
     session()->put('cart.'.$ids.'.data.2', ['sum_image' => (Session::get('cart.'.$ids.'.data.2.sum_image')+$sum_img)]);
    // session()->push('cart.'.$ids.'.data.image', [$admins]);
    //  dd(count(Session::get('cart.'.$ids.'.data.image')));

    $cat = DB::table('products')->select(
      'products.*'
      )
      ->where('products.id', Session::get('cart.'.$ids.'.data.id'))
      ->first();

      $item = DB::table('option_items')->select(
        'option_items.*'
        )
        ->where('option_items.id', Session::get('cart.'.$ids.'.data.size_photo'))
        ->first();

      /*  if(Session::get('cart.'.$ids.'.data.size_photo') == 0){
          $total_money_ses = ($cat->pro_price * Session::get('cart.'.$ids.'.data.1.sum_image'));
        }else{
          $total_money_ses = ($item->item_price * Session::get('cart.'.$ids.'.data.1.sum_image'));
        }

        session()->put('cart.'.$ids.'.data.2', ['sum_price' => $total_money_ses]); */

      return Response::json([
            'status' => 'success'
        ], 200);


    //  return redirect(url('photo_edit/'.$list_link))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ'); Auth::user()->id
    }


    public function profile_edit($id){

      //dd($id);
      $user = DB::table('users')
          ->where('id', $id)
          ->first();

      $data['objs'] = $user;
      return view('profile_edit', $data);


    }

    public function profile(){

      $provinces = DB::table('province')
          ->orderBy('PROVINCE_ID', 'asc')
          ->get();

      $order = DB::table('orders')
          ->where('user_id', Auth::user()->id)
          ->orderBy('id', 'desc')
          ->get();

          foreach ($order as $u) {



            $order_detail = DB::table('order_details')->select(
                'order_details.*'
                )
                ->where('order_id', $u->id)
                ->first();

                $product = DB::table('products')->select(
                    'products.*'
                    )
                    ->where('id', $order_detail->product_id)
                    ->first();
            $u->option = $order_detail;
            $u->product = $product;


          }


          $option_product = DB::table('option_products')
              ->orderBy('id', 'desc')
              ->get();


          foreach ($option_product as $obj) {

            $option_data_item = DB::table('option_items')->select(
                'option_items.*'
                )
                ->where('item_option_id', $obj->id)
                ->get();

            $obj->options_detail = $option_data_item;

          }


          if(Auth::user()->country !== null){

            $provinces_1 = DB::table('province')
                ->where('PROVINCE_ID', Auth::user()->country)
                ->first();

                $data['province_user'] = $provinces_1->PROVINCE_NAME;

          }else{

            $data['province_user'] = "null";

          }





      $data['option_product'] = $option_product;
      $data['provinces'] =  $provinces;
      $data['order'] = $order;

    //  dd($order);

      return view('profile2', $data);
    }

    public function cart(){



      //dd(Session::get('cart'));


      $set_num_date = count(Session::get('cart'));


      $set_img = array();
      $option_set_pro = [];

      foreach(Session::get('cart') as $u){

        $cat = DB::table('products')->select(
          'products.*'
          )
          ->where('products.id', $u['data']['id'])
          ->first();

          $option_product = DB::table('option_items')->select(
            'option_items.*'
            )
            ->whereIn('id', Session::get('cart.'.$u['data']['id'].'.data.0.size_photo'))
            ->get();

        $option_set_pro = $option_product;
        $set_img[] = $cat->pro_image;
      }

    //  dd($option_set_pro);
      $data['set_img'] = $set_img;
      $data['option_set_pro'] = $option_set_pro;
      return view('cart', $data);
    }

    public function photo_print($id){


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


            $data['objs'] = $cat;
            $data['option_set'] = $option_set;
            $data['option_product'] = $option_product;
            $data['img_all'] = $img_all;

          //  dd($option_product);
      return view('photo_print', $data);
    }

    public function photo_edit($id){

    //  dd(Session::get('cart'));


      $get_price = DB::table('option_items')->select(
        'option_items.*'
        )
        ->whereIn('id', Session::get('cart.'.$id.'.data.0.size_photo'))
        ->get();

    //  dd(Session::get('cart'));


      $set_num_date = count(Session::get('cart'));
      if($set_num_date == 0){
        return redirect('/');
      }
      $ids = "data".$id;

      $cat = DB::table('products')->select(
        'products.*'
        )
        ->where('products.id', Session::get('cart.'.$id.'.data.id'))
        ->first();

      //  dd($cat);


    //  session()->push('cart.data1.data.image', ['image' => '1534488467-logo-Isuzu.jpg', 'id' => 6]);
      session()->put('cart.'.$id.'.data.1', ['status' => 1]);
      $data['id'] = $id;
      $data['objs'] = $cat;
      $data['set_cart'] = $id;
      $data['option_images'] = $get_price;
    //  dd($get_price);
      return view('photo_edit', $data);
    }

    public function del_upload_image(Request $request){

      $num = $request['num_image'];
      $list_link = $request['list_link'];
      $ids = $request['ids'];

      $v1 = Session::get('cart.'.$ids.'.data.image.'.$num.'.num');
      //dd($v1);
      $cat = DB::table('products')->select(
        'products.*'
        )
        ->where('products.id', Session::get('cart.'.$ids.'.data.id'))
        ->first();

        $item = DB::table('option_items')->select(
          'option_items.*'
          )
          ->where('option_items.id', Session::get('cart.'.$ids.'.data.size_photo'))
          ->first();


        /*  if(Session::get('cart.'.$ids.'.data.size_photo') == 0){
            $total_money_ses = $cat->pro_price * (Session::get('cart.'.$ids.'.data.1.sum_image') - $v1);
          }else{
            $total_money_ses = $item->item_price * (Session::get('cart.'.$ids.'.data.1.sum_image') - $v1);
          }*/


        //  session()->put('cart.'.$ids.'.data.2', ['sum_price' => $total_money_ses]);
          $v3 = Session::get('cart.'.$ids.'.data.2.sum_image');
          session()->put('cart.'.$ids.'.data.2', ['sum_image' => ($v3-$v1)]);



      $image = Session::get('cart.'.$ids.'.data.image.'.$num.'.image');

      $file_path = 'assets/image/all_image/'.$image;
      unlink($file_path);

      session()->forget('cart.'.$ids.'.data.image.'.$num);



      return redirect(url('photo_edit/'.$list_link))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }


    public function update_product_option(Request $request){

      $this->validate($request, [
             'size_photo' => 'required',
             'product_id' => 'required'
         ]);


      $size_photo = $request['size_photo'];


      $cat = DB::table('products')->select(
        'products.*'
        )
        ->where('products.id', $request['product_id'])
        ->first();

        $get_price = DB::table('option_items')->select(
          'option_items.*'
          )
          ->whereIn('id', $size_photo)
          ->where('item_status', 1)
          ->sum('item_price');

        //  session()->put('cart.'.$request['product_id'].'.data.size_photo');
           session()->put('cart.'.$request['product_id'].'.data.0', ['size_photo' => $size_photo]);

           session()->put('cart.'.$request['product_id'].'.data.3', ['sum_price' => $get_price]);
        //  session()->push('cart.'.$request['product_id'].'.data.2', ['sum_price' => $get_price]);
        //  dd(Session::get('cart.'.$request['product_id']));


          return Response::json([
              'status' => 'success'
          ], 200);

    }

    public function upload_image(Request $request){

      $gallary = $request->file('file');
      $exp = array();
      $size_photo = $request['size_photo'];
      $path1 = explode(",", $size_photo);
      $exp = array_merge($exp, $path1);
    //  dd($exp);

        $this->validate($request, [
               'size_photo' => 'required',
               'product_id' => 'required'
           ]);


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


         if (sizeof($gallary) > 0) {
          for ($i = 0; $i < sizeof($gallary); $i++) {
            $path = 'assets/image/all_image/';
            $filename = time()."-".$gallary[$i]->getClientOriginalName();
            $gallary[$i]->move($path, $filename);
            $admins[] = [
                'image' => $filename,
                'id' => $i,
                'num' => 1
            ];
          }

        }

        $set_num_date = count(Session::get('cart'));
        $set_num_date += 1;
        $data_url = $set_num_date;
        $set_num_date = "data".$set_num_date;

        $item = [
          'id' => $request['product_id'],
          ['size_photo' => $exp],
          'image_pro' => $cat->pro_image,
          'pro_name' => $cat->pro_name,
          'image' => $admins,
          ['status' => 0],
          ['sum_image' => $sum_img],
          ['sum_price' => $get_price],
          'list_link' => $request['product_id']
        ];


        //dd($item);



        Session::put('cart.'.$request['product_id'], ['data' => $item]);

        return Response::json([
              'date_set' => $request['product_id'],
              'status' => 'success'
          ], 200);


      /*  return Response::json([
            'status' => 'success'
        ], 200); */



    }



    public function images_delete(){
      return Response::json([
          'status' => 'success'
      ], 200);
    }
}

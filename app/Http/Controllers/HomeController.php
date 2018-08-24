<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Response;
use Session;
use Auth;
use App\order;
use App\order_detail;
use App\order_image;
use App\category;
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
    // session()->forget('cart');
    // session()->flush();
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

      $order = DB::table('orders')->select(
             'orders.*'
             )
             ->where('id', $id)
             ->first();

      $data['order'] = $order;
      return view('payment', $data);
    }


    public function shipping(){
      $set_num_date = count(Session::get('cart'));
      if($set_num_date == 0){
        return redirect('/');
      }else{
        Session::put('cart_redirect', 1);
      }

      return view('shipping');
    }



    public function add_order(Request $request){

        $this->validate($request, [
             'firstname_order' => 'required',
             'lastname_order' => 'required',
             'order_price' => 'required',
             'total' => 'required',
             'email_order' => 'required',
             'phone_order' => 'required',
             'address' => 'required',
             'province' => 'required',
             'zipcode' => 'required',
             'policy_terms' => 'required'
         ]);
        $name_user = $request['firstname_order'];

       $package = new order();
       $package->user_id = Auth::user()->id;
       $package->firstname_order = $request['firstname_order'];
       $package->lastname_order = $request['lastname_order'];
       $package->order_price = $request['order_price'];
       $package->total = $request['total'];
       $package->email_order = $request['email_order'];
       $package->phone_order = $request['phone_order'];
       $package->address = $request['address'];
       $package->province = $request['province'];
       $package->zipcode = $request['zipcode'];
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
         $obj->sum_image = $u['data'][1]['sum_image'];
         $obj->sum_price = $u['data'][2]['sum_price'];
         $obj->list_link = $u['data']['list_link'];
         $obj->size_photo = $u['data']['size_photo'];
         $obj->image_radio = $u['data']['image_radio'];
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

       }



       $order_detail = DB::table('order_details')->select(
              'order_details.*'
              )
              ->where('order_id', $package->id)
              ->get();








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

        /*    $email_sender   = 'info@acmeinvestor.com';
            $email_pass     = 'Iaminfoacmeinvestor';  */
            $email_to       =  $request['email_order'];
            //echo $admins[$idx]['email'];
            // Backup your default mailer
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





          $id = $the_id;

       return redirect(url('payment/'.$id));

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
      $v3 = Session::get('cart.'.$ids.'.data.1.sum_image');

        $sum_var = $v2 - $v1;
        //dd($v2 - $v1);
        $v4 = $v3 + $sum_var;
        session()->put('cart.'.$ids.'.data.1', ['sum_image' => $v4]);

        if(Session::get('cart.'.$ids.'.data.size_photo') == 0){
          $total_money_ses = ($cat->pro_price * Session::get('cart.'.$ids.'.data.1.sum_image'));
        }else{
          $total_money_ses = ($item->item_price * Session::get('cart.'.$ids.'.data.1.sum_image'));
        }
        session()->put('cart.'.$ids.'.data.2', ['sum_price' => $total_money_ses]);

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
     session()->put('cart.'.$ids.'.data.1', ['sum_image' => (Session::get('cart.'.$ids.'.data.1.sum_image')+$sum_img)]);
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

        if(Session::get('cart.'.$ids.'.data.size_photo') == 0){
          $total_money_ses = ($cat->pro_price * Session::get('cart.'.$ids.'.data.1.sum_image'));
        }else{
          $total_money_ses = ($item->item_price * Session::get('cart.'.$ids.'.data.1.sum_image'));
        }

        session()->put('cart.'.$ids.'.data.2', ['sum_price' => $total_money_ses]);

      return Response::json([
            'status' => 'success'
        ], 200);


    //  return redirect(url('photo_edit/'.$list_link))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function profile(){
      return view('profile');
    }

    public function cart(){

      $set_num_date = count(Session::get('cart'));
      if($set_num_date == 0){
        return redirect('/');
      }else{
        Session::put('status_user', 1);
      }

      $set_img = array();

      foreach(Session::get('cart') as $u){

        $cat = DB::table('products')->select(
          'products.*'
          )
          ->where('products.id', $u['data']['id'])
          ->first();

        $set_img[] = $cat->pro_image;
      }

      //dd($set_img);
      $data['set_img'] = $set_img;

      return view('cart', $data);
    }

    public function photo_print($id){

      $img_all = DB::table('galleries')->select(
          'galleries.*'
          )
          ->where('pro_id', $id)
          ->get();

          $option_product = DB::table('option_products')
              ->orderBy('id', 'desc')
              ->get();


          foreach ($option_product as $obj) {

            $option_data_item = DB::table('option_items')->select(
                'option_items.*'
                )
                ->where('item_option_id', $obj->id)
                ->get();

            $options = DB::table('product_items')->select(
                'product_items.*'
                )
                ->where('product_set_id', $id)
                ->where('option_set_id', $obj->id)
                ->count();

            $obj->options = $options;
            $obj->options_detail = $option_data_item;

          }

          //dd($option_product);

          $cat = DB::table('products')->select(
            'products.*',
            'products.id as id_q',
            'products.created_at as create',
            'sub_categories.*'
            )
            ->leftjoin('sub_categories', 'sub_categories.id',  'products.pro_category')
            ->where('products.id', $id)
            ->first();

            $data['objs'] = $cat;
            $data['option_product'] = $option_product;
            $data['img_all'] = $img_all;

          //  dd($option_product);
      return view('photo_print', $data);
    }

    public function photo_edit($id){



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
      //dd($option_product);


      $set_num_date = count(Session::get('cart'));
      if($set_num_date == 0){
        return redirect('/');
      }
      $ids = "data".$id;

      $cat = DB::table('products')->select(
        'products.*'
        )
        ->where('products.id', Session::get('cart.'.$ids.'.data.id'))
        ->first();

      //  dd($cat);


    //  session()->push('cart.data1.data.image', ['image' => '1534488467-logo-Isuzu.jpg', 'id' => 6]);
      session()->put('cart.'.$ids.'.data.0', ['status' => 1]);
      $data['id'] = $id;
      $data['objs'] = $cat;
      $data['set_cart'] = $ids;
      $data['option_product'] = $option_product;
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

          if(Session::get('cart.'.$ids.'.data.size_photo') == 0){
            $total_money_ses = $cat->pro_price * (Session::get('cart.'.$ids.'.data.1.sum_image') - $v1);
          }else{
            $total_money_ses = $item->item_price * (Session::get('cart.'.$ids.'.data.1.sum_image') - $v1);
          }

          session()->put('cart.'.$ids.'.data.2', ['sum_price' => $total_money_ses]);
          $v3 = Session::get('cart.'.$ids.'.data.1.sum_image');
          session()->put('cart.'.$ids.'.data.1', ['sum_image' => ($v3-$v1)]);



      $image = Session::get('cart.'.$ids.'.data.image.'.$num.'.image');

      $file_path = 'assets/image/all_image/'.$image;
      unlink($file_path);

      session()->forget('cart.'.$ids.'.data.image.'.$num);



      return redirect(url('photo_edit/'.$list_link))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function upload_image(Request $request){

      $gallary = $request->file('file');
    //  dd($gallary);

        $this->validate($request, [
               'size_photo' => 'required',
               'product_id' => 'required',
               'image_radio' => 'required'
           ]);


          $sum_img = sizeof($gallary);

          $cat = DB::table('products')->select(
            'products.*'
            )
            ->where('products.id', $request['product_id'])
            ->first();

            $item = DB::table('option_items')->select(
              'option_items.*'
              )
              ->where('option_items.id', $request['size_photo'])
              ->first();

          if($request['size_photo'] == 0){
            $total_money_ses = ($cat->pro_price * $sum_img);
          }else{
            $total_money_ses = ($item->item_price * $sum_img);
          }


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
          'size_photo' => $request['size_photo'],
          'image_radio' => $request['image_radio'],
          'image' => $admins,
          ['status' => 0],
          ['sum_image' => $sum_img],
          ['sum_price' => $total_money_ses],
          'list_link' => $data_url
        ];



        Session::put('cart.'.$set_num_date, ['data' => $item]);

        return Response::json([
              'date_set' => $data_url,
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

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
              'orders.*'
              )
              ->get();

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
      $obj = order::find($id);

      $order_detail = DB::table('order_details')->select(
            'order_details.*',
            'order_details.id as id_de'
            )
            ->where('order_id', $id)
            ->get();

            foreach($order_detail as $u){

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
                //  dd($order_option);
            }
          //  dd($order_detail);

      $data['datahead'] = "ข้อมูล Order";

      $data['objs'] = $obj;
      $data['order_detail'] = $order_detail;
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
    }
}

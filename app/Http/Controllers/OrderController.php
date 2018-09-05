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
            'order_details.*'
            )
            ->where('order_id', $id)
            ->get();

      $data['datahead'] = "ข้อมูล Order";

      $data['objs'] = $obj;
      $data['order_detail'] = $order_detail;
      dd($order_detail);
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

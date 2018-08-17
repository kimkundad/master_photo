<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Response;
use Session;

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
      session()->forget('cart');
      session()->flush();
  //  $request->session()->pull('cart.data2.data.image.image', '1534488467-logo-Isuzu.png');
  //  session()->push('cart.data2.data.image.image', '1534488467-logo-Isuzu.jpg');

  //    session()->pull('cart.data2.data.image.image', '1534489077-logo-major.png');




        return view('welcome');
    }

    public function profile(){
      return view('profile');
    }

    public function photo_print(){
      return view('photo_print');
    }

    public function photo_edit($id){
      $set_num_date = count(Session::get('cart'));
      if($set_num_date == 0){
        return redirect('/');
      }
      $data['id'] = $id;
      return view('photo_edit', $data);
    }

    public function del_upload_image(Request $request){

      $num = $request['num_image'];
      session()->forget('cart.data2.data.image.'.$num);

      return redirect(url('photo_edit'))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function upload_image(Request $request){

      $gallary = $request->file('file');
    //  dd($gallary);

        $this->validate($request, [
               'size_photo' => 'required',
               'product_id' => 'required',
               'image_radio' => 'required'
           ]);

          $image_radio = $request['image_radio'];
          if($image_radio == 0){
            $image_radio = 1;
          }


         if (sizeof($gallary) > 0) {
          for ($i = 0; $i < sizeof($gallary); $i++) {
            $path = 'assets/image/all_image/';
            $filename = time()."-".$gallary[$i]->getClientOriginalName();
            $gallary[$i]->move($path, $filename);
            $admins[] = [
                'image' => $filename,
                'id' => $i
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
          'image_radio' => $image_radio,
          'image' => $admins,
          'status' => 0,
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

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
  //   session()->forget('cart');
  //   session()->flush();
  //  $request->session()->pull('cart.data2.data.image.image', '1534488467-logo-Isuzu.png');
  //  session()->push('cart.data1.data.image', ['image' => '1534488467-logo-Isuzu.jpg', 'id' => 6]);
  //  $image = Session::get('cart.'.$ids.'.data.image.'.$num.'.image');

  //    session()->pull('cart.data2.data.image.image', '1534489077-logo-major.png');




        return view('welcome');
    }

    public function add_qty2_photo(Request $request){

      $qty2 = $request['qty2'];
      $ids = $request['ids'];
      $num_img = $request['num_img'];
      $img_set = $request['img_set'];

      $data = ['image' => $img_set, 'id' => $num_img, 'num' => $qty2];
      session()->put('cart.'.$ids.'.data.image.'.$num_img.'', $data);

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
    // session()->push('cart.'.$ids.'.data.image', [$admins]);
    //  dd(count(Session::get('cart.'.$ids.'.data.image')));

      return Response::json([
            'status' => 'success'
        ], 200);


    //  return redirect(url('photo_edit/'.$list_link))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function profile(){
      return view('profile');
    }

    public function cart(){
      return view('cart');
    }

    public function photo_print(){
      return view('photo_print');
    }

    public function photo_edit($id){
      $set_num_date = count(Session::get('cart'));
      if($set_num_date == 0){
        return redirect('/');
      }
      $ids = "data".$id;
    //  session()->push('cart.data1.data.image', ['image' => '1534488467-logo-Isuzu.jpg', 'id' => 6]);
      session()->put('cart.'.$ids.'.data.0', ['status' => 1]);
      $data['id'] = $id;
      return view('photo_edit', $data);
    }

    public function del_upload_image(Request $request){

      $num = $request['num_image'];
      $list_link = $request['list_link'];
      $ids = $request['ids'];

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
          'image_radio' => $image_radio,
          'image' => $admins,
          ['status' => 0],
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

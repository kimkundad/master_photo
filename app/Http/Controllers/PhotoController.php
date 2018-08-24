<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\sub_category;
use App\category;
use App\option_product;
use App\product;
use App\gallery;
use App\product_item;

class PhotoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
      $cat = DB::table('products')->select(
            'products.*',
            'products.id as id_p',
            'products.created_at as create',
            'sub_categories.*'
            )
            ->leftjoin('sub_categories', 'sub_categories.id',  'products.pro_category')
            ->get();


      $data['objs'] = $cat;
      $data['datahead'] = "สินค้าทั้งหมด";

      return view('admin.photo.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //

      $option_product = option_product::all();
      $data['option_product'] = $option_product;
      $sub_category = sub_category::all();
      $data['category'] = $sub_category;
      $data['method'] = "post";
      $data['url'] = url('admin/photo');
      $data['datahead'] = "สร้างสินค้า";
      return view('admin.photo.create', $data);
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
      $image = $request->file('image');
      $this->validate($request, [
           'image' => 'required|max:8048',
           'pro_name' => 'required',
           'pro_category' => 'required',
           'pro_status_show' => 'required',
           'pro_price' => 'required',
           'pro_title' => 'required',
           'option' => 'required',
           'pro_name_detail' => 'required'
       ]);

       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $destinationPath = asset('assets/image/product/');
      $img = Image::make($image->getRealPath());
      $img->resize(800, 533, function ($constraint) {
      $constraint->aspectRatio();
    })->save('assets/image/product/'.$input['imagename']);


     $package = new product();
     $package->pro_name = $request['pro_name'];
     $package->pro_title = $request['pro_title'];
     $package->pro_name_detail = $request['pro_name_detail'];
     $package->pro_category = $request['pro_category'];
     $package->pro_price = $request['pro_price'];
     $package->pro_image = $input['imagename'];
     $package->pro_status_show = $request['pro_status_show'];
     $package->save();

     $the_id = $package->id;

     $gallary = $request['option'];


     if (sizeof($gallary) > 0) {
        for ($i = 0; $i < sizeof($gallary); $i++) {
          $admins[] = [
              'option_set_id' => $gallary[$i],
              'product_set_id' => $the_id
          ];
        }
        product_item::insert($admins);
      }


     return redirect(url('admin/product_gallery/'.$the_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

  }


  public function product_gallery($id){

    $data['id'] = $id;
    $data['datahead'] = "เพิ่มรูปประกอบสินค้า";
    return view('admin.product.product_gallery', $data);
  }

  public function add_gallery(Request $request){


    $gallary = $request->file('product_image');
      $this->validate($request, [
           'product_image' => 'required|max:8048',
           'pro_id' => 'required'
       ]);

       if (sizeof($gallary) > 0) {
        for ($i = 0; $i < sizeof($gallary); $i++) {
          $path = 'assets/image/gallery/';
          $filename = time()."-".$gallary[$i]->getClientOriginalName();
          $gallary[$i]->move($path, $filename);
          $admins[] = [
              'image' => $filename,
              'pro_id' => $request['pro_id']
          ];
        }
        gallery::insert($admins);
      }

      return redirect(url('admin/photo/'.$request['pro_id'].'/edit'))->with('add_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

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
      $img_all = DB::table('galleries')->select(
          'galleries.*'
          )
          ->where('pro_id', $id)
          ->get();

          $option_product = DB::table('option_products')
              ->get();


          foreach ($option_product as $obj) {

            $options = DB::table('product_items')->select(
                'product_items.*'
                )
                ->where('product_set_id', $id)
                ->where('option_set_id', $obj->id)
                ->count();



            $obj->options = $options;

          }


          //dd($option_product);


          $data['option_product'] = $option_product;
          $sub_category = sub_category::all();
          $data['category'] = $sub_category;
          $data['img_all'] = $img_all;


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
            $data['datahead'] = "แก้ไขข้อมูลสินค้า";
            $data['url'] = url('admin/photo/'.$id);
            $data['method'] = "put";

          return view('admin.photo.edit', $data);
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

      $image = $request->file('image');
      $gallary = $request['option'];
      //dd($gallary);
      $this->validate($request, [
           'pro_name' => 'required',
           'pro_category' => 'required',
           'pro_status_show' => 'required',
           'pro_price' => 'required',
           'pro_title' => 'required',
           'pro_name_detail' => 'required'
       ]);

      if($image == null){
        //dd($image);

        $package = product::find($id);
        $package->pro_name = $request['pro_name'];
        $package->pro_title = $request['pro_title'];
        $package->pro_name_detail = $request['pro_name_detail'];
        $package->pro_category = $request['pro_category'];
        $package->pro_price = $request['pro_price'];
        $package->pro_status_show = $request['pro_status_show'];
        $package->save();

      //  DB::table('product_items')->where('product_set_id', $id)->delete();
        //dd($image);

          DB::table('product_items')->where('product_set_id', $id)->delete();

        if($gallary != null){

        //  dd($gallary);
          if (sizeof($gallary) > 0) {
             for ($i = 0; $i < sizeof($gallary); $i++) {
               $admins[] = [
                   'option_set_id' => $gallary[$i],
                   'product_set_id' => $id
               ];
             }
             product_item::insert($admins);
           }

        }



      //   dd($objs2);
      }else{

        $objs = DB::table('products')
        ->select(
           'products.*'
           )
        ->where('id', $id)
        ->first();

        $file_path = 'assets/image/product/'.$objs->pro_image;
        unlink($file_path);


        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

       $destinationPath = asset('assets/image/product/');
       $img = Image::make($image->getRealPath());
       $img->resize(800, 533, function ($constraint) {
       $constraint->aspectRatio();
       })->save('assets/image/product/'.$input['imagename']);



        $package = product::find($id);
        $package->pro_name = $request['pro_name'];
        $package->pro_title = $request['pro_title'];
        $package->pro_name_detail = $request['pro_name_detail'];
        $package->pro_category = $request['pro_category'];
        $package->pro_price = $request['pro_price'];
        $package->pro_image = $input['imagename'];
        $package->pro_status_show = $request['pro_status_show'];
        $package->save();

        $objs = DB::table('product_items')
        ->select(
           'product_items.*'
           )
        ->where('product_set_id', $id)
        ->delete();

        if($gallary != null){
        if (sizeof($gallary) > 0) {
           for ($i = 0; $i < sizeof($gallary); $i++) {
             $admins[] = [
                 'option_set_id' => $gallary[$i],
                 'product_set_id' => $id
             ];
           }
           product_item::insert($admins);
         }
       }

      }


      return redirect(url('admin/photo/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
  }

  public function property_image_del(Request $request){

    $gallary = $request->get('product_image');
    $pro_id = $request['pro_id'];

    if (sizeof($gallary) > 0) {

     for ($i = 0; $i < sizeof($gallary); $i++) {

       $objs = DB::table('galleries')
         ->where('id', $gallary[$i])
         ->first();

         $file_path = 'assets/image/gallery/'.$objs->image;
         unlink($file_path);

         DB::table('galleries')->where('id', $objs->id)->delete();

     }


    }
    //dd($objs);
    return redirect(url('admin/photo/'.$pro_id.'/edit'))->with('del_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

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


  public function api_post_status(Request $request){

  $user = product::findOrFail($request->user_id);

            if($user->pro_status == 1){
                $user->pro_status = 0;
            } else {
                $user->pro_status = 1;
            }


    return response()->json([
    'data' => [
      'success' => $user->save(),
    ]
  ]);

  }
}

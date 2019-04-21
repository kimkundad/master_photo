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
use App\option_item;

class ProductController extends Controller
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
              ->paginate(15);


        $data['objs'] = $cat;
        $data['datahead'] = "สินค้าทั้งหมด";

        return view('admin.product.index', $data);
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
        $data['url'] = url('admin/product');
        $data['datahead'] = "สร้างสินค้า";
        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function product_option($id){

       $option_product = DB::table('product_items')->select(
           'product_items.*'
           )
           ->where('product_set_id', $id)
           ->orderBy('sort_no')
           ->get();

           foreach ($option_product as $objd) {

       $options = DB::table('option_products')
           ->where('id', $objd->option_set_id)
           ->first();




         $option_data_item = DB::table('option_items')->select(
             'option_items.*',
             'option_items.id as id_item'
             )
             ->where('item_option_id', $options->id)
             ->get();

             $options->opt = $option_data_item;



         $objd->options_detail = $options;


     }

    //  dd($option_product);
       $data['get_option_main'] = $option_product;



       $option_product = option_product::all();
       $data['option_product'] = $option_product;
       $data['product_id'] = $id;
       $data['method'] = "post";
       $data['url'] = url('admin/product');
       $data['datahead'] = "สร้าง Option สินค้า";
       return view('admin.product.product_option', $data);

     }


     public function updatesort_video(Request $request, $id)
    {
      $sort_order = $request['sort_order'];



         // dd($sort_order);
          $sort_order = json_decode($sort_order,true);
         // dd($sort_order);
        //  return redirect(url('admin/category'))->with('edit','Edit successful');

          foreach($sort_order as $index=>$ids) {
         // $ids = (int) $ids;

         $obj = DB::table('product_items')
          ->select(
          'product_items.*'
          )
          ->where('id', $ids['id'])
          ->where('product_set_id', $id)
          ->update(array('sort_no' => ($index + 1) ));

         // echo $ids['id'];
  }

  return redirect(url('admin/product_option/'.$id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');


}

    public function add_option_product_item_inpro(Request $request){

      $product_id = $request['product_id'];


      $this->validate($request, [
       'item_name' => 'required',
       'option_id' => 'required',
       'item_price' => 'required'
      ]);

      $image = $request->file('image_main');
      //dd($image);
      if($image == null){
        $package = new option_item();
        $package->item_name = $request['item_name'];
        $package->item_price = $request['item_price'];
        $package->resolution = $request['resolution'];
        $package->item_option_id = $request['option_id'];
        $package->save();
      }else{

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = asset('assets/image/option/');
          $img = Image::make($image->getRealPath());
          $img->resize(400, 350, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/image/option/'.$input['imagename']);

        $package = new option_item();
        $package->item_name = $request['item_name'];
        $package->item_price = $request['item_price'];
        $package->item_option_id = $request['option_id'];
        $package->resolution = $request['resolution'];
        $package->item_image = $input['imagename'];
        $package->save();

      }



      return redirect(url('admin/product_option/'.$product_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function edit_option_product_item_inpro(Request $request){


      $this->validate($request, [
       'option_name' => 'required'
      ]);

      $product_id = $request['product_id'];
      $option_id = $request['option_id'];

      $image = $request->file('image_main');
      //dd($image);
      if($image == null){

        $package = option_product::find($option_id);
        $package->option_name = $request['option_name'];
        $package->option_type = $request['option_type'];
        $package->option_detail = $request['option_detail'];
        $package->save();

      }else{


        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = asset('assets/image/product/');
        $img = Image::make($image->getRealPath());
        $img->resize(800, 533, function ($constraint) {
        $constraint->aspectRatio();
        })->save('assets/image/product/'.$input['imagename']);

        $package = option_product::find($option_id);
        $package->option_name = $request['option_name'];
        $package->option_title = $input['imagename'];
        $package->option_type = $request['option_type'];
        $package->option_detail = $request['option_detail'];
        $package->save();

      }




      return redirect(url('admin/product_option/'.$product_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }


    public function edit_item_only(Request $request, $id){

      $product_id = $request['product_id'];

      $image = $request->file('image_main');
      //dd($image);
      if($image == null){

        $package = option_item::find($id);
        $package->item_name = $request['item_name'];
        $package->item_price = $request['item_price'];
        $package->item_option_id = $request['option_id'];
        $package->resolution = $request['resolution'];
        $package->save();

      }else{

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = asset('assets/image/option/');
          $img = Image::make($image->getRealPath());
          $img->resize(400, 350, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/image/option/'.$input['imagename']);

        $package = option_item::find($id);
        $package->item_name = $request['item_name'];
        $package->item_price = $request['item_price'];
        $package->item_option_id = $request['option_id'];
        $package->resolution = $request['resolution'];
        $package->item_image = $input['imagename'];
        $package->save();

      }



      return redirect(url('admin/product_option/'.$product_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function del_item_on(Request $request, $id){

      $product_id = $request['product_id'];


      DB::table('option_items')
      ->where('id', $id)
      ->delete();

      return redirect(url('admin/product_option/'.$product_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function delete_option_product_item_inpro(Request $request){

      $product_id = $request['product_id'];
      $option_id = $request['option_id'];

      DB::table('product_items')
      ->where('option_set_id', $option_id)
      ->delete();

      DB::table('option_items')
      ->where('item_option_id', $option_id)
      ->delete();

      DB::table('option_products')
      ->where('id', $option_id)
      ->delete();

      return redirect(url('admin/product_option/'.$product_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


     public function add_product_option_sub(Request $request){

       $product_id = $request['product_id'];


       $image = $request->file('image_main');
       //dd($image);
       if($image == null){

       $package = new option_product();
       $package->option_name = $request['option_name'];
       $package->option_type = $request['option_type'];
       $package->option_detail = $request['option_detail'];
       $package->save();
       }else{

       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

       $destinationPath = asset('assets/image/product/');
       $img = Image::make($image->getRealPath());
       $img->resize(800, 533, function ($constraint) {
       $constraint->aspectRatio();
       })->save('assets/image/product/'.$input['imagename']);

       $package = new option_product();
       $package->option_name = $request['option_name'];
       $package->option_title = $input['imagename'];
       $package->option_type = $request['option_type'];
       $package->option_detail = $request['option_detail'];
       $package->save();

     }

       $the_id = $package->id;

       $obj = new product_item();
       $obj->option_set_id = $the_id;
       $obj->product_set_id = $product_id;
       $obj->save();

    //   dd($product_id);


       return redirect(url('admin/product_option/'.$product_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
     }


    public function store(Request $request)
    {
        //
        $image = $request->file('image');
        $this->validate($request, [
             'image' => 'required|max:8048',
             'pro_name' => 'required',
             'pro_category' => 'required',
             'pro_status_show' => 'required'
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
       $package->set_limit = 1;
    /* $package->a_price_o = $request['a_price_o'];
       $package->b_price_o = $request['b_price_o']; */
       $package->pro_price = 0;
       $package->pro_image = $input['imagename'];
       $package->pro_status_show = $request['pro_status_show'];
       $package->save();

       $the_id = $package->id;


       /* 'option' => 'required',
        'set_limit' => 'required',
        'a_price_o' => 'required',
        'b_price_o' => 'required', */

    /*   $gallary = $request['option'];


       if (sizeof($gallary) > 0) {
          for ($i = 0; $i < sizeof($gallary); $i++) {
            $admins[] = [
                'option_set_id' => $gallary[$i],
                'product_set_id' => $the_id
            ];
          }
          product_item::insert($admins);
        }
 */

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

        return redirect(url('admin/product_option/'.$request['pro_id']))->with('add_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

    }


    public function add_gallery2(Request $request){


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


        return redirect(url('admin/product/'.$request['pro_id'].'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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

            $data['option_product'] = $option_product;
            $sub_category = sub_category::all();
            $data['category'] = $sub_category;
            $data['img_all'] = $img_all;
            $data['option_product'] = $option_product;

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
              $data['url'] = url('admin/product/'.$id);
              $data['method'] = "put";

            return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function product_price(Request $request, $id){

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
        $data['datahead'] = "เพิ่มราคาค่าขนส่ง";
      return view('admin.product.product_price', $data);
    }
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
             'pro_title' => 'required',
             'set_limit' => 'required',
             'a_price_o' => 'required',
             'b_price_o' => 'required',
             'pro_name_detail' => 'required'
         ]);

         if($request['set_limit'] == 0){
           $set_limit = 1;
         }else{
           $set_limit = $request['set_limit'];
         }

        if($image == null){
          //dd($image);

          $package = product::find($id);
          $package->pro_name = $request['pro_name'];
          $package->pro_title = $request['pro_title'];
          $package->pro_name_detail = $request['pro_name_detail'];
          $package->pro_category = $request['pro_category'];
          $package->set_limit = $set_limit;
          $package->a_price_o = $request['a_price_o'];
          $package->b_price_o = $request['b_price_o'];
          $package->pro_price = 0;
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
          $package->pro_price = 0;
          $package->pro_image = $input['imagename'];
          $package->pro_status_show = $request['pro_status_show'];
          $package->save();

          $objs = DB::table('product_items')
          ->select(
             'product_items.*'
             )
          ->where('product_set_id', $id)
          ->delete();

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


        return redirect(url('admin/product/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }


    public function add_price_product(Request $request, $id){

      if($request['set_limit'] == 0){
        $set_limit = 1;
      }else{
        $set_limit = $request['set_limit'];
      }



      $package = product::find($id);
      $package->set_limit = $set_limit;
      $package->a_price_o = $request['a_price_o'];
      $package->b_price_o = $request['b_price_o'];
      $package->pro_price = 0;
      $package->save();

      return redirect(url('admin/product/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
      return redirect(url('admin/product/'.$pro_id.'/edit'))->with('del_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

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
        $image_all =   $objs = DB::table('galleries')
            ->select(
               'galleries.*'
               )
            ->where('pro_id', $id)
            ->get();

          //  dd($image_all);
        if($image_all != null){
          foreach ($image_all as $u) {
          DB::table('galleries')->where('id', $u->id)->delete();
          $file_path = 'assets/image/gallery/'.$u->image;
          unlink($file_path);
        }
        }



        $data_product = DB::table('products')
        ->where('id', $id)
        ->first();

        $file_path = 'assets/image/product/'.$data_product->pro_image;
        unlink($file_path);


        DB::table('products')
        ->where('id', $id)
        ->delete();

        DB::table('product_items')
        ->where('product_set_id', $id)
        ->delete();

        return redirect(url('admin/product/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');

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

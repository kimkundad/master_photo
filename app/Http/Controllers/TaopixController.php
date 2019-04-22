<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\sub_category;
use App\product;
use App\taopix;

class TaopixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $taopix = DB::table('taopixes')->select(
              'taopixes.*',
              'taopixes.id as id_q',
              'taopixes.created_at as create',
              'products.*',
              'themepros.*',
              'sub_categories.*'
              )
              ->leftjoin('products', 'products.id',  'taopixes.pro_id')
              ->leftjoin('themepros', 'themepros.id',  'taopixes.themes_id')
              ->leftjoin('sub_categories', 'sub_categories.id',  'products.pro_category')
              ->get();


        //
        $data['taopix'] = $taopix;

        $sub_category = sub_category::all();
        //
        $data['sub_cat'] = $sub_category;

        $data['datahead'] = "Taopix";
        return view('admin.taopix.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $product = product::all();
        $data['product'] = $product;
        $data['method'] = "post";
        $data['url'] = url('admin/taopix');
        $data['datahead'] = "สร้าง Taopix";
        return view('admin.taopix.create', $data);
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

        $this->validate($request, [
             'taopix_name' => 'required',
             'pro_id' => 'required',
             'url_taopix' => 'required'
         ]);

         $package = new taopix();
         $package->taopix_name = $request['taopix_name'];
         $package->pro_id = $request['pro_id'];
         $package->note = $request['note'];
         $package->url_taopix = $request['url_taopix'];
         $package->taopix_status = 0;
         $package->save();

         $the_id = $package->id;


         return redirect(url('admin/taopix_theme/'.$the_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function add_taopix_theme(Request $request){

      $this->validate($request, [
           'themes_id' => 'required'
       ]);

      $taopix_id = $request['taopix_id'];
      $pro_id = $request['pro_id'];

      $package = taopix::find($taopix_id);
      $package->themes_id = $request['themes_id'];
      $package->save();

      return redirect(url('admin/taopix_option/'.$taopix_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function add_taopix_option(Request $request){

      $this->validate($request, [
           'option_id' => 'required'
       ]);



       $get_text = "";
       $taopix_id = $request['taopix_id'];


       $get_data = DB::table('taopixes')
           ->where('id', $request['taopix_id'])
           ->first();



       $get_text.=$request['pro_id'].",";
       $get_text.=$get_data->themes_id;

       $option_id = $request['option_id'];
       for ($i = 0; $i < sizeof($option_id); $i++) {
         $get_text.= ",".$option_id[$i];
       }
       //dd($get_text);

       $package = taopix::find($taopix_id);
       $package->arrays_data = $get_text;
       $package->save();

       return redirect(url('admin/taopix/'.$taopix_id.'/edit'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    public function taopix_option($id)
    {

      $get_data = DB::table('taopixes')
          ->where('id', $id)
          ->first();


      $option_count = DB::table('product_items')->select(
          'product_items.*'
          )
          ->where('product_set_id', $get_data->pro_id)
          ->count();

      $option_product = DB::table('product_items')->select(
          'product_items.*'
          )
          ->where('product_set_id', $get_data->pro_id)
          ->get();

          if($option_count > 0){

            foreach ($option_product as $objd) {

        $options = DB::table('option_products')
            ->where('id', $objd->option_set_id)
            ->first();

          $option_data_item = DB::table('option_items')->select(
              'option_items.*',
              'option_items.id as id_d'
              )
              ->where('item_option_id', $options->id)
              ->get();
              $options->opt = $option_data_item;
          $objd->options_detail = $options;
      }

          }

        //  dd($option_product);

        $data['option_product'] = $option_product;


      $data['get_data'] = $get_data;

      $data['datahead'] = "Taopix เลือก Option";
      return view('admin.taopix.options', $data);
    }


    public function edit_taopix_option($id){

    //  dd($id);

      $get_data = DB::table('taopixes')
          ->where('id', $id)
          ->first();


          //$get_data->arrays_data;
          $exp = array();
          $path1 = explode(",", $get_data->arrays_data);
          $exp = array_merge($exp, $path1);

          //dd($exp);


      $option_count = DB::table('product_items')->select(
          'product_items.*'
          )
          ->where('product_set_id', $get_data->pro_id)
          ->count();

      $option_product = DB::table('product_items')->select(
          'product_items.*'
          )
          ->where('product_set_id', $get_data->pro_id)
          ->get();

          if($option_count > 0){

            foreach ($option_product as $objd) {

        $options = DB::table('option_products')
            ->where('id', $objd->option_set_id)
            ->first();

          $option_data_item = DB::table('option_items')->select(
              'option_items.*',
              'option_items.id as id_d'
              )
              ->where('item_option_id', $options->id)
              ->get();
              $options->opt = $option_data_item;
          $objd->options_detail = $options;
      }

          }

        //  dd($get_data);

        $data['option_product'] = $option_product;

      $s = 2;
      $data['exp'] = $exp;
      $data['s'] = $s;
      $data['get_data'] = $get_data;

      $data['datahead'] = "Taopix เลือก Option";
      return view('admin.taopix.editoption', $data);

    }


    public function edit_taopix_theme($id){

      $get_data = DB::table('taopixes')
          ->where('id', $id)
          ->first();


          //$get_data->arrays_data;
          $exp = array();
          $path1 = explode(",", $get_data->arrays_data);
          $exp = array_merge($exp, $path1);

          $s = 1;

          if($exp != null){
            $data['exp'] = $exp;
          }else{
            $data['exp'] = null;
          }

          //$data['exp'] = $exp;
          $data['s'] = $s;


          $get_data = DB::table('taopixes')
              ->where('id', $id)
              ->first();

          $get_theme = DB::table('themepros')
              ->where('pro_id', $get_data->pro_id)
              ->get();

              $data['get_theme'] = $get_theme;
              $data['taopix_id'] = $get_data->id;
              $data['pro_id'] = $get_data->pro_id;
              $data['get_data'] = $get_data;

              $data['datahead'] = "Taopix เลือก Themes";
              return view('admin.taopix.editthemes', $data);

    }

    public function taopix_theme($id)
    {
        //

        $get_data = DB::table('taopixes')
            ->where('id', $id)
            ->first();

        $get_theme = DB::table('themepros')
            ->where('pro_id', $get_data->pro_id)
            ->get();

            $data['get_theme'] = $get_theme;
            $data['taopix_id'] = $get_data->id;
            $data['pro_id'] = $get_data->pro_id;

            $data['datahead'] = "Taopix เลือก Themes";
            return view('admin.taopix.themes', $data);

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

        $product = product::all();
        $data['product'] = $product;

        $cat = DB::table('taopixes')->select(
          'taopixes.*',
          'taopixes.id as id_q',
          'taopixes.created_at as create',
          'products.*'
          )
          ->leftjoin('products', 'products.id',  'taopixes.pro_id')
          ->where('taopixes.id', $id)
          ->first();

        $data['objs'] = $cat;
        $data['datahead'] = "แก้ไขข้อมูล Taopix";
        $data['url'] = url('admin/taopix/'.$id);
        $data['method'] = "put";

      return view('admin.taopix.edit', $data);
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
             'taopix_name' => 'required',
             'pro_id' => 'required',
             'url_taopix' => 'required'
         ]);

        $package = taopix::find($id);
        $package->taopix_name = $request['taopix_name'];
        $package->pro_id = $request['pro_id'];
        $package->note = $request['note'];
        $package->url_taopix = $request['url_taopix'];
        $package->save();

        return redirect(url('admin/taopix/'.$id.'/edit'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
        $obj = taopix::find($id);
        $obj->delete();
        return redirect(url('admin/taopix/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}

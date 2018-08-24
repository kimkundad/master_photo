<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\option_product;
use App\option_item;

class OptionProController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('option_products')->select(
              'option_products.*',
              'option_products.id as id_o'
              )
              ->get();
              $s = 1;
              $data['s'] = $s;
              $data['objs'] = $cat;
              $data['datahead'] = "จัดการ Option product";


      return view('admin.option_product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/option_product');
        $data['datahead'] = "สร้าง Option";
        return view('admin.option_product.create', $data);
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
         'option_name' => 'required',
         'option_title' => 'required',
         'option_type' => 'required'
        ]);


        $package = new option_product();
        $package->option_name = $request['option_name'];
        $package->option_title = $request['option_title'];
        $package->option_type = $request['option_type'];
        $package->save();

        $the_id = $package->id;

        return redirect(url('admin/option_product/'.$the_id.'/edit'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $option_set = DB::table('option_items')->select(
            'option_items.*'
            )
            ->where('item_option_id', $id)
            ->get();

        $obj = option_product::find($id);
        $data['url'] = url('admin/option_product/'.$id);
        $data['datahead'] = "แก้ไข option";
        $data['method'] = "put";
        $data['objs'] = $obj;
        $data['option_set'] = $option_set;
        return view('admin.option_product.edit', $data);
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
         'option_name' => 'required',
         'option_title' => 'required',
         'option_type' => 'required'
        ]);

         $package = option_product::find($id);
         $package->option_name = $request['option_name'];
         $package->option_title = $request['option_title'];
         $package->option_type = $request['option_type'];
         $package->save();

        return redirect(url('admin/option_product/'.$id.'/edit'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }


    public function option_product_item_edit(Request $request, $id){

      $image = $request->file('image');

      $this->validate($request, [
       'item_name' => 'required',
       'option_id' => 'required',
       'item_price' => 'required'
      ]);

      if($image == NULL){

        $package = option_item::find($id);
        $package->item_name = $request['item_name'];
        $package->item_price = $request['item_price'];
        $package->item_option_id = $request['option_id'];
        $package->save();

        $the_id = $request['option_id'];

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
        $package->item_image = $input['imagename'];
        $package->save();

        $the_id = $request['option_id'];
      }




      return redirect(url('admin/option_product/'.$the_id.'/edit'))->with('add_item_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }



    public function option_product_item_del(Request $request, $id)
    {
      $this->validate($request, [
       'option_id' => 'required'
      ]);

      $the_id = $request['option_id'];

      $obj = option_item::find($id);
      $obj->delete();
      return redirect(url('admin/option_product/'.$the_id.'/edit'))->with('del_item_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }


    public function option_product_item(Request $request)
    {

      $image = $request->file('image');

      $this->validate($request, [
       'item_name' => 'required',
       'option_id' => 'required',
       'item_price' => 'required'
      ]);

      if($image == NULL){

        $package = new option_item();
        $package->item_name = $request['item_name'];
        $package->item_price = $request['item_price'];
        $package->item_option_id = $request['option_id'];
        $package->save();

        $the_id = $request['option_id'];

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
        $package->item_image = $input['imagename'];
        $package->save();

        $the_id = $request['option_id'];
      }




      return redirect(url('admin/option_product/'.$the_id.'/edit'))->with('add_item_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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

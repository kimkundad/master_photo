<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\product;
use App\themepro;

class ThemeproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('themepros')->select(
              'themepros.*',
              'themepros.id as id_c',
              'themepros.created_at as create',
              'products.*'
              )
              ->leftjoin('products', 'products.id',  'themepros.pro_id')
              ->get();

              foreach($cat as $u){

                $count_t = DB::table('themepros')
                      ->where('id', $u->id_c)
                      ->count();

                      $u->option = $count_t;

              }

            //  dd($cat);

        $data['objs'] = $cat;
        $data['datahead'] = "จัดการ themes ทั้งหมด";

        return view('admin.themes.index', $data);
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
        $data['category'] = $product;
        $data['method'] = "post";
        $data['url'] = url('admin/themes');
        $data['header'] = "สร้าง themes";
        return view('admin.themes.create', $data);
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
             'themepro_name' => 'required',
             'pro_id' => 'required',
             'themepro_detail' => 'required',
             'themepros_price' => 'required'
         ]);

         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = asset('assets/image/themepro_image/');
        $img = Image::make($image->getRealPath());
        $img->resize(800, 533, function ($constraint) {
        $constraint->aspectRatio();
      })->save('assets/image/themepro_image/'.$input['imagename']);


       $package = new themepro();
       $package->pro_id = $request['pro_id'];
       $package->themepro_name = $request['themepro_name'];
       $package->themepro_detail = $request['themepro_detail'];
       $package->themepros_price = $request['themepros_price'];
       $package->themepro_image = $input['imagename'];
       $package->save();

         return redirect(url('admin/themes'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

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
        $product = product::all();
        $data['category'] = $product;
        $obj = themepro::find($id);
        $data['url'] = url('admin/themes/'.$id);
        $data['header'] = "แก้ไข themes";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.themes.edit', $data);
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
        $this->validate($request, [
             'themepro_name' => 'required',
             'pro_id' => 'required',
             'themepro_detail' => 'required',
             'themepros_price' => 'required'
         ]);

         if($image == null){

           $package = themepro::find($id);
           $package->pro_id = $request['pro_id'];
           $package->themepro_name = $request['themepro_name'];
           $package->themepro_detail = $request['themepro_detail'];
           $package->themepros_price = $request['themepros_price'];
           $package->save();


           return redirect(url('admin/themes/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

         }else{


           $objs = DB::table('themepros')
           ->select(
              'themepros.*'
              )
           ->where('id', $id)
           ->first();

           $file_path = 'assets/image/themepro_image/'.$objs->themepro_image;
           unlink($file_path);


           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/image/themepro_image/');
          $img = Image::make($image->getRealPath());
          $img->resize(800, 533, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/image/themepro_image/'.$input['imagename']);


         $package = themepro::find($id);
         $package->pro_id = $request['pro_id'];
         $package->themepro_name = $request['themepro_name'];
         $package->themepro_detail = $request['themepro_detail'];
         $package->themepros_price = $request['themepros_price'];
         $package->themepro_image = $input['imagename'];
         $package->save();


           return redirect(url('admin/themes/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $objs = DB::table('themepros')
      ->select(
         'themepros.*'
         )
      ->where('id', $id)
      ->first();

      $file_path = 'assets/image/themepro_image/'.$objs->themepro_image;
      unlink($file_path);


      $obj = themepro::find($id);
      $obj->delete();
      return redirect(url('admin/themes/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');


        //
    }







}

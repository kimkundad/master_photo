<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\sub_category;
use App\category;
use App\product;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class Sub_categoryController extends Controller
{
    //
    public function index()
    {


      $cat = DB::table('sub_categories')->select(
            'sub_categories.*',
            'sub_categories.id as id_sub',
            'categories.*',
            'categories.id as id_cat'
            )
            ->leftjoin('categories', 'categories.id',  'sub_categories.sub_category')
            ->get();

            $s = 1;
            foreach ($cat as $obj) {
                $optionsRes = [];


                $options = DB::table('products')->select(
                  'products.*'
                  )
                  ->where('products.pro_category', $obj->id_sub)
                  ->count();

                     $optionsRes['count'] = $options;

                $obj->options = $options;
              }
              //dd($cat);
              $s = 1;
              $data['s'] = $s;
              $data['objs'] = $cat;
              $data['datahead'] = "จัดการหมวดหมู่ย่อย";


      return view('admin.sub_category.index', $data);
    }


    public function create()
    {

      $category = category::all();
      $data['category'] = $category;
      $data['method'] = "post";
      $data['url'] = url('admin/sub_category');
      $data['datahead'] = "สร้างหมวดหมู่ย่อย ";
      return view('admin.sub_category.create', $data);
    }


    public function store(Request $request)
    {
      $this->validate($request, [
       'name_cat' => 'required',
       'cat_id' => 'required'
      ]);

      $package = new sub_category();
      $package->sub_name = $request['name_cat'];
      $package->sub_category = $request['cat_id'];
      $package->save();

      return redirect(url('admin/sub_category'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }

    public function edit($id)
    {
      $category = category::all();
      $data['category'] = $category;
      $obj = sub_category::find($id);
      $data['url'] = url('admin/sub_category/'.$id);
      $data['datahead'] = "แก้ไขหมวดหมู่ย่อย";
      $data['method'] = "put";
      $data['objs'] = $obj;
      return view('admin.sub_category.edit', $data);
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
       'name_cat' => 'required',
       'cat_id' => 'required'
      ]);

       $package = sub_category::find($id);
       $package->sub_name = $request['name_cat'];
       $package->sub_category = $request['cat_id'];
       $package->save();

    return redirect(url('admin/sub_category/'.$id.'/edit'))->with('edit_success','แก้ไขหมวดหมู่ ');
    }


    public function destroy($id)
    {
        //
        $objs = DB::table('products')
            ->where('pro_category', $id)
            ->count();

            if($objs > 0){
              DB::table('products')
                ->where('pro_category', $id)
                ->update(['pro_category' => 0]);
            }

      $obj = sub_category::find($id);
      $obj->delete();
      return redirect(url('admin/sub_category/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');

    }



}

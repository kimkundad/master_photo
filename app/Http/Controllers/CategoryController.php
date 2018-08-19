<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\category;
use App\product;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      $cat = DB::table('categories')->select(
            'categories.*',
            'categories.id as id_c'
            )
            ->get();

            $s = 1;
            foreach ($cat as $obj) {
                $optionsRes = [];
                $options = DB::table('sub_categories')->select(
                  'sub_categories.*'
                  )
                  ->where('sub_categories.sub_category', $obj->id)
                  ->count();

                     $optionsRes['count'] = $options;

                $obj->options = $options;
              }
              //dd($cat);
              $s = 1;
              $data['s'] = $s;
              $data['objs'] = $cat;
              $data['datahead'] = "จัดการหมวดหมู่";


      return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $data['method'] = "post";
      $data['url'] = url('admin/category');
      $data['datahead'] = "สร้างหมวดหมู่ ";
      return view('admin.category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
       'name_cat' => 'required'
      ]);


      $package = new category();
      $package->name_cat = $request['name_cat'];
      $package->save();
      return redirect(url('admin/category'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $obj = category::find($id);

        $cat = DB::table('products')->select(
              'products.*',
              'products.id as id_q',
              'products.created_at as create',
              'categories.*'
              )
              ->leftjoin('categories', 'categories.id',  'products.pro_category')
              ->where('products.cat_id', $id)
              ->get();


                $data['objs'] = $cat;
                $data['datahead'] = "รายการ รถเช่า ทั้งหมดของ".$obj->name_cat;


        return view('admin.category.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


      $obj = category::find($id);
      $data['url'] = url('admin/category/'.$id);
      $data['datahead'] = "แก้ไขหมวดหมู่";
      $data['method'] = "put";
      $data['objs'] = $obj;
      return view('admin.category.edit', $data);
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
      $this->validate($request, [
         'name_cat' => 'required'
     ]);

     $package = category::find($id);
      $package->name_cat = $request['name_cat'];
      $package->save();

    return redirect(url('admin/category/'.$id.'/edit'))->with('edit_success','แก้ไขหมวดหมู่ ');
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
        $objs = DB::table('sub_categories')
            ->where('sub_category', $id)
            ->count();

            if($objs > 0){
              DB::table('sub_categories')
                ->where('sub_category', $id)
                ->update(['sub_category' => 0]);
            }

      $obj = category::find($id);
      $obj->delete();
      return redirect(url('admin/category/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');

    }
}

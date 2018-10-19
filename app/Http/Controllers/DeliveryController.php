<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\delivery;
use App\order;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = delivery::all();
        $data['objs'] = $objs;
        $data['datahead'] = "ช่องทางการส่งสินค้า";


return view('admin.delivery.index', $data);
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
        $data['url'] = url('admin/delivery');
        $data['datahead'] = "สร้างช่องทางการส่งสินค้า";
        return view('admin.delivery.create', $data);
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
         'name' => 'required'
        ]);


        $package = new delivery();
        $package->name = $request['name'];
        $package->save();
        return redirect(url('admin/delivery'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

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
        $obj = delivery::find($id);
        $data['url'] = url('admin/delivery/'.$id);
        $data['datahead'] = "แก้ไขช่องทางการส่งสินค้า";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.delivery.edit', $data);
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
           'name' => 'required'
       ]);

        $package = delivery::find($id);
        $package->name = $request['name'];
        $package->save();

      return redirect(url('admin/delivery/'.$id.'/edit'))->with('edit_success','แก้ไขหมวดหมู่ ');
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
        $obj = delivery::find($id);
        $obj->delete();
        return redirect(url('admin/delivery/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}

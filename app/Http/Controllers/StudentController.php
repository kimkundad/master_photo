<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\user_address;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $objs = DB::table('users')
          ->select(
          'users.*'
          )
          ->where('id', '!=', 1)
          ->get();

        $data['objs'] = $objs;
        $data['datahead'] = "รายชื่อลูกค้า";
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



    }



    public function new_user_address($id){

      $objs = DB::table('users')
          ->select(
          'users.*'
          )
          ->where('id', $id)
          ->first();


      $data['objs'] = $objs;

      $data['header'] = "เพิ่มที่อยู่ใหม่";
      return view('admin.user.new_address', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    public function delete_user_address(Request $request){

      $id = $request['address_id'];
      $user_id = $request['user_id'];

    //  dd($user_id);

      $obj = user_address::find($id);
      $obj->delete();

      return redirect(url('admin/user/'.$user_id))->with('delete','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    public function post_edit_address(Request $request)
    {

      $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province' => 'required',
            'amphur' => 'required',
            'district' => 'required',
            'postcode' => 'required'
      ]);

      $id = $request['address_id'];

      $package = user_address::find($id);
      $package->name_ad = $request['name'];
      $package->phone_ad = $request['phone'];
      $package->address_ad = $request['address'];
      $package->province = $request['province'];
      $package->district = $request['amphur'];

      $package->sub_district = $request['district'];
      $package->zip_code = $request['postcode'];
      $package->type_address = $request['type_ad'];
      $package->save();
      return redirect(url('admin/edit_user_address/'.$id))->with('edit_address','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }


    public function edit_user_address($id){

      $package = user_address::find($id);

      $objs = DB::table('users')
          ->select(
          'users.*'
          )
          ->where('id', $package->user_id)
          ->first();


         $province = DB::table('province')
              ->select(
              'province.*'
              )
              ->where('PROVINCE_ID', $package->province)
              ->first();
          $data['province'] = $province;


          $district = DB::table('amphur')
               ->select(
               'amphur.*'
               )
               ->where('AMPHUR_ID', $package->district)
               ->first();
           $data['district'] = $district;


           $subdistricts = DB::table('district')
                ->select(
                'district.*'
                )
                ->where('DISTRICT_ID', $package->sub_district)
                ->first();
            $data['subdistricts'] = $subdistricts;



      $data['package'] = $package;
      $data['objs'] = $objs;

      $data['header'] = "แก้ไขที่อยู่";
      return view('admin.user.edit_address', $data);

    }


    public function post_new_address(Request $request){

      $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province' => 'required',
            'amphur' => 'required',
            'district' => 'required',
            'postcode' => 'required'
      ]);

      $user_id = $request['user_id'];

      $package = new user_address();
      $package->name_ad = $request['name'];
      $package->user_id = $request['user_id'];
      $package->phone_ad = $request['phone'];
      $package->address_ad = $request['address'];
      $package->province = $request['province'];
      $package->district = $request['amphur'];

      $package->sub_district = $request['district'];
      $package->zip_code = $request['postcode'];
      $package->type_address = $request['type_ad'];
      $package->save();
      return redirect(url('admin/user/'.$user_id))->with('add_address','เพิ่ม เสร็จเรียบร้อยแล้ว');



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
        $cat = DB::table('users')
            ->select(
            'users.*'
            )
            ->where('id', $id)
            ->first();


            $order = DB::table('orders')
                ->select(
                'orders.*'
                )
                ->where('user_id', $id)
                ->get();

                foreach($order as $u){

                  $order = DB::table('orders')
                      ->select(
                      'orders.*'
                      )
                      ->where('user_id', $id)
                      ->get();

                }



        $data['order'] = $order;
        $data['objs'] = $cat;


        $address = DB::table('user_addresses')
            ->select(
            'user_addresses.*'
            )
            ->where('user_id', $id)
            ->get();

        $data['address'] = $address;

        $data['header'] = "ข้อมูลส่วนตัว";


        return view('admin.user.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $cat = DB::table('users')
          ->select(
          'users.*'
          )
          ->where('id', $id)
          ->first();


      $data['url'] = url('admin/user/'.$id);
        $data['header'] = "แก้ไขข้อมูลส่วนตัว";
        $data['method'] = "put";

        $data['objs'] = $cat;
        return view('admin.user.edit', $data);

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
            'name' => 'required',
            'email' => 'required'
      ]);

      $email = $request['email'];

      $check_email = DB::table('users')
          ->select(
          'users.*'
          )
          ->where('id', '!=', $id)
          ->where('email', $email)
          ->count();

        //  dd($check_email);

      if($check_email > 0){

        return redirect(url('admin/user/'.$id.'/edit'))->with('error','Edit successful');

      }else{

        $package = User::find($id);
        $package->name = $request['name'];
        $package->email = $request['email'];
        $package->phone = $request['phone'];
        $package->id_card_no = $request['id_card_no'];
        $package->branch_code = $request['branch_code'];
        $package->save();

      return redirect(url('admin/user/'.$id.'/edit'))->with('edit_success','Edit successful');

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

    }
}

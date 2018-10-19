<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Response;
use Session;
use Auth;
use App\User;
use App\order;
use App\order_detail;
use App\order_image;
use App\category;
use App\user_address;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class UserProfileController extends Controller
{
    //


    public function post_edit_profile(Request $request){

      $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
      ]);

      $email = $request['email'];
      $id = $request['user_id'];

      $check_email = DB::table('users')
          ->select(
          'users.*'
          )
          ->where('id', '!=', $id)
          ->where('email', $email)
          ->count();

        //  dd($check_email);

      if($check_email > 0){

        return redirect(url('profile/'.$id.'/edit'))->with('error','Edit successful');

      }else{

        $package = User::find($id);
        $package->name = $request['name'];
        $package->email = $request['email'];
        $package->phone = $request['phone'];
        $package->id_card_no = $request['id_card_no'];
        $package->branch_code = $request['branch_code'];
        $package->save();

      return redirect(url('profile/'.$id.'/edit'))->with('edit_success','Edit successful');

      }

    }



    public function post_edit_address_book(Request $request){

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

      if($request['type_ad'] == 3){
        DB::table('user_addresses')
        ->where('user_id', Auth::user()->id)
        ->where('id', '!=', $id)
        ->update(array('type_address' => 2));
      }elseif($request['type_ad'] == 1){



        DB::table('user_addresses')
        ->where('user_id', Auth::user()->id)
        ->where('id', '!=', $id)
        ->where('type_address', 3)
        ->update(array('type_address' => 0));


      }elseif($request['type_ad'] == 0){


        DB::table('user_addresses')
        ->where('user_id', Auth::user()->id)
        ->where('id', '!=', $id)
        ->where('type_address', 3)
        ->update(array('type_address' => 2));

      }else{

      }




      return redirect(url('edit_address_book/'.$id))->with('edit_address','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    public function delete_address_book(Request $request){

      $id = $request['address_id'];

    //  dd($user_id);

      $obj = user_address::find($id);
      $obj->delete();

      return redirect(url('address_book'))->with('delete','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }


    public function post_new_address_book(Request $request){


      $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province' => 'required',
            'amphur' => 'required',
            'district' => 'required',
            'postcode' => 'required'
      ]);

      $user_id = Auth::user()->id;

      $package = new user_address();
      $package->name_ad = $request['name'];
      $package->user_id = Auth::user()->id;
      $package->phone_ad = $request['phone'];
      $package->address_ad = $request['address'];
      $package->province = $request['province'];
      $package->district = $request['amphur'];

      $package->sub_district = $request['district'];
      $package->zip_code = $request['postcode'];
      $package->type_address = $request['type_ad'];
      $package->save();
      return redirect(url('address_book/'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }




    public function new_address_book(){

      return view('new_address_book');
    }






    public function address_book(){

      $address = DB::table('user_addresses')
          ->select(
          'user_addresses.*'
          )
          ->where('user_id', Auth::user()->id)
          ->get();

      $data['address'] = $address;

      return view('address_book', $data);


    }





    public function edit_address_book($id){


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


      return view('edit_address_book', $data);



    }




}

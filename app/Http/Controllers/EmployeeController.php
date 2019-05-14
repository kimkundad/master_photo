<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = DB::table('role_user')
            ->select(
            'role_user.*',
            'users.*',
            'users.id as id_user'
            )
            ->leftjoin('users', 'users.id',  'role_user.user_id')
            ->where('role_user.role_id', 2)
            ->get();

            $data['datahead'] = "รายชื่อพนักงาน";
            $data['objs'] = $objs;
            return view('admin.employee.index', $data);

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
        $data['url'] = url('admin/employee');
        $data['datahead'] = "สร้างรายชื่อพนักงานใหม่ ";
        return view('admin.employee.create', $data);
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
       'name' => 'required|unique:users|max:255',
       'email' => 'required|email|max:255|unique:users',
       'password' => 'required|min:6|confirmed',
     ]);


     $ran = array("1483537975.png","1483556517.png","1483556686.png");

        $package = new User();
        $package->name = $request['name'];
        $package->email = $request['email'];
        $package->phone = $request['phone'];
        $package->avatar = $ran[array_rand($ran, 1)];
        $package->is_admin = 0;
        $package->provider = 'email';
        $package->password = bcrypt($request['password']);
        $package->id_card_no = $request['id_card_no'];
        $package->branch_code = $request['branch_code'];
        $package->save();

        $the_id = $package->id;


        DB::table('role_user')->insert(
            ['role_id' => 2, 'user_id' => $the_id]
        );


        return redirect(url('admin/employee'))->with('add_success','เพิ่มบัญชีผู้ใช้งาน เสร็จเรียบร้อยแล้ว');


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
        $cat = DB::table('users')
            ->select(
            'users.*'
            )
            ->where('id', $id)
            ->first();


        $data['url'] = url('admin/employee/'.$id);
          $data['header'] = "แก้ไขข้อมูลพนักงาน";
          $data['method'] = "put";

          $data['objs'] = $cat;
          return view('admin.employee.edit', $data);
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

            return redirect(url('admin/employee/'))->with('error','Edit successful');

          }else{

            $package = User::find($id);
            $package->name = $request['name'];
            $package->email = $request['email'];
            $package->phone = $request['phone'];
            $package->id_card_no = $request['id_card_no'];
            $package->branch_code = $request['branch_code'];
            $package->save();

          return redirect(url('admin/employee/'))->with('edit_success','Edit successful');

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
        //
        DB::table('role_user')
              ->where('user_id', $id)
              ->delete();

              DB::table('users')
                    ->where('id', $id)
                    ->delete();

                    return redirect(url('admin/employee/'))->with('delete','Edit successful');

    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use Session;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;



    public function authenticated(Request $request)
     {
     // Logic that determines where to send the user
     if($request->user()->hasRole('employee')){
     return redirect('/admin/user');
     }
     if($request->user()->hasRole('manager')){
     return redirect('/admin/user');
     }
     if($request->user()->hasRole('customer')){

       if(Session::get('status_user') == 1){
       // Session::get('status_user');
        Session::put('status_user', 0);
         return redirect(url('shipping'));
       //  return redirect(url('admin/edit_deli_2/'.$request['id_deli']))->with('edit_item_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
       }else{
         return redirect('/');
       }



     }
     }




    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }







}

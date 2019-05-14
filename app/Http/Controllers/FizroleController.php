<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FizroleController extends Controller
{
    //

    public function index()
    {
        //


              $data['datahead'] = "roles and permissions";
              return view('admin.roles.index', $data);
    }

    public function post_page_roles(Request $request){

      $page1 = isset($_POST['page1']) ? 1 : 0;
      DB::table('menu_role')
            ->where('id', 1)
            ->update(['menu_status' => $page1]);


            $page2 = isset($_POST['page2']) ? 1 : 0;
            DB::table('menu_role')
                  ->where('id', 2)
                  ->update(['menu_status' => $page2]);

                  $page3 = isset($_POST['page3']) ? 1 : 0;
                  DB::table('menu_role')
                        ->where('id', 3)
                        ->update(['menu_status' => $page3]);

                        $page4 = isset($_POST['page4']) ? 1 : 0;
                        DB::table('menu_role')
                              ->where('id', 4)
                              ->update(['menu_status' => $page4]);

                              $page5 = isset($_POST['page5']) ? 1 : 0;
                              DB::table('menu_role')
                                    ->where('id', 5)
                                    ->update(['menu_status' => $page5]);

                                    $page6 = isset($_POST['page6']) ? 1 : 0;
                                    DB::table('menu_role')
                                          ->where('id', 6)
                                          ->update(['menu_status' => $page6]);

                                          $page7 = isset($_POST['page7']) ? 1 : 0;
                                          DB::table('menu_role')
                                                ->where('id', 7)
                                                ->update(['menu_status' => $page7]);

                                                $page8 = isset($_POST['page8']) ? 1 : 0;
                                                DB::table('menu_role')
                                                      ->where('id', 8)
                                                      ->update(['menu_status' => $page8]);

                                                      $page9 = isset($_POST['page9']) ? 1 : 0;
                                                      DB::table('menu_role')
                                                            ->where('id', 9)
                                                            ->update(['menu_status' => $page9]);

                                                            $page10 = isset($_POST['page10']) ? 1 : 0;
                                                            DB::table('menu_role')
                                                                  ->where('id', 10)
                                                                  ->update(['menu_status' => $page10]);

                                                                  $page11 = isset($_POST['page11']) ? 1 : 0;
                                                                  DB::table('menu_role')
                                                                        ->where('id', 11)
                                                                        ->update(['menu_status' => $page11]);

                                                                        $page12 = isset($_POST['page12']) ? 1 : 0;
                                                                        DB::table('menu_role')
                                                                              ->where('id', 12)
                                                                              ->update(['menu_status' => $page12]);

                                                                              $page13 = isset($_POST['page13']) ? 1 : 0;
                                                                              DB::table('menu_role')
                                                                                    ->where('id', 13)
                                                                                    ->update(['menu_status' => $page13]);


      return redirect(url('admin/roles/'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }















}

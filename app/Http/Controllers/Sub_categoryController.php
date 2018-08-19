<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\sub_category;
use App\product;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class Sub_categoryController extends Controller
{
    //
    public function index()
    {


      $cat = DB::table('sub_categories')->select(
            'sub_categories.*'
            )
            ->get();

            $s = 1;
            foreach ($cat as $obj) {
                $optionsRes = [];
                $options = DB::table('products')->select(
                  'products.*'
                  )
                  ->where('products.pro_category', $obj->id)
                  ->count();

                     $optionsRes['count'] = $options;

                $obj->options = $options;
              }
              //dd($cat);
              $data['objs'] = $cat;
              $data['datahead'] = "จัดการหมวดหมู่ย่อย";


      return view('admin.sub_category.index', $data);
    }
}

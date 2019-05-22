<?php

use Illuminate\Support\Facades\DB;


function get_menu_admin(){

  $menu_web = DB::table('menu_role')->select(
          'menu_role.*'
          )
          ->get();

  return $menu_web;
}

function setting(){

  $menu_web = DB::table('settings')
          ->where('id', 1)
          ->first();

  return $menu_web;

}

function web_notify(){

  $menu_web = DB::table('notifies')
          ->where('status', 1)
          ->orderBy('num_sort', 'asc')
          ->get();

  return $menu_web;

}

function get_menu(){

  $menu_web = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($menu_web as $u){
              $options = DB::table('sub_categories')
                ->where('sub_category', $u->id)
                ->get();


                foreach($options as $j){

                  $product = DB::table('products')
                    ->where('pro_category', $j->id)
                    ->where('pro_status', 1)
                    ->get();

                    $j->product = $product;
                }

                $options_count = DB::table('sub_categories')
                  ->where('sub_category', $u->id)
                  ->count();


              $u->options = $options;
              $u->option_count = $options_count;
            }
          //  $dd = Auth::user()->id;
  return $menu_web;

}

function get_count_cart(){

  $check_count = DB::table('cart_details')->select(
    'cart_details.*'
    )
    ->where('user_id', Auth::user()->id)
    ->count();

  return $check_count;


}

function get_cartg(){

  error_reporting(0);
  $get_data = DB::table('cart_details')->select(
      'cart_details.*'
      )
      ->where('user_id', Session::get('cart'))
      ->get();

      foreach($get_data as $k){
        $cat = DB::table('products')->select(
          'products.*'
          )
          ->where('products.id', $k->product_id)
          ->first();

          $k->product_get = $cat;
      }


      return $get_data;

}

function get_cart(){

  $get_data = DB::table('cart_details')->select(
      'cart_details.*'
      )
      ->where('user_id', Auth::user()->id)
      ->get();

      foreach($get_data as $k){
        $cat = DB::table('products')->select(
          'products.*'
          )
          ->where('products.id', $k->product_id)
          ->first();

          $k->product_get = $cat;
      }


      return $get_data;

}

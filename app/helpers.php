<?php

use Illuminate\Support\Facades\DB;


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
                    ->get();

                    $j->product = $product;
                }

                $options_count = DB::table('sub_categories')
                  ->where('sub_category', $u->id)
                  ->count();


              $u->options = $options;
              $u->option_count = $options_count;
            }

  return $menu_web;

}

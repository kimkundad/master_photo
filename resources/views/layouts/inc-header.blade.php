
<div id="preloader" style="display: none;">
  <div class="sk-spinner sk-spinner-wave">
    <div class="sk-rect1"></div>
    <div class="sk-rect2"></div>
    <div class="sk-rect3"></div>
    <div class="sk-rect4"></div>
    <div class="sk-rect5"></div>
  </div>
</div>
<!-- End Preload -->

<div class="layer"></div>
<!-- Mobile menu overlay mask -->


<!-- Header================================================== -->
<header class="" id="plain" >
  <div id="top_line" style="background-color: #FAFAE2; padding-top: 10px;">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-6">

        </div>

        <div class="col-md-4 col-sm-3 col-xs-3">
          <div id="logo">
            <a href="{{url('/')}}">
				<img src="{{url('master/assets/image/TOP657971755logo-website.png')}}" height="64" alt="TEENEEJJ" data-retina="true" class="logo_normal">
			</a>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-6">
          <ul id="top_links" style="position: absolute;bottom:-70px;">

            <li>

                <i class="icon-globe-1"></i> <a href="{{ URL::to('change/en') }}">EN</a> - <a href="{{ URL::to('change/th') }}">TH</a>


            </li>


            <li>
              <div class="dropdown dropdown-mini">

              @if (Auth::guest())
              <a href="{{url('login')}}" id="access_link" >Sign in</a>
              @else

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="access_link" >{{ Auth::user()->name }}</a>

              <div class="dropdown-menu">
                <ul id="lang_menu">

                  <li><a href="{{url('profile')}}">Account Setting</a>
                  </li>
                  <li><a href="{{url('my_order')}}">Order History</a>
                  </li>
                  <li><a href="{{url('payment_notify')}}">Payment</a>
                  </li>
                  <li><a href="{{url('logout')}}">Sign out</a>
                  </li>

                </ul>
              </div>
              @endif

              </div>
              <!-- End Dropdown access -->
            </li>



            <li style=" margin-bottom:-7px;">
                <div class="dropdown dropdown-cart">
                    <a href="#" class="dropdown-toggle" style="font-size:20px; color:#666" data-toggle="dropdown"><i class="fa fa-cart-plus"></i></a>
                    <ul class="dropdown-menu" id="cart_items" >


                      @if(Auth::guest())

                      <?php

                          if(!Session::get('cart')){
                        ?>

                        <p style="padding:20px;">

                          Cart empty
                        </p>

                        <?php
                        }else{
                          $total = 0;

                          $i = 1 ;

                          foreach(Session::get('cart') as $item){

                            $total+=( $item['data'][3]['sum_price'] * $item['data'][2]['sum_image']);
                          //  $total=$item['data'][2]['sum_price'];
                       ?>

                        <li style="padding-left:10px;">
                            <a href="{{url('photo_edit/'.$item['data']['id'])}}" style="padding: 3px 5px;"><div class="image"><img src="{{url('assets/image/product/'.$item['data']['image_pro'])}}" alt="image"></div></a>
                            <strong>
                            <a href="{{url('photo_edit/'.$item['data']['id'])}}"><?=$i?>. {{$item['data']['pro_name']}}</a>฿{{number_format((float)$item['data'][3]['sum_price'], 2, '.', '')}} x {{$item['data'][2]['sum_image']}}</strong>
                        </li>

                        <?php
                        $i++;
                          }
                         ?>

                        <li>
                            <div>Total: <span>฿{{number_format((float)$total, 2, '.', '')}}</span></div>
                            <a href="{{url('cart')}}" style="float: left; margin: 0px 1px 0px 1px;" class="button_drop">Go to cart</a>
                            <a href="{{url('shipping')}}" style=" margin: 0px 1px 0px 1px;" class="button_drop">Check out</a>
                        </li>
                        <?php
                          }

                         ?>


                         @else

                         <!-- ////////////////////////////////////////////////////// -->

                         @if(get_count_cart() == 0)

                         <p style="padding:20px;">

                           Cart empty
                         </p>

                         @else

                         <?php
                         $total = 0;
                         $i = 1 ;
                          ?>

                          @foreach(get_cart() as $k)

                          <?php $total += $k->sum_image*$k->sum_price; ?>

                          <li style="padding-left:10px;">
                              <a href="{{url('photo_edit/'.$k->id)}}" style="padding: 3px 5px;"><div class="image"><img src="{{url('assets/image/product/'.$k->product_get->pro_image)}}" alt="{{$k->product_get->pro_name}}"></div></a>
                              <strong>
                              <a href="{{url('photo_edit/'.$k->id)}}"><?=$i?>. {{$k->product_get->pro_name}}</a>฿{{number_format((float)$k->sum_price, 2, '.', '')}} x {{$k->sum_image}}</strong>
                          </li>

                          <?php
                          $i++;
                           ?>

                          @endforeach

                          <li>
                              <div>Total: <span>฿{{number_format((float)$total, 2, '.', '')}}</span></div>
                              <a href="{{url('cart')}}" style="float: left; margin: 0px 1px 0px 1px;" class="button_drop">Go to cart</a>
                              <a href="{{url('shipping')}}" style=" margin: 0px 1px 0px 1px;" class="button_drop">Check out</a>
                          </li>

                         @endif



                         <!-- ////////////////////////////////////////////////////// -->

                         @endif





                    </ul>
                </div><!-- End dropdown-cart-->
            </li>





          </ul>



        </div>
      </div>
      <!-- End row -->
    </div>
    <!-- End container-->
  </div>
  <!-- End top line-->

  <style>
  #logo .img-responsive {
  margin: 0 auto;
}
  </style>

  <div class="container">
    <div class="row">

      <div class="col-md-12 visible-sm visible-xs">
        <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
        <div id="logo" style="margin-top: 5px; margin-bottom: 5px;">

          <a href="{{url('/')}}"><img src="{{url('master/assets/image/logo-website.png')}}" height="64" style="height: 40px; display:block" class="logo_normal img-responsive"></a>


            @if(Auth::guest())
            <a class="pull-right" style="position:  absolute;width:20%;color:#666;line-height: 15px;font-size:12px;padding-top:7px;top: 0;right: 0;" href="{{url('login')}}">SIGN IN /<br /> JOIN</a>
            @else
            <a class="pull-right" style="position:  absolute;width:20%;color:#666;line-height: 15px;font-size:12px;padding-top:7px;top: 0;right: 0;" href="{{url('/cart')}}">
              <i class="fa fa-cart-plus" style="margin-top: 5px; font-size: 23px;"></i>
            </a>

            @endif


        </div>
      </div>



      <nav class="col-md-12 col-sm-12 col-xs-12">

        <div class="main-menu text-center">
          <div id="header_menu">
            <img src="{{url('master/assets/image/logo-website.png')}}" height="54" alt="masterphotonetwork" data-retina="true">
          </div>
          <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
          <ul>

            @if(get_menu())
            @foreach(get_menu() as $menu)
            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">{{$menu->name_cat}}
                @if($menu->option_count > 0)
                <i class="icon-down-open-mini"></i>
                @endif
              </a>
              @if($menu->option_count > 0)
              <ul>

                @foreach($menu->options as $menu_sub)

                @if($menu->id == 3)

                  @if($menu_sub->product)
                    @foreach($menu_sub->product as $menu_sub_j)
                    <li><a href="{{url('photo_print/'.$menu_sub_j->id)}}">{{$menu_sub_j->pro_name}}</a></li>
                    @endforeach
                  @endif

                @else
                <li><a href="{{url('category/'.$menu_sub->id)}}">{{$menu_sub->sub_name}}</a></li>
                @endif

                @endforeach

              </ul>
              @endif
            </li>
            @endforeach
            @endif

            @if(Auth::guest())

            @else

            <li class="submenu visible-sm visible-xs">
              <a href="javascript:void(0);" class="show-submenu"> {{ Auth::user()->name }}
                <i class="icon-down-open-mini"></i>
              </a>

              <ul>

                  <li><a href="{{url('profile')}}">Account Setting</a>
                  </li>
                  <li><a href="{{url('my_order')}}">Order History</a>
                  </li>
                  <li><a href="{{url('payment_notify')}}">Payment</a>
                  </li>
                  <li><a href="{{url('logout')}}">Sign out</a>
                  </li>


                </ul>
            </li>

            @endif

          </ul>


        </div>
        <!-- End main-menu -->


      </nav>
    </div>
  </div>
  <!-- container -->
</header>
<!-- End Header -->

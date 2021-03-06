
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

                <i class="icon-globe-1"></i> EN<!-- <a href="{{ URL::to('change/en') }}">EN</a> --> - <a href="{{ URL::to('change/th') }}">TH</a>


            </li>


            <li>
              <div class="dropdown dropdown-mini">

              @if (Auth::guest())
              <a href="{{url('login')}}" id="access_link" >{{ trans('message.login') }}</a>
              @else

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="access_link" >{{ Auth::user()->name }}</a>

              <div class="dropdown-menu" style="min-width: 120px;">
                <ul id="lang_menu">

                  <li><a href="{{url('my_order')}}">{{ trans('message.user_order') }}</a>
                  </li>
                  <li><a href="#">{{ trans('message.credit') }}</a>
                  </li>
                  <li><a href="{{url('profile')}}">{{ trans('message.user_pro') }}</a>
                  </li>

                  <li><a href="{{url('logout')}}">{{ trans('message.logout') }}</a>
                  </li>
                  <li><a href="{{url('help')}}">{{ trans('message.help') }}</a>
                  </li>

                </ul>
              </div>
              @endif

              </div>
              <!-- End Dropdown access -->
            </li>



            <li style=" margin-bottom:-7px;">
                <div class="dropdown dropdown-cart">
                    <a href="#" class="dropdown-toggle" style="font-size:20px; color:#666" data-toggle="dropdown"><img src="{{url('assets/image/16757-200.png')}}" style="height:19px; " /> </a>
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
                          ?>


                          @foreach(get_cartg() as $k)

                          <?php $total += $k->sum_image*$k->sum_price; ?>

                          <li style="padding-left:10px;">
                              <a href="{{url('photo_edit/'.$k->id)}}" style="padding: 3px 5px;"><div class="image"><img src="{{url('assets/image/product/'.$k->product_get->pro_image)}}" alt="{{$k->product_get->pro_name}}"></div></a>
                              <strong>
                              <a href="{{url('photo_edit/'.$k->id)}}"><?=$i?>. {{$k->product_get->pro_name}}</a>฿{{number_format($k->sum_price, 2)}} x {{number_format($k->sum_image)}} </strong>
                          </li>

                          <?php
                          $i++;
                           ?>

                          @endforeach

                          <li>
                              <div>Total: <span>฿{{number_format($total, 2)}}</span></div>
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
                              <a href="{{url('photo_edit/'.$k->id)}}"><?=$i?>. {{$k->product_get->pro_name}}</a>฿{{number_format($k->sum_price, 2)}} x {{number_format($k->sum_image)}} </strong>
                          </li>

                          <?php
                          $i++;
                           ?>

                          @endforeach

                          <li>
                              <div>Total: <span>฿{{number_format($total, 2)}}</span></div>
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
            <a class="pull-right" style="position:  absolute;width:20%;color:#666;line-height: 15px;font-size:12px;padding-top:7px;top: 0;right: 0;" href="{{url('login')}}">{{ trans('message.login') }} /<br /> {{ trans('message.regis') }}</a>
            @else
            <a class="pull-right" style="position:  absolute;width:20%;color:#666;line-height: 15px;font-size:12px;padding-top:7px;top: 0;right: 0;" href="{{url('/cart')}}">
              <img src="{{url('assets/image/16757-200.png')}}" style="height:19px; margin-top: 5px;" />
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
                <li><a href="#">coming soon</a></li>
                <!--  <li><a href="{{url('category/'.$menu_sub->id)}}">{{$menu_sub->sub_name}}</a></li> -->
                @endif

                @endforeach



              </ul>
              @endif
            </li>
            @endforeach
            @endif


            <li class="submenu  visible-sm visible-xs">
              <a href="javascript:void(0);" class="show-submenu">Language : {{ trans('message.lang') }}
                <i class="icon-down-open-mini"></i>
              </a>

              <ul>
                <!--
                <li><a href="{{ URL::to('change/th') }}">Thai language</a></li>
              -->
                <li><a>Thai language</a></li>
                <li><a href="{{ URL::to('change/en') }}">Englist language</a></li>
              </ul>

            </li>

            @if(Auth::guest())

            @else

            <li class="submenu visible-sm visible-xs" style="background-color: #fdfddf; font-weight: 600;">
              <a ><i class="icon-user-1 pull-left"></i> {{ Auth::user()->name }}

              </a>

              <ul>
                <li><a href="{{url('my_order')}}"><i class="icon-cart pull-left" style="margin-right:5px;"></i> {{ trans('message.user_order') }}</a>
                </li>
                <li><a href="#"><i class="icon-gift-2 pull-left" style="margin-right:5px;"></i> {{ trans('message.credit') }}</a>
                </li>
                <li><a href="{{url('profile')}}"><i class="icon-user pull-left" style="margin-right:5px;"></i> {{ trans('message.user_pro') }}</a>
                </li>

                <li><a href="{{url('logout')}}"><i class="icon-lock-5 pull-left" style="margin-right:5px;"></i> {{ trans('message.logout') }}</a>
                </li>
                <li><a href="{{url('help')}}"><i class=" icon-info-circled-3 pull-left" style="margin-right:5px;"></i> {{ trans('message.help') }}</a>
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

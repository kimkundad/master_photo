
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

                <i class="icon-globe-1"></i> <a href="lang/message.php?lang=eng">EN</a> - <a href="lang/message.php?lang=thai">TH</a>


            </li>


            <li>
              <div class="dropdown dropdown-mini">

              @if (Auth::guest())
              <a href="{{url('login')}}" id="access_link" >Sing in</a>
              @else

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="access_link" >{{ Auth::user()->name }}</a>

              <div class="dropdown-menu">
                <ul id="lang_menu">

                  <li><a href="{{url('profile')}}">Profile</a>
                  </li>
                  <li><a href="{{url('profile')}}">My Order</a>
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
                            $total+=$item['data'][2]['sum_price'];
                       ?>

                        <li style="padding-left:10px;">
                            <div class="image"><img src="{{url('assets/image/product/'.$item['data']['image_pro'])}}" alt="image"></div>
                            <strong>
                            <a href="#"><?=$i?>. {{$item['data']['pro_name']}}</a>฿<?=$item['data'][2]['sum_price']?>.00 </strong>
                        </li>

                        <?php
                        $i++;
                          }
                         ?>

                        <li>
                            <div>Total: <span>฿<?=$total?>.00</span></div>
                            <a href="{{url('cart')}}" style="float: left;" class="button_drop">Go to cart</a>
                            <a href="{{url('shipping')}}" class="button_drop outline">Check out</a>
                        </li>
                        <?php
                          }

                         ?>
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

          <a class="pull-right" style="position:  absolute;width:20%;color:#666;line-height: 15px;font-size:12px;padding-top:7px;top: 0;right: 0;"> SIGN IN /<br /> JOIN </a>

        </div>
      </div>



      <nav class="col-md-12 col-sm-12 col-xs-12">

        <div class="main-menu text-center">
          <div id="header_menu">
            <img src="{{url('master/assets/image/logo-website.png')}}" height="54" alt="City tours" data-retina="true">
          </div>
          <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
          <ul>


            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">PHOTO PRINT <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="{{url('photo_print/1')}}">TRADITIONAL SIZES</a></li>
                <li><a href="{{url('photo_print/2')}}">SNAP SIZE</a></li>
                <li><a href="{{url('photo_print/3')}}">POLAROID SIZE</a></li>
                <li><a href="{{url('photo_print/4')}}">INSTAGRAM SIZE</a></li>
                <li><a href="{{url('photo_print/5')}}">COLLAGE PRINTS</a></li>

              </ul>
            </li>


            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">DIGITAL OFFSET PRINTS <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="{{url('category/7')}}">2 SIDED PRINT</a></li>
                <li><a href="{{url('category/8')}}">POSTCARD</a></li>
                <li><a href="{{url('category/9')}}">NAME CARD</a></li>
                <li><a href="{{url('category/10')}}">LABEL STICKER</a></li>
                <li><a href="{{url('category/11')}}">BROCHURE</a></li>
                <li><a href="{{url('category/12')}}">LEAFLET</a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">PHOTOBOOK <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="{{url('category/13')}}">SQUARE BOOK</a></li>
                <li><a href="{{url('category/14')}}">PORTRAIT BOOK</a></li>
                <li><a href="{{url('category/15')}}">LANDSCAPE BOOK</a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">CALENDAR <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="{{url('category/16')}}">PORTRAIT </a></li>
                <li><a href="{{url('category/17')}}">LANDSCAPE </a></li>
                <li><a href="{{url('category/18')}}">HANG-UP </a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">CARDS <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="{{url('category/19')}}">WEDDING CARDS</a></li>
                <li><a href="{{url('category/20')}}">INVITATION CARDS</a></li>
                <li><a href="{{url('category/21')}}">BIRTHDAY CARDS</a></li>
                <li><a href="{{url('category/22')}}">ANNIVERSARY CARDS</a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">FRAMES <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="{{url('category/23')}}">CANVAS </a></li>
                <li><a href="{{url('category/24')}}">BORDERLESS FRAME</a></li>
                <li><a href="{{url('category/25')}}">MODERN FRAME</a></li>
                <li><a href="{{url('category/26')}}">GOLDENv FRAME</a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">GIFTS <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="{{url('category/27')}}">T-SHIRT </a></li>
                <li><a href="{{url('category/28')}}">MUG </a></li>
                <li><a href="{{url('category/29')}}">JIGSAW </a></li>
                <li><a href="{{url('category/30')}}">MAGNET </a></li>

                <li><a href="{{url('category/31')}}">STICKER </a></li>
                <li><a href="{{url('category/32')}}">PILLOW CASE </a></li>
                <li><a href="{{url('category/33')}}">SCARF </a></li>
                <li><a href="{{url('category/34')}}">BAG </a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">PROMOTION </a>

            </li>

          </ul>


        </div>
        <!-- End main-menu -->


      </nav>
    </div>
  </div>
  <!-- container -->
</header>
<!-- End Header -->

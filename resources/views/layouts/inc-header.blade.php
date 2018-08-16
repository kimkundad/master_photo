
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
                    <a href="#" class="dropdown-toggle" style="font-size:20px; color:#666" data-toggle="dropdown"><i class=" icon-basket-1"></i></a>
                    <ul class="dropdown-menu" id="cart_items" >

                      <?php
                        if(!isset($_SESSION["cart"])){

                        ?>

                        <p style="padding:20px;">

                          Cart empty
                        </p>

                        <?php
                        }else{
                          $total = 0;

                          $i = 1 ;
                          $cart=$_SESSION['cart'];
                          foreach($cart as $id=>$item){
                            $total+=$item['price']
                       ?>

                        <li style="padding-left:10px;">
                            <div class="image"><img src="assets/image/product/<?=$item['image']?>" alt="image"></div>
                            <strong>
                            <a href="#"><?=$i?>. <?=$item['name']?></a>฿<?=$item['price']?>.00 </strong>
                        </li>

                        <?php
                        $i++;
                          }
                         ?>

                        <li>
                            <div>Total: <span>฿<?=$total?>.00</span></div>
                            <a href="cart.php" style="float: left;" class="button_drop">Go to cart</a>
                            <a href="shipping.php" class="button_drop outline">Check out</a>
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

          <a href="index.php"><img src="{{url('master/assets/image/logo-website.png')}}" height="64" style="height: 40px; display:block" class="logo_normal img-responsive"></a>

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
                <li><a href="{{url('/')}}">TRADITIONAL SIZES</a></li>
                <li><a href="{{url('/')}}">SNAP SIZE</a></li>
                <li><a href="{{url('/')}}">POLAROID SIZE</a></li>
                <li><a href="{{url('/')}}">INSTAGRAM SIZE</a></li>
                <li><a href="{{url('/')}}">COLLAGE PRINTS</a></li>

              </ul>
            </li>


            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">DIGITAL OFFSET PRINTS <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="{{url('/')}}">2 SIDED PRINT</a></li>
                <li><a href="{{url('/')}}">POSTCARD</a></li>
                <li><a href="{{url('/')}}">NAME CARD</a></li>
                <li><a href="{{url('/')}}">LABEL STICKER</a></li>
                <li><a href="{{url('/')}}">BROCHURE</a></li>
                <li><a href="{{url('/')}}">LEAFLET</a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">PHOTOBOOK <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="#">SQUARE BOOK</a></li>
                <li><a href="#">PORTRAIT BOOK</a></li>
                <li><a href="#">LANDSCAPE BOOK</a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">CALENDAR <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="#">PORTRAIT </a></li>
                <li><a href="#">LANDSCAPE </a></li>
                <li><a href="#">HANG-UP </a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">CARDS <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="#">WEDDING CARDS</a></li>
                <li><a href="#">INVITATION CARDS</a></li>
                <li><a href="#">BIRTHDAY CARDS</a></li>
                <li><a href="#">ANNIVERSARY CARDS</a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">FRAMES <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="#">CANVAS </a></li>
                <li><a href="#">BORDERLESS FRAME</a></li>
                <li><a href="#">MODERN FRAME</a></li>
                <li><a href="#">GOLDENv FRAME</a></li>
              </ul>
            </li>

            <li class="submenu">
              <a href="javascript:void(0);" class="show-submenu">GIFTS <i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="#">T-SHIRT </a></li>
                <li><a href="#">MUG </a></li>
                <li><a href="#">JIGSAW </a></li>
                <li><a href="#">MAGNET </a></li>

                <li><a href="#">STICKER </a></li>
                <li><a href="#">PILLOW CASE </a></li>
                <li><a href="#">SCARF </a></li>
                <li><a href="#">BAG </a></li>
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

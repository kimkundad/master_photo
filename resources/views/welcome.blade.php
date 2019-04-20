@extends('layouts.template')

@section('title')
MASTER PHOTO NETWORK: ร้านมาสเตอร์ อัด ขยาย ภาพ อัดภาพระบบดิจิตอล กรอบลอย canvas FRAME กรอบรูป studio ร้านถ่ายรูป
@stop

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{url('master/assets/slick/slick-theme.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('master/assets/slick/slick.css')}}"/>
<style>
figure {
	margin: 0;
	padding: 0;
	background: #fff;
	overflow: hidden;
}
figure:hover+span {
	bottom: -36px;
	opacity: 1;
}

.hover01 figure img {
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover01 figure:hover img {
	-webkit-transform: scale(1.3);
	transform: scale(1.1);
}
.rounded-circle{
      margin-bottom: -15px;
  border-radius: 50%;
  width: 90px;
}
</style>

@stop('stylesheet')
@section('content')


<div class="slider-pro" id="my-slider">
  <div class="sp-slides">

		@if($slide)
		@foreach($slide as $slide1)
    <div class="sp-slide">
      <a href="{{$slide1->btn_url}}">
        <img class="sp-image" src="{{url('assets/image/slide/'.$slide1->image_slide)}}" />
      </a>
    </div>
		@endforeach
		@endif


  </div>
</div>




<main>

  <div class="container margin_30">

    <div class="row">


      <div class="col-md-6 ">
        <div class="general_icons text-center">
          <ul>
  				  <li>
              <div class="tooltip_styled tooltip-effect-4">
                <a href="https://www.facebook.com/masterphotonetwork/" target="_blank">
                <img src="{{url('master/assets/images/social/fb.png')}}" class="tooltip-item" alt="facebook masterphotonetwork"/>
                </a>
                <div class="tooltip-content">
									<h4>Facebook</h4> Master Photo Network
									<br>
								</div>
              </div>
            </li>
            <li>
              <div class="tooltip_styled tooltip-effect-4">
                <a href="https://www.instagram.com/explore/locations/1502637236731741/master-photo-network/" target="_blank">
                <img src="{{url('master/assets/images/social/ig.png')}}" class="tooltip-item" alt="ig masterphotonetwork"/>
                </a>
                <div class="tooltip-content">
									<h4>Instagram</h4> Master Photo Network
									<br>
								</div>
              </div>
            </li>

            <li>
              <div class="tooltip_styled tooltip-effect-4">
                <img src="{{url('master/assets/images/social/icono-de.png')}}" class="tooltip-item" alt="gmail masterphotonetwork"/>
                <div class="tooltip-content">
									<h4>Gmail</h4> Masterphotonetwork@gmail.com
									<br>
								</div>
              </div>
            </li>

            <li>
              <div class="tooltip_styled tooltip-effect-4">
                <a href="http://line.me/ti/p/kL8POWgHU9" target="_blank">
                <img src="{{url('master/assets/images/social/mobile-icon.png')}}" class="tooltip-item" alt="line masterphotonetwork"/>
                </a>
                <div class="tooltip-content">
									<h4>Line ID</h4> Masterphotonetwork
									<br>
								</div>
              </div>
            </li>

            <li>
              <div class="tooltip_styled tooltip-effect-4">
                <img src="{{url('master/assets/images/social/phone_circle-512.png')}}" class="tooltip-item" alt="Phone number masterphotonetwork"/>
                <div class="tooltip-content" style="width: 200px;">
									02-513-0105, 086-600-5055
									<br>
								</div>
              </div>
            </li>



          </ul>
        </div>
        <h3 class="text-center">CONNECT WITH US!</h3>
      </div>


      <hr class="visible-sm visible-xs"/>
      <div class="col-md-6 ">



        @if (Auth::guest())

        <div class="text-center">
          <h3>Sign up</h3>
          <p>
            SIGN IN OR JOIN TO MAKE A BEAUTIFUL PHOTO GIFT.
          </p>

          <a href="{{url('login')}}" class="btn_1">Login</a>
          <a href="{{url('login')}}" class="btn_3">Sign up</a>
        </div>

        @else

        <div class="text-center">
					@if(Auth::user()->provider == 'email')
					<a href="{{url('/profile')}}"><img src="{{url('assets/images/avatar/'.Auth::user()->avatar)}}" alt="Image" class="rounded-circle">
					@else
					<a href="{{url('/profile')}}"><img src="{{ Auth::user()->avatar }}" alt="Image" class="rounded-circle">
					@endif

          <h3>{{ Auth::user()->name }}</h3></a>
          <p>
            {{ trans('message.welcome') }}
          </p>


        </div>

        @endif


      </div>

      <hr class="visible-sm visible-xs"/>
    </div>




  </div>
  <!-- End container -->



  <!-- NEW ARRIVALS! 1 -->
  <div class="container margin_60" style="padding-bottom: 30px;">
    <div class=" margin_30 text-center">
      <h2 class="major"><span>NEW ARRIVALS!</span></h2>
    </div>

    <div class="row">

			@if(isset($arrivals_t_l))
      <div class="col-md-6 col-sm-6 text-center">
        <div class="hover01">
            <a href="{{url('themes/'.$arrivals_t_l->id)}}">
              <figure>
                <img src="{{url('assets/image/product/'.$arrivals_t_l->pro_image)}}" alt="{{$arrivals_t_l->pro_name}}" class="img-responsive">
              </figure>
            </a>
        </div>
				<h4>{{$arrivals_t_l->pro_name}}</h4>
				<p>
					{{str_limit($arrivals_t_l->pro_title, 38, '..')}}
				</p>
      </div>
			@endif

<!-- NEW ARRIVALS! 2 -->


@if(isset($arrivals_t_r))
<div class="col-md-6 col-sm-6 text-center">
	<div class="hover01">
			<a href="{{url('themes/'.$arrivals_t_r->id)}}">
				<figure>
					<img src="{{url('assets/image/product/'.$arrivals_t_r->pro_image)}}" alt="{{$arrivals_t_r->pro_name}}" class="img-responsive">
				</figure>
			</a>
	</div>
	<h4>{{$arrivals_t_r->pro_name}}</h4>
	<p>
		{{str_limit($arrivals_t_r->pro_title, 38, '..')}}
	</p>
</div>
@endif




			@if($arrivals)
           @foreach($arrivals as $u)

      <div class="col-md-4 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('themes/'.$u->id)}}">
            <figure>
              <img src="{{url('assets/image/product/'.$u->pro_image)}}" alt="{{$u->pro_name}}" class="img-responsive">
            </figure>
          </a>
        </div>
				<h4>{{$u->pro_name}}</h4>
				<p>
					{{str_limit($u->pro_title, 38, '..')}}
				</p>
      </div>

			@endforeach
     @endif




    </div>


    <p class="text-center add_bottom_30 margin_60">
      <a href="{{url('new_arrivals')}}" class="btn_1">All Product   </a>
    </p>


    <div class=" margin_30 text-center">
      <h2 class="major"><span>WHAT'S HOT</span></h2>

    </div>



    <div class="row">

		@if($hot)
           @foreach($hot as $u)

      <div class="col-md-3 col-sm-6 text-center">

				<div class="hover01">
          <a href="{{url('themes/'.$u->id)}}">
            <figure>
              <img src="{{url('assets/image/product/'.$u->pro_image)}}" alt="{{$u->pro_name}}" class="img-responsive">
            </figure>
          </a>
        </div>
				<h4>{{$u->pro_name}}</h4>
				<p>
					{{str_limit($u->pro_title, 38, '..')}}
				</p>
      </div>

			@endforeach
		 @endif






    </div>




    <p class="text-center add_bottom_30 margin_60">
      <a href="{{url('what_hot')}}" class="btn_1">All Product  </a>
    </p>




    <div class=" margin_30 text-center">
      <h2 class="major"><span>WHAT'S NEW</span></h2>

    </div>



    <div class="row">


			@if($hot_new)
           @foreach($hot_new as $u)
      <div class="col-md-3 col-sm-6 text-center">

			<div class="hover01">
				<a href="{{url('themes/'.$u->id)}}">
					<figure>
						<img src="{{url('assets/image/product/'.$u->pro_image)}}" alt="{{$u->pro_name}}" class="img-responsive">
					</figure>
				</a>
			</div>
			<h4>{{$u->pro_name}}</h4>
			<p>
				{{str_limit($u->pro_title, 38, '..')}}
			</p>
      </div>
			@endforeach
		 @endif









    </div>




    <p class="text-center add_bottom_30 margin_60">
      <a href="{{url('what_new')}}" class="btn_1">All Product  </a>
    </p>


    <div class=" margin_30 text-center" style="margin-bottom: 0px;">
      <h2 class="major" style="margin-bottom: 0px;"><span>OUR CUSTOMERS</span></h2>

    </div>


<!-- ourcustomers logo -->
    <section class="regular slider">

      <div class="col-md-2 ">
        <img src="{{url('master/assets/image/ourcustomer/logo-Isuzu.png')}}" class="img-responsive">
      </div>
      <div class="col-md-2 ">
        <img src="{{url('master/assets/image/ourcustomer/logo-fwd.png')}}" class="img-responsive">
      </div>
      <div class="col-md-2 ">
        <img src="{{url('master/assets/image/ourcustomer/logo-pasaya.png')}}" class="img-responsive">
      </div>
      <div class="col-md-2 ">
        <img src="{{url('master/assets/image/ourcustomer/logo-major.png')}}" class="img-responsive">
      </div>
      <div class="col-md-2 ">
        <img src="{{url('master/assets/image/ourcustomer/logo-ptt.png')}}" class="img-responsive">
      </div>
      <div class="col-md-2 ">
        <img src="{{url('master/assets/image/ourcustomer/logo-samsung.png')}}" class="img-responsive">
      </div>
      <div class="col-md-2 ">
        <img src="{{url('master/assets/image/ourcustomer/logo-SB.png')}}" class="img-responsive">
      </div>
      <div class="col-md-2 ">
        <img src="{{url('master/assets/image/ourcustomer/logo-SCG.png')}}" class="img-responsive">
      </div>
      <div class="col-md-2 ">
        <img src="{{url('master/assets/image/ourcustomer/logo-scotch.png')}}" class="img-responsive">
      </div>
      <div class="col-md-2 ">
        <img src="{{url('master/assets/image/ourcustomer/logo-thaiairway.png')}}" class="img-responsive">
      </div>

    </section>
<!-- ourcustomers logo -->
  </div>
  <!-- End container -->






</main>
<!-- End main -->

@endsection

@section('scripts')

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('#my-slider').sliderPro({
      width: '100%',
      height: '500',
      arrows: true,
      visibleSize: '100%',
      responsive:true,
      imageScaleMode:'cover'
    });
  });
</script>

@stop('scripts')

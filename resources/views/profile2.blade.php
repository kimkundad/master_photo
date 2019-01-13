@extends('layouts.template')

@section('title')
user profile
@stop

@section('stylesheet')
<link href="{{url('master/assets/css/admin.css')}}" rel="stylesheet">

@stop('stylesheet')
@section('content')


<main class=" slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span>Profile & Setting </span></h2>

    </div>

    <div class="row">


      <aside class="col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
							<li><a href="{{url('profile')}}" id="active"><i class="icon_set_1_icon-29"></i>ข้อมูลส่วนตัว </a>
							</li>
							<li><a href="{{url('address_book')}}"><i class="icon_set_1_icon-41"></i>สมุดที่อยู่ </a>
							</li>
							<li><a href="#"><i class="im im-icon-Gift-Box" style="margin-right:10px; margin-left:5px;"></i> คูปองส่วนลด </a>
							</li>
              <li><a href="{{url('my_order')}}"><i class="icon_set_1_icon-50" ></i> รายการสั่งซื้อของฉัน </a>
							</li>
              <li><a href="{{url('payment_notify')}}"><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> แจ้งการชำระเงิน </a>
							</li>

						</ul>
        </div>
      </aside>







      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h3>ข้อมูลส่วนตัว </h3>
                    <br />
                    <table class="table ">
                      <tbody>


                        <tr>
                          <td>ชื่อ-นามสกุล</td><td>{{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                          <td>อีเมล์</td><td>{{Auth::user()->email}}</td>
                          </tr>

                          <tr>
                          <td>เบอร์โทรศัพท์มือถือ</td><td>{{Auth::user()->phone}}</td>
                          </tr>

                          <tr>

                        



                      </tbody>
                    </table>
                  <div class="col-md-12 text-center" >
                    <br />
                  <a href="{{url('profile/'.Auth::user()->id.'/edit')}}" class="btn btn-submit">แก้ไขข้อมูลส่วนตัว</a>
                  </div>
                </div>



        </div>
      </div>







    </div>









  </div>
  <!-- End container -->
</main>
<!-- End main -->



@endsection

@section('scripts')

<script src="{{url('master/assets/js/tabs.js')}}"></script>
<script>
    new CBPFWTabs(document.getElementById('tabs'));
  </script>

  <script>
  @if ($message = Session::get('edit_success'))
  $.notify({
   // options
   icon: 'icon_set_1_icon-76',
   title: "<h4>อัพเดท สำเร็จ</h4> ",
   message: "ข้อมูลที่ถูกต้องทำให้การติดต่อได้ไม่ผิดพลาด. "
  },{
   // settings
   type: 'info',
   delay: 5000,
   timer: 3000,
   z_index: 9999,
   showProgressbar: false,
   placement: {
     from: "bottom",
     align: "right"
   },
   animate: {
     enter: 'animated bounceInUp',
     exit: 'animated bounceOutDown'
   },
  });
  @endif
  </script>

</body>

@stop('scripts')

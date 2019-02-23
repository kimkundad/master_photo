@extends('layouts.template')

@section('title')
user profile
@stop

@section('stylesheet')
<link href="{{url('master/assets/css/admin.css')}}" rel="stylesheet">

@stop('stylesheet')
@section('content')


<main class=" slider-pro" >

  <?php
      function DateThai($strDate)
      {
      $strYear = date("Y",strtotime($strDate))+543;
      $strMonth= date("n",strtotime($strDate));
      $strDay= date("j",strtotime($strDate));
      $strHour= date("H",strtotime($strDate));
      $strMinute= date("i",strtotime($strDate));
      $strSeconds= date("s",strtotime($strDate));
      $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
      $strMonthThai=$strMonthCut[$strMonth];
      return "$strDay $strMonthThai $strYear";
      }
       ?>


  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span>Profile & Setting </span></h2>

    </div>

    <div class="row">


      <aside class="col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
							<li><a href="{{url('profile')}}"><i class="icon_set_1_icon-29"></i>ข้อมูลส่วนตัว </a>
							</li>
							<li><a href="{{url('address_book')}}"><i class="icon_set_1_icon-41"></i>สมุดที่อยู่ </a>
							</li>
							<li><a href="#"><i class="im im-icon-Gift-Box" style="margin-right:10px; margin-left:5px;"></i> คูปองส่วนลด </a>
							</li>
              <li><a href="{{url('my_order')}}" id="active"><i class="icon_set_1_icon-50" ></i> รายการสั่งซื้อของฉัน </a>
							</li>
              <li><a href="{{url('payment_notify')}}"><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> แจ้งการชำระเงิน </a>
							</li>

						</ul>
        </div>
      </aside>


<style>
.content-current {
    padding: 10px;
    background-color: #fff;
    border: 1px solid #e2e2e2;

    -webkit-border-bottom-right-radius: 3px;
    -webkit-border-bottom-left-radius: 3px;
    -moz-border-radius-bottomright: 3px;
    -moz-border-radius-bottomleft: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
.spanser{
      color: #e04f67;
}
ul#profile_summary li span {
    text-transform: none;
    font-weight: normal;
    position: absolute;
    left: 150px;
}
</style>




      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h4> ตัวเลือก การชำระเงินของคุณ</h4>
                    <br />

                </div>


                <div class="col-md-6">
                  <div class="content-current">
                    <p class="spanser"><b>เลือกชำระ ยอดทั้งหมด  ออเดอร์ #{{$order_main->code_gen}}</b></p>
                    <hr />
                    <ul id="profile_summary">
                      <li>ยอดสินค้าที่สั่ง  <span>{{$order_count}} รายการ</span>
                      </li>

                      @if(isset($order_all))
                      @foreach($order_all as $order)
                      <li> &nbsp <span>{{$order->product_name}} x {{$order->sum_image}} pcs.</span>
                      </li>
                      @endforeach
                      @endif
                      <li>การจัดส่ง  <span>{{$order_main->deliver_order}} </span>
                      </li>
                      <li>ยอดที่ต้องชำระ  <span class="text-danger" style="font-size:15px;"><b>{{number_format($order_main->order_price+$order_main->shipping_p,2)}} บาท</b></span>
                      </li>

                    </ul>
                    <p style="font-size:12px;">
                      *หมายเหตุ ราคานี้ได้รวมกับค่าขนส่งเข้าไปแล้ว
                    </p>
                    <hr />
                    <a href="{{url('pay_order_detail/'.$order_main->code_gen)}}" class="btn_1">ชำระเงิน</a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="content-current">
                    <p class="spanser"><b>เลือกชำระ เฉพาะยอดของสินค้านี้ <!--#{{$order_de->code_gen_d}}--></b></p>
                    <hr />

                    <ul id="profile_summary">
                      <li>ชื่อสินค้า  <span>{{$order_de->product_name}}</span>
                      </li>
                      <li>จำนวน  <span>{{$order_de->sum_image}} pcs.</span>
                      </li>
                      <li>รายละเอียด  <span>&nbsp</span>
                      </li>
                      @if($order_de->order_option)
                      @foreach($order_de->order_option as $k1)



                      <li>&nbsp  <span>{{$k1->item_name}}.</span>
                      </li>


                      @endforeach
                      @endif

                      @if($order_main->shipping_p == 0)
                      <li>ยอดที่ต้องชำระ  <span class="text-danger" style="font-size:15px;"><b>{{number_format(($order_de->sum_price*$order_de->sum_image),2)}} บาท</b></span>
                      </li>
                      @else
                      <li>ยอดที่ต้องชำระ  <span class="text-danger" style="font-size:15px;"><b>{{number_format(($order_de->sum_price*$order_de->sum_image)+$order_de->sum_shipping,2)}} บาท</b></span>
                      </li>
                      @endif


                    </ul>
                    <p style="font-size:12px;">
                      *หมายเหตุ ราคานี้ได้รวมกับค่าขนส่งเข้าไปแล้ว
                    </p>
                    <hr />
                    <a href="{{url('pay_order_detail/'.$order_de->code_gen_d)}}" class="btn_1">ชำระเงิน</a>
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
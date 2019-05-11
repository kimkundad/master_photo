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
      <h2 class="major"><span>{{ trans('message.user_order') }} </span></h2>

    </div>

    <div class="row">


      <aside class="col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
							<li><a href="{{url('profile')}}"><i class="icon_set_1_icon-29"></i>{{ trans('message.user_pro') }} </a>
							</li>
							<li><a href="{{url('address_book')}}"><i class="icon_set_1_icon-41"></i>{{ trans('message.address') }} </a>
							</li>
							<li><a href="#"><i class="im im-icon-Gift-Box" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.credit') }} </a>
							</li>
              <li><a href="{{url('my_order')}}" id="active"><i class="icon_set_1_icon-50" ></i> {{ trans('message.user_order') }} </a>
							</li>
              <li><a href="{{url('payment_notify')}}"><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.pay_ment') }} </a>
							</li>

						</ul>
        </div>
      </aside>


<style>
.btn_4{
    border: none;
    font-family: inherit;
    font-size: inherit;
    color: #fff;
    background: #a94442;
    cursor: pointer;
    padding: 7px 8px;
    font-size: 11px;
    line-height: 9px;
    display: block;
    outline: none;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    text-align: center;
}
.btn_4:hover{
	background: #333;
	color:#fff;
}
.strip_booking h3.hotel_booking:before {
    content: '\52';
}
</style>




      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h3>{{ trans('message.user_order') }} </h3>
                    <br />


                    <?php




                     ?>

                    @if(isset($order))
                      @foreach($order as $u)
                    <div class="strip_booking">
        							<div class="row">
        								<div class="col-lg-2 col-md-2">
        									<div class="date">
        										<span class="month">{{date_format(date_create($u->created_at),"M")}}</span>
        										<span class="day"><strong>{{date_format(date_create($u->created_at),"d")}}</strong>{{date_format(date_create($u->created_at),"Y")}}</span>
        									</div>
        								</div>
        								<div class="col-lg-6 col-md-5">
                          <a href="{{url('payment_notify_item2/'.$u->id)}}">
        									<h3 class="hotel_booking">{{$u->code_gen}}<span>{{ trans('message.total_sum') }} {{$u->total}} {{ trans('message.item') }}</span></h3>
                          @if($u->note_admin_user != null)
                          <p style="padding-left: 65px;">
                            หมายเหตุ พนง. : {{ $u->note_admin_user }}
                          </p>
                          @endif
                          </a>
        								</div>
        								<div class="col-lg-2 col-md-3">
        									<ul class="info_booking">
        										<li><strong style="font-size: 14px;">{{ trans('message.price_payment_notify') }}</strong><br /> <span class="text-danger" style="font-size: 16px;">{{number_format($u->order_price+$u->shipping_p, 2)}}</span>
                            <strong style="font-size: 14px;">{{ trans('message.baht') }}</strong>
                          </li>

        									</ul>
        								</div>
        								<div class="col-lg-2 col-md-2">
        									<div class="booking_buttons">
        										<a href="{{url('payment_notify_item2/'.$u->id)}}" class="btn_2">{{ trans('message.View') }}</a>

                            @if($u->status == 1)
                            <button type="button" class="mb-1 mt-1 mr-1 btn btn-xs btn-success btn-block" style="margin-top:3px;">ชำระเงินแล้ว</button>
                            @elseif($u->status == 2)
                            <button type="button" class="mb-1 mt-1 mr-1 btn btn-xs btn-warning btn-block" style="margin-top:3px;">อยู่ระหว่างดำเนินการผลิต</button>
                            @elseif($u->status == 3)
                            <button type="button" class="mb-1 mt-1 mr-1 btn btn-xs btn-primary btn-block" style="margin-top:3px;">จัดส่งเรียบร้อย</button>
                            @elseif($u->status == 4)
                            <button type="button" class="mb-1 mt-1 mr-1 btn btn-xs btn-default btn-block" style="margin-top:3px;">ยกเลิก</button>
                            @else

                            @endif

                            @if($u->pay == 1)
                            <button type="button" class="mb-1 mt-1 mr-1 btn btn-xs btn-warning btn-block" style="margin-top:3px;"><i class="icon-renren-1"></i> โอนธนาคาร</button>
                            @elseif($u->pay == 2)
                            <button type="button" class="mb-1 mt-1 mr-1 btn btn-xs btn-warning btn-block" style="margin-top:3px;"><i class="icon-credit-card-1"></i> 2P2C</button>
                            @elseif($u->pay == 3)
                            <button type="button" class="mb-1 mt-1 mr-1 btn btn-xs btn-primary btn-block" style="margin-top:3px;"><i class="icon-paypal"></i> Paypal</button>
                            @else

                            @endif






        									</div>
        								</div>
        							</div>
        							<!-- End row -->
        						</div>
                      @endforeach
                    @endif









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

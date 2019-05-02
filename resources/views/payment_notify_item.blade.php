@extends('layouts.template')

@section('title')
user profile
@stop

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{url('assets/datetimepicker-master/jquery.datetimepicker.css')}}"/>
<link href="{{url('master/assets/css/admin.css')}}" rel="stylesheet">

@stop('stylesheet')
@section('content')


<main class=" slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span>{{ trans('message.pay_ment') }} </span></h2>

    </div>

    <div class="row">


      <aside class="col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
							<li><a href="{{url('profile')}}" ><i class="icon_set_1_icon-29"></i>{{ trans('message.user_pro') }} </a>
							</li>
							<li><a href="{{url('address_book')}}"><i class="icon_set_1_icon-41"></i>{{ trans('message.address') }} </a>
							</li>
							<li><a href="#"><i class="im im-icon-Gift-Box" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.credit') }} </a>
							</li>
              <li><a href="{{url('my_order')}}"><i class="icon_set_1_icon-50" ></i> {{ trans('message.user_order') }} </a>
							</li>
              <li><a href="{{url('payment_notify')}}" id="active"><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.pay_ment') }} </a>
							</li>

						</ul>
        </div>
      </aside>


<style>
.strip_booking h3.hotel_booking:before {
    content: '\52';
}
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
</style>

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


      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h3>{{ trans('message.pay_ment') }} <span>( #{{$order->code_gen}} )</span></h3>
                    <br />



            @if(isset($order_de))
              @foreach($order_de as $j)
              <div class="strip_booking">
  							<div class="row">
  								<div class="col-lg-2 col-md-2">
  									<img src="{{url('assets/image/product/'.$j->pro_image)}}" class="img-fluid styled" style="width:94px; box-shadow: 0 0 5px 0 rgba(0,0,0,.1);" />
  								</div>
  								<div class="col-lg-5 col-md-5">
  									<h3 style="padding-left: 5px;">{{$j->product_name}} <span style="line-height: 16px;">
                      {{ trans('message.number_jum') }} {{$j->sum_image}} {{ trans('message.Piece') }} <br />
                      @if(isset($j->get_all_option))
                      @foreach($j->get_all_option as $k)

                      {{$k->get_option->item_name}} /
                      @endforeach
                    @endif
                    </span></h3>
  								</div>
  								<div class="col-lg-3 col-md-3">
  									<ul class="info_booking">
  										<li><strong>ORDER_DETAIL id #{{$j->code_gen_d}}</strong> </li>
  										<li><strong>{{ trans('message.Transaction_date') }}</strong> <?php echo DateThai($j->created_ats); ?></li>
  									</ul>
  								</div>
  								<div class="col-lg-2 col-md-2">
  									<div class="booking_buttons">
                      <a href="{{url('pay_order_choose/'.$j->id_de)}}" class="btn_4">{{ trans('message.Payment_order') }}</a>
  										<a href="{{url('my_order_detail/'.$j->id_de)}}" style="margin-top: 3px;" class="btn_2">{{ trans('message.View') }}</a>

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
<script src="{{url('assets/datetimepicker-master/build/jquery.datetimepicker.full.js')}}"></script>



<script type="text/javascript">

    jQuery(document).ready(function () {
        'use strict';

        jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker({
          timepicker:false,
 format:'d/m/Y'
        });

        jQuery('#datetimepicker2').datetimepicker({
          allowTimes:[
          '22:00', '22:30', '23:00', '23:30', '24:00', '24:30',
          '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30', '05:00', '05:30', '06:00', '06:30',
          '07:00', '07:30', '08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30',
          '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30',
          '19:00', '19:30', '20:00', '20:30', '21:00'
        ],
  datepicker:false,
  format:'H:i'
});




    });
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

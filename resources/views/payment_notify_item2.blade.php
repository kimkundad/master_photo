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
      <h2 class="major"><span>{{ trans('message.user_order') }} </span></h2>

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
              <li><a href="{{url('my_order')}}" id="active"><i class="icon_set_1_icon-50" ></i> {{ trans('message.user_order') }} </a>
							</li>
              <li><a href="{{url('payment_notify')}}" ><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.pay_ment') }} </a>
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
address {
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    font-size: 11px;
    border-radius: 0.25rem;
    margin-bottom: 8px;
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
            <div class="" id="tools">
              <h4>{{ trans('message.user_order') }} #Oder ID {{$order->code_gen}}</h4>
            </div>

            <div class="bill-info" >
              <table class="table " style="margin-bottom: 0px; border-bottom: 1px solid #fff;">
              <div class="row">
                <td style="border-top: 1px solid #fff; padding: 0px; padding-right: 8px; width:50%">
                <div class="col-md-6" style="width:100%">
                  <div class="bill-to" style="width:100%">
                    <p class="h5 mb-1 text-dark font-weight-semibold">ผู้สั่งซื้อ</p>
                    <address>
                      <b>ชื่อ - นามสกุล </b> {{$order->name}}
                      <br/>
                      <b>ที่อยู่ </b> {{$get_address->address_ad}} {{$subdistricts->DISTRICT_NAME}} {{$district->AMPHUR_NAME}} {{$province->PROVINCE_NAME}} {{$get_address->zip_code}}
                      <br/>
                      <b>เบอร์ติดต่อ </b>: {{$get_address->phone_ad}}
                      <br/>
                      <b>Email </b> {{$order->email}}
                    </address>
                  </div>
                </div>
                </td>
                <td style="border-top: 1px solid #fff; padding: 0px; width:50%">
                <div class="col-md-6" style="width:100%">
                  <div class="bill-to" style="width:100%">
                    <p class="h5 mb-1 text-dark font-weight-semibold">สถานที่จัดส่ง</p>
                    <address>
                      <b>วิธีการรับสินค้า </b> {{$order->name_deli}}
                      <br/>
                      <b>สถานที่ </b>
                       @if($order->bill_address == 2)
                       {{$order->shipping_t2}}
                       @endif
                       {{$get_address->address_ad}} {{$subdistricts->DISTRICT_NAME}} {{$district->AMPHUR_NAME}} {{$province->PROVINCE_NAME}} {{$get_address->zip_code}}
                    </address>
                  </div>
                </div>
                </td>
              </div>
              </table>
            </div>


            <div class="table-responsive" style="padding: 10px;">
            <table class="table table-bordered">
              <thead>
                <tr class="text-dark">

                  <th  class="font-weight-semibold">รายการ</th>
                  <th  class="font-weight-semibold">จำนวน</th>
                  <th  class="text-center font-weight-semibold">ราคาต่อใบ</th>
                  <th  class="text-center font-weight-semibold">รวมเงิน</th>

                </tr>
              </thead>
              <tbody>


                @if(isset($order_de))
                  @foreach($order_de as $a)
                <tr >
                  <td class="font-weight-semibold text-dark" style="font-size: 12px;">{{$a->pro_name}}
                  <br />
                    <span style="font-size:11px; margin-left:25px;">

                      @if(isset($a->get_all_option))
                      @foreach($a->get_all_option as $k)

                      {{$k->get_option->item_name}} /
                      @endforeach
                    @endif


                  </span>

                  </td>
                  <td class="text-center">{{$a->sum_image}}</td>
                  <td class="text-center">{{$a->sum_price}}</td>
                  <td class="text-center">
                  @if($order->shipping_p == 0)
                  {{number_format(($a->sum_price*$a->sum_image),2)}} {{ trans('message.baht') }}
                  @else
                  {{number_format((($a->sum_price*$a->sum_image)),2)}} {{ trans('message.baht') }}
                  @endif


                  </td>
                </tr>

                @endforeach
              @endif



                <tr>
                  <td colspan="3" class="text-right">ค่าจัดส่ง</td>
                  <td class="text-center">{{number_format($order->shipping_p, 2)}} </td>
                </tr>
                <tr class="h4">
                  <td colspan="3" class="text-right">Total</td>

                  <td class="text-center">

                    {{number_format(($order->order_price)+$order->shipping_p, 2)}}



                  </td>
                </tr>

              </tbody>
            </table>
            </div>

                                <div class="bil_detail" style="padding: 10px;">


                                  <div class="bill-to" style="width:100%; margin-bottom: 15px; margin-top:10px;">
                                    <p class="h6  text-dark font-weight-semibold" style="font-size:30px;">หมายเหตุ : </p>
                                    <address>
                                       {{$order->note}}


                                    </address>
                                  </div>


                                </div>







<hr />


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

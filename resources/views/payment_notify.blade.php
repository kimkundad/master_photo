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




      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h3>{{ trans('message.pay_ment') }} </h3>
                    <br />

            @if(isset($get_order))
              @foreach($get_order as $u)
            <div class="strip_booking">
							<div class="row">
								<div class="col-lg-2 col-md-2">
									<div class="date">
										<span class="month">{{date_format(date_create($u->created_at),"M")}}</span>
										<span class="day"><strong>{{date_format(date_create($u->created_at),"d")}}</strong>{{date_format(date_create($u->created_at),"Y")}}</span>
									</div>
								</div>
								<div class="col-lg-6 col-md-5">
                  <a href="{{url('payment_notify_item/'.$u->id)}}">
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
										<a href="{{url('payment_notify_item/'.$u->id)}}" class="btn_2">{{ trans('message.View') }}</a>
										<a href="{{url('payment_choose/'.$u->code_gen)}}" style="margin-top: 3px;" class="btn_4">{{ trans('message.Payment_order') }}</a>
									</div>
								</div>
							</div>
							<!-- End row -->
						</div>
              @endforeach
            @endif


<!--

                    <form class="form-horizontal" action="{{url('post_payment_notify')}}" method="post" enctype="multipart/form-data">

											{{ csrf_field() }}

                      @if($get_order_count > 0)

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">สถานะออเดอร์</label>
                        <div class="col-md-8">
                          <select name="order_id" class="form-control mb-md" required>
                            <option value=""> กรุณาเลือกออเดอร์ </option>
                            @if(isset($get_order))
                              @foreach($get_order as $u)
                            <option value="{{$u->code_gen}}"> #{{$u->code_gen}} {{$u->name_pro}}</option>
                              @endforeach
                            @endif

                          </select>
                          @if ($errors->has('order_id'))
                          <p class="text-danger" style="margin-top:10px;">
                            คุณต้องกรอก เลขคำสั่งซื้อ ด้วยค่ะ
                          </p>
                          @endif
                            <br />
                          </div>
                      </div>

                      @else

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Order_number') }}*</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="order_id" value="{{ old('order_id')}}" >
                          @if ($errors->has('order_id'))
                          <p class="text-danger" style="margin-top:10px;">
                            คุณต้องกรอก เลขคำสั่งซื้อ ด้วยค่ะ
                          </p>
                          @endif
                            <br />
                        </div>
                      </div>

                      @endif





                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.name_pro') }}*</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name" value="{{ old('name')}}" >
                          @if ($errors->has('name'))
                          <p class="text-danger" style="margin-top:10px;">
                            คุณต้องกรอก ชื่อ-นามสกุล ด้วยค่ะ
                          </p>
                          @endif
                            <br />
                        </div>
                      </div>



                      <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Which_bank') }}*</label>

                      <label class="col-md-9 control-label" for="profileFirstName">
                        @if ($errors->has('bank'))
                        <p class="text-danger text-right" style="margin-top:10px;">
                          คุณต้องเลือก โอนเงินเข้าธนาคาร ด้วยค่ะ
                        </p>
                        @endif
                        .</label>

                        <br />
                      @if($bank)
                                                  @foreach($bank as $u)
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName"></label>

                          <label class="image-radio col-md-8"  id="radio_get" style="font-size:12px;">
                            <input type="radio" name="bank" value="{{$u->id}}" />
                            <i class="icon-check-1 hidden"></i>
                            <img src="{{url('assets/images/bank/'.$u->bank_img)}}"
                              class="img-responsive" style="height:25px; float:left; margin-right:6px;"> {{$u->name_bank}} {{$u->name_b}} {{$u->name_no_b}}
                          </label >

                      </div>
                      @endforeach
                                                    @endif




                                                    <div class="form-group">
                                                      <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.money_bank') }}*</label>
                                                      <div class="col-md-8">
                                                        <input type="text" class="form-control" name="money" value="{{ old('money')}}" >
                                                        @if ($errors->has('money'))
                                                        <p class="text-danger" style="margin-top:10px;">
                                                          คุณต้องกรอก จำนวนเงิน ด้วยค่ะ
                                                        </p>
                                                        @endif
                                                          <br />
                                                      </div>
                                                    </div>


                                                    <div class="form-group">
                                                      <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Time_to_transfer_money') }}*</label>
                                                      <div class="col-md-4">
                                                        <input type="text" class="form-control date-pick" name="filter_date" id="filter-date" value="<?php echo date('d/m/Y')?>"/>
                                                        @if ($errors->has('filter_date'))
                                                        <p class="text-danger" style="margin-top:10px;">
                                                          คุณต้องกรอก วันที่-เวลาโอนเงิน ด้วยค่ะ
                                                        </p>
                                                        @endif
                                                          <br />
                                                      </div>

                                                      <div class="col-md-4">
                                                        <input type="text" class="form-control date" name="time2_tran" id='datetimepicker2' value="<?php echo date('H:i')?>"/>


                                                          <br />
                                                      </div>
                                                    </div>


                                                    <div class="form-group">
                                                      <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Money_transfer_slip') }}*</label>
                                                      <div class="col-md-8">
                                                        <input type="file" name="image">
                                                        @if ($errors->has('filter_date'))
                                                        <p class="text-danger" style="margin-top:10px;">
                                                          คุณต้องแนบ สลิปการโอนเงิน ด้วยค่ะ
                                                        </p>
                                                        @endif
                                                          <br />
                                                      </div>
                                                    </div>
                                                    <hr />



                    <div class="col-md-12 text-center" >

                      <button type="submit" class="btn btn-next">{{ trans('message.sub_memory') }}</button>
                      <a href="{{url('profile')}}" class="btn btn-default">{{ trans('message.btn_cancel') }}</a>
                  </div>
                    </form>

                  -->


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

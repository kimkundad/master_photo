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
      <h2 class="major"><span>Profile & Setting </span></h2>

    </div>

    <div class="row">


      <aside class="col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
							<li><a href="{{url('profile')}}" ><i class="icon_set_1_icon-29"></i>ข้อมูลส่วนตัว </a>
							</li>
							<li><a href="{{url('address_book')}}"><i class="icon_set_1_icon-41"></i>สมุดที่อยู่ </a>
							</li>
							<li><a href="#"><i class="im im-icon-Gift-Box" style="margin-right:10px; margin-left:5px;"></i> คูปองส่วนลด </a>
							</li>
              <li><a href="{{url('my_order')}}"><i class="icon_set_1_icon-50" ></i> รายการสั่งซื้อของฉัน </a>
							</li>
              <li><a href="{{url('payment_notify')}}" id="active"><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> แจ้งการชำระเงิน </a>
							</li>

						</ul>
        </div>
      </aside>







      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h3>แจ้งการชำระเงิน </h3>
                    <br />


                    <form class="form-horizontal" action="{{url('post_payment_notify')}}" method="post" enctype="multipart/form-data">

											{{ csrf_field() }}

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">เลขคำสั่งซื้อ*</label>
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

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">ชื่อ-นามสกุล*</label>
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

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">อีเมล์*</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="email" value="{{ old('email')}}" >
                          @if ($errors->has('email'))
                          <p class="text-danger" style="margin-top:10px;">
                            คุณต้องกรอก อีเมล์ ด้วยค่ะ
                          </p>
                          @endif
                            <br />
                        </div>
                      </div>
                      <label class="col-md-3 control-label" for="profileFirstName">โอนเงินเข้าธนาคารไหน*</label>

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
                                                      <label class="col-md-3 control-label" for="profileFirstName">จำนวนเงิน*</label>
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
                                                      <label class="col-md-3 control-label" for="profileFirstName">วันที่-เวลาโอนเงิน*</label>
                                                      <div class="col-md-8">
                                                        <input type="text" class="form-control date-pick" name="filter_date" id="filter-date" value="<?php echo date('d/m/Y H:i')?>"/>
                                                        @if ($errors->has('filter_date'))
                                                        <p class="text-danger" style="margin-top:10px;">
                                                          คุณต้องกรอก วันที่-เวลาโอนเงิน ด้วยค่ะ
                                                        </p>
                                                        @endif
                                                          <br />
                                                      </div>
                                                    </div>


                                                    <div class="form-group">
                                                      <label class="col-md-3 control-label" for="profileFirstName">สลิปการโอนเงิน*</label>
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

                    <button type="submit" class="btn btn-next">ส่งข้อมูล</button>
                    <a href="{{url('profile')}}" class="btn btn-default">ยกเลิก</a>
                  </div>
                    </form>


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

        jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker();




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

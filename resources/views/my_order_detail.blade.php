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
              <li><a href="{{url('my_order')}}" ><i class="icon_set_1_icon-50" ></i> {{ trans('message.user_order') }} </a>
							</li>
              <li><a href="{{url('payment_notify')}}" id="active"><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.pay_ment') }} </a>
							</li>

						</ul>
        </div>
      </aside>


<style>
address {
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    font-size: 11px;
    border-radius: 0.25rem;
    margin-bottom: 8px;
}
</style>




      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
              <div class="" id="tools">
                <h4>#Oder ID {{$order_main->code_gen}}</h4>
              </div>


                    <div class="bill-info" >
                      <table class="table " style="margin-bottom: 0px; border-bottom: 1px solid #fff;">
              				<div class="row">
                        <td style="border-top: 1px solid #fff; padding: 0px; padding-right: 8px; width:50%">
              					<div class="col-md-6" style="width:100%">
              						<div class="bill-to" style="width:100%">
              							<p class="h5 mb-1 text-dark font-weight-semibold">ผู้สั่งซื้อ</p>
              							<address>
                              <b>ชื่อ - นามสกุล </b> {{$order_main->name}}
              								<br/>
              								<b>ที่อยู่ </b> {{$get_address->address_ad}} {{$subdistricts->DISTRICT_NAME}} {{$district->AMPHUR_NAME}} {{$province->PROVINCE_NAME}} {{$get_address->zip_code}}
              								<br/>
              								<b>เบอร์ติดต่อ </b>: {{$get_address->phone_ad}}
              								<br/>
              								<b>Email </b> {{$order_main->email}}
              							</address>
              						</div>
              					</div>
                        </td>
                        <td style="border-top: 1px solid #fff; padding: 0px; width:50%">
              					<div class="col-md-6" style="width:100%">
                          <div class="bill-to" style="width:100%">
              							<p class="h5 mb-1 text-dark font-weight-semibold">สถานที่จัดส่ง</p>
              							<address>
              								<b>วิธีการรับสินค้า </b> {{$order_main->name_deli}}
              								<br/>
              								<b>สถานที่ </b>
              								 @if($order_main->bill_address == 2)
              								 {{$order_main->shipping_t2}}
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



    <tr >
      <td class="font-weight-semibold text-dark" style="font-size: 12px;">{{$order_de->pro_name}}
      <br />
        <span style="font-size:11px; margin-left:25px;">
        @if(isset($order_de->order_option))
        @foreach($order_de->order_option as $k1)
        {{$k1->item_name}} &nbsp
        @endforeach
        @endif
      </span>

      </td>
      <td class="text-center">{{$order_de->sum_image}}</td>
      <td class="text-center">{{$order_de->sum_price}}</td>
      <td class="text-center">
      @if($order_main->shipping_p == 0)
      {{$order_de->sum_price*$order_de->sum_image}}
      @else
      {{($order_de->sum_price*$order_de->sum_image)}}
      @endif
      </td>
    </tr>



    <tr>
      <td colspan="3" class="text-right">ค่าจัดส่ง</td>
      <td class="text-center">{{number_format($order_main->shipping_p, 2)}} </td>
    </tr>
    <tr class="h4">
      <td colspan="3" class="text-right">Total</td>
      <td class="text-center">

        {{number_format(($order_de->sum_price*$order_de->sum_image)+$order_main->shipping_p, 2)}}



      </td>
    </tr>

  </tbody>
</table>
</div>

                    <div class="bil_detail" style="padding: 10px;">


                      <div class="bill-to" style="width:100%; margin-bottom: 15px; margin-top:10px;">
                        <p class="h6  text-dark font-weight-semibold">หมายเหตุ : </p>
                        <address>
                           {{$order_main->note}}


                        </address>
                      </div>







                    </div>

                    <!--

                    <p>
                    {{ trans('message.pro_name') }} : {{$order_de->product_name}}<br />

                    {{ trans('message.total_sum') }} : {{$order_de->sum_image}} รูป<br />
                    {{ trans('message.shipping_address') }} : {{$objs->deliver_order}} ,@if($objs->deliver_order != null) {{$objs->shipping_t2}} @else @endif<br />
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Requesting_a_tax_invoice') }}</label>

                      @if( $objs->bil_req == 0)
                      {{ trans('message.Don_ask') }}
                      @endif

                      @if( $objs->bil_req == 1)
                      {{ trans('message.Request_tax_invoice') }}
                      @endif

                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Choose_to_send_a_tax_invoice') }}</label>

                      @if( $objs->text_re_user == 1)
                      {{ trans('message.Use_shipping_address') }}
                      @endif

                      @if( $objs->text_re_user == 2)
                      {{ trans('message.Use_the_address_that') }}
                      @endif


                    </div>
                    <br />
                    <b>{{ trans('message.Shipping_address_1') }}</b><br />
                    <hr />
                    <fieldset>
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.name_pro') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$get_address->name_ad}}">
                          </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.telephone_num') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$get_address->phone_ad}}">
                          </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.address_1') }}</label>
                        <div class="col-md-8">
                          <textarea class="form-control" name="pro_name_detail" rows="6">{{ $get_address->address_ad }}</textarea>
                          </div>
                      </div>



                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.province') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$province->PROVINCE_NAME}}">
                          </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.District') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$district->AMPHUR_NAME}}">
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Subdistrict') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$subdistricts->DISTRICT_NAME}}">
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.zip_code') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$get_address->zip_code}}">
                          </div>
                      </div>

                      </fieldset>
                      <hr />



                      <br />
                      <b>{{ trans('message.Use_the_address_that') }}</b><br />
                      <hr />


                      @if($get_address_bill != null)



                      <fieldset>
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.name_pro') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$get_address_bill->name_ad}}">
                            </div>
                        </div>


                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.telephone_num') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$get_address_bill->phone_ad}}">
                            </div>
                        </div>


                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.address_1') }}</label>
                          <div class="col-md-8">
                            <textarea class="form-control" name="pro_name_detail" rows="6">{{ $get_address_bill->address_ad }}</textarea>
                            </div>
                        </div>



                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.province') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$province_bill->PROVINCE_NAME}}">
                            </div>
                        </div>


                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.District') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$district_bill->AMPHUR_NAME}}">
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Subdistrict') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$subdistricts_bill->DISTRICT_NAME}}">
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.zip_code') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$get_address_bill->zip_code}}">
                            </div>
                        </div>

                        </fieldset>


                      @endif


                    <b>Option</b><br />
                    @if($order_de->order_option)
                    @foreach($order_de->order_option as $k1)


                    {{$k1->item_name}} <br />



                    @endforeach
                    @endif


                    </p>
                    <hr />
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

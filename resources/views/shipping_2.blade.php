@extends('layouts.template')

@section('title')
Shipping | MASTER PHOTO NETWORK
@stop

@section('stylesheet')

@stop('stylesheet')
@section('content')



<main class="slider-pro">


  <style>
  .f1-step {
  width: 25%;
  }
  .table {
  margin-bottom: 0px;
  }
  </style>

  <div class="container margin_60">

    <div class="f1-steps">
      <div class="f1-progress">
          <div class="f1-progress-line" data-now-value="13.66" data-number-of-steps="4" style="width: 38%;"></div>
      </div>
      <div class="f1-step active">
        <div class="f1-step-icon"><i class=" icon-basket-1"></i></div>
        <p>Cart</p>
      </div>
      <div class="f1-step active">
        <div class="f1-step-icon"><i class=" icon-truck"></i></div>
        <p>Shipping</p>
      </div>
        <div class="f1-step">
        <div class="f1-step-icon"><i class=" icon-dollar"></i></div>
        <p>Payment</p>
      </div>
      <div class="f1-step">
      <div class="f1-step-icon"><i class=" icon-check-3"></i></div>
      <p>Order Complete</p>
    </div>
    </div>
    <?php
      $total_pay = 0;
      $total_img = 0;
     ?>
@foreach(Session::get('cart') as $u)
<?php
$total_pay += ($u['data'][3]['sum_price']*$u['data'][2]['sum_image']);
$total_img += $u['data'][2]['sum_image'];
 ?>
@endforeach

    <div class="row margin_30">
      <form action="{{url('/add_order')}}" method="post" enctype="multipart/form-data" name="product">
        {{ csrf_field() }}
      <div class="col-md-8 box_style_1  add_bottom_15">


        <div class="box_style_1 visible-sm visible-xs">

          <table class="table table_summary" style="font-size: 14px;">
            <tbody>


              <tr>
                <td>
                  Point Order
                </td>
                <td class="text-right">
                  xxx
                </td>
              </tr>

              <tr>
                <td>
                  Total
                </td>
                <td class="text-right">
                  {{sizeof(Session::get('cart'))}}
                </td>
              </tr>
              <tr>
                <td>
                  Discount
                </td>
                <td class="text-right">
                  0
                </td>
              </tr>

              <tr class="total" style="font-size: 18px;">
                <td>
                  Summary
                </td>
                <td class="text-right" >
                  ฿ {{number_format((float)$total_pay, 2, '.', '')}}
                </td>
              </tr>
            </tbody>
          </table>

        </div>


        <div class="row">
          <div class="col-md-12 col-sm-12">
            @if ($errors->has('address_shipping_order'))
            <p class="text-danger" style="margin-top:10px;">
            <b><i style="font-size:16px;" class="im im-icon-Information"></i></b>  กรุณากดเลือกหรือทำการสร้างที่อยู่ในการจัดส่งด้วย
            </p>
            <hr />
            @endif
            @if ($errors->has('deliver_order'))
            <p class="text-danger" style="margin-top:10px;">
            <b><i style="font-size:16px;" class="im im-icon-Information"></i></b>  กรุณากดเลือกรูปแบบการจัดส่ง
            </p>
            <hr />
            @endif
          @if ($errors->has('c1'))
          <p class="text-danger" style="margin-top:10px;">
          <b><i style="font-size:16px;" class="im im-icon-Information"></i></b>  กรุณากดยอมรับข้อกำหนดและเงื่อนไขและนโยบายของเว็บไซต์ เพื่อทำขั้นตอนต่อไป
          </p>
          <hr />
          @endif
          </div>
        </div>

        <div class="form_title">
          <h3><strong>1</strong>ที่อยู่ในการจัดส่ง/ใบกำกับภาษี</h3>
          <p style="font-size:14px; margin-top:10px;">
            ลูกค้าสามารถเข้าไปจัดการ ที่อยู่ในการจัดส่ง และ ใบกำกับภาษี <a href="{{url('/address_book')}}">แก้ไข</a>
          </p>

        </div>
        <div class="step">
          <div class="row">

            @if($check_address != 10)


            @if($check_address == 3)
            <p style="font-size:14px; margin-top:10px;">
              {{$package->name_ad}}, {{$package->phone_ad}}
            </p>
            <p style="font-size:14px; margin-top:10px;">
              {{$package->address_ad}} {{$subdistricts->DISTRICT_NAME}} {{$district->AMPHUR_NAME}} {{$province->PROVINCE_NAME}} {{$package->zip_code}}
              <input type="hidden" name="address_shipping_order" value="{{$package->id}}" />
              <input type="hidden" name="address_type_order" value="{{$check_address}}" />
            </p>

            <p class="text-success" style="font-size:15px; margin-top:10px; ">
              <b><i class="sl sl-icon-check text-success"></i></b> ลูกค้าใช้ ที่อยู่ในการออกใบกำกับภาษีใช้ที่อยู่เดียวกับการจัดส่ง <a href="{{url('/address_book')}}">แก้ไข</a>
            </p>
            <hr />
            @endif


            @if($check_address == 1)
            <input type="hidden" name="address_shipping_order" value="{{$package->id}}" />
            <input type="hidden" name="address_bill_order" value="{{$package_1->id}}" />
            <input type="hidden" name="address_type_order" value="{{$check_address}}" />
            <p style="font-size:14px; margin-top:10px;">
              {{$package->name_ad}}, {{$package->phone_ad}}
            </p>
            <p style="font-size:14px; margin-top:10px;">
              {{$package->address_ad}} {{$subdistricts->DISTRICT_NAME}} {{$district->AMPHUR_NAME}} {{$province->PROVINCE_NAME}} {{$package->zip_code}}
            </p>

            <p class="text-success" style="font-size:14px; margin-top:10px; ">
              <b><i class="sl sl-icon-check "></i> ลูกค้าใช้ ที่อยู่นี้ ในการจัดส่ง <a href="{{url('/address_book')}}">แก้ไข</a> </b>
            </p>
            <hr />
            <p style="font-size:14px; margin-top:10px;">
              {{$package_1->name_ad}}, {{$package_1->phone_ad}}
            </p>
            <p style="font-size:14px; margin-top:10px;">
              {{$package_1->address_ad}} {{$subdistricts1->DISTRICT_NAME}} {{$district1->AMPHUR_NAME}} {{$province1->PROVINCE_NAME}} {{$package_1->zip_code}}
            </p>

            <p class="text-success" style="font-size:14px; margin-top:10px; ">
              <b><i class="sl sl-icon-check "></i> ลูกค้าใช้ ที่อยู่นี้ ในการออกใบกำกับภาษี <a href="{{url('/address_book')}}">แก้ไข</a> </b>
            </p>
            <hr />
            @endif



            <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label class="image-radio"  id="radio_get" style="font-size:15px;">
                        <input type="checkbox" name="check_order" value="1" />
                        <ins class="iCheck-helper" onclick="myFunction()" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        <i class="icon-check-1 hidden"></i>ขอใบกำกับภาษี.</label >
                    </div>
                  </div>

            @else


            <p class="text-danger" style="font-size:14px; margin-top:10px; ">ลูกค้าได้ทำการตั้งที่อยู่ ทุกที่วานอยู่ในสถสนะ ว่าง (*หรือไม่ใช้งาน) ทั้งหมด  <a href="{{url('/address_book')}}"> <i class="icon_set_1_icon-41"></i> เข้าไปตั้งค่า</a></p>

            @endif











                    <div id="dvPassport" style="display:none">
                      <div class="col-md-12">


                          <div class="form-group ">
                            <label>เลือกที่จัดส่งใบกำกับภาษี <span class="text-danger">*</span></label>
                            <select id="text_re_user" onchange="getComboA(this)" name="text_re_user" class="form-control " >

                            <option value="1">1. ใช้ที่อยู่จัดส่ง</option>
                            <option value="2">2. ใช้ที่อยู่ที่เคยออกใบกำกับภาษี</option>
                            <option value="3">3. กำหนดเอง</option>
                            </select>

                          </div>



                      </div>



                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>เลขประจำตัวผู้เสียภาษี <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="id_card_no" placeholder="กรุณาระบุเลขประจำตัวผู้เสียภาษี" value="{{ old('id_card_no', Auth::user()->id_card_no)}}">
                          @if ($errors->has('id_card_no'))
                          <p class="text-danger" style="margin-top:10px;">
                            {{ $errors->first('id_card_no') }}
                          </p>
                          @endif

                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>รหัสสาขา (ถ้ามี) </label>
                          <input type="text" name="branch_code" value="{{ old('branch_code', Auth::user()->branch_code)}}" placeholder="กรุณากรอกรหัสสาขา (ถ้ามี)" class="form-control">

                        </div>
                      </div>
                    </div>

                    @if($get_my_add_count > 0)


                    <div id="new_address_bill" style="display:none">
                      @if($get_my_add)
                      @foreach($get_my_add as $add)
                      <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                                <label class="image-radio"   style="font-size:15px;">
                                  <input type="radio" name="address_old" value="1" />
                                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                  <i class="icon-check-1 hidden"></i>{{$add->address_ad}} {{$add->subdistrictsz}} {{$add->districtz}} {{$add->provincez}} {{$add->zip_code}}</label >
                        </div>
                      </div>
                      @endforeach
                      @endif
                    </div>


                    @else
                    <label id="new_address_bill_x">คุณยังไม่มี ที่อยู่ ใบกำกับภาษี</label>
                    @endif


                    <div id="new_address1" style="display:none">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>ชื่อ-สกุล <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="name" value="{{ old('name') }}" >

                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label>เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" >

                        </div>
                      </div>


                      <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                          <label>ที่อยู่ <span class="text-danger">*</span></label>
                          <div >
          								<input type="text" class="form-control" id="address-form" name="address" placeholder="บ้านเลขที่.." value="{{ old('address') }}">

                          @if ($errors->has('address'))
                          <p class="text-danger" id="danger_address" style="margin-top:10px;">
                            {{ $errors->first('address') }}
                          </p>
                          @endif

          							</div>

                        </div>
                      </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>จังหวัด <span class="text-danger">*</span></label>

                            <select id="province" name="province" class="form-control " >

                            <option value="">- กรุณาเลือกจังหวัด -</option>

                            </select>
                            @if ($errors->has('province'))
                            <p class="text-danger" id="danger_province" style="margin-top:10px;">
                              {{ $errors->first('province') }}
                            </p>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>เขต/อำเภอ <span class="text-danger">*</span></label>
                            <select id="amphur" name="amphur" class="form-control " >

                            <option value="">- กรุณาเลือกอำเภอ -</option>

                            </select>
                            @if ($errors->has('province'))
                            <p class="text-danger" id="danger_amphur" style="margin-top:10px;">
                              {{ $errors->first('province') }}
                            </p>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>แขวง/ตำบล <span class="text-danger">*</span></label>
                            <select id="district" name="district" class="form-control " >

                            <option value="">- กรุณาเลือกตำบล -</option>

                            </select>
                            @if ($errors->has('province'))
                            <p class="text-danger" id="danger_district" style="margin-top:10px;">
                              {{ $errors->first('province') }}
                            </p>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                            <input type="text" id="postcode" name="postcode" placeholder="รหัสไปรษณีย์ " class="form-control" value="{{ old('postcode') }}">
                            @if ($errors->has('postcode'))
                            <p class="text-danger" id="danger_postcode" style="margin-top:10px;">
                              {{ $errors->first('postcode') }}
                            </p>
                            @endif
                          </div>
                        </div>

                    </div>


          </div>


        </div>
        <!--End step -->


        <div class="form_title">
          <h3><strong>2</strong>รูปแบบการจัดส่ง</h3>
          <p style="font-size:14px; margin-top:5px;">
            ราคาจะคิดเพิ่มเติมในแต่ละประเภทของการจัดส่ง หรือตามเงื่อนไขของเว็บไซต์
          </p>
        </div>
        <div class="step">

          <div class="row">


            <div class="col-md-6 col-sm-12 ">
                     <div class="form-group ">

                       <label>เลือกรูปแบบการจัดส่ง</label>
                        <select class="form-control" onchange="getComboB(this)" id="shipping_optional" name="deliver_order" required="">
                              <option value="0" data-value="0">-- กรุณาเลือกวิธีรับสินค้า --</option>
                              <option value="จัดส่งด่วน 1 วัน แบบ Express" data-value="2">จัดส่งด่วน 1 วัน แบบ Express</option>
                              <option value="จัดส่งทางไปรษณีย์ EMS" data-value="3">จัดส่งทางไปรษณีย์ EMS</option>
                              <option value="จัดส่งผ่านทางรถ บขส." data-value="4">จัดส่งผ่านทางรถ บขส.</option>
                              <option value="จัดส่งผ่านทางรถตู้" data-value="5">จัดส่งผ่านทางรถตู้</option>
                              <option value="จัดส่งผ่านทางรถไฟ " data-value="6">จัดส่งผ่านทางรถไฟ </option>
                              <option value="ทางร้านจัดส่ง Delivery" data-value="7">ทางร้านจัดส่ง Delivery </option>
                              <option value="รับสินค้าด้วยตัวเอง" data-value="8"> รับสินค้าด้วยตัวเอง</option>

                        </select>
                      </div>
                      <br>
                   </div>

                   <div class="col-md-12 col-sm-12 " id="option_select_op2" style="display:none">
                     <p>
                        ทางร้านจะคิดค่าจัดส่ง Kerry Express ตามปริมาตรที่ทาง Kerry Express คิดบวกค่าวัสดุห่อตามขนาดและน้ำหนักของรูปที่สั่งอัด
                     </p>
                   </div>

                   <div class="col-md-12 col-sm-12 " id="option_select_op3" style="display:none">
                     <p>
                        ทางร้านจะคิดค่าจัดส่งEMSตามน้ำหนักที่ทางไปรษณีย์คิดบวกค่าวัสดุห่อตามขนาดและน้ำหนักของรูปที่สั่งอัด
                     </p>
                   </div>

                   <div class="col-md-12 col-sm-12 " id="option_select_op4" style="display:none">
                     <p>
                       อีกทางเลือกสำหรับลูกค้าที่อยู่ต่างจังหวัด ทางร้านสามารถจัดส่งผ่านทางรถ บ.ข.ส. ที่วิ่งระหว่างจังหวัดได้ค่ะ ซึ่งทั้งสะดวก รวดเร็ว และประหยัดมากๆค่ะ
สนใจติดต่อได้ที่เบอร์โทร 02-513-0105 ทุกวัน เวลา 8.00-22.00น.
                     </p>

                     <div class="form-group ">

                       <label>กรุณาเลือกรถ บขส.</label>


                        <select class="form-control" name="bus_shipping">
                        <option value="เลือกเขตพื้นที่" selected="selected">เลือกรถ บขส.</option>
                        <option value="999">999 ค่าจัดส่ง 210 บาท</option>
                        <option value="กิจการทัวร์">กิจการทัวร์  ค่าจัดส่ง  250 บาท </option>
                        <option value="โชครุ่งทวี">โชครุ่งทวี  ค่าจัดส่ง 210 บาท</option>

                        <option value="นครชัยแอร์">นครชัยแอร์  ค่าจัดส่ง 150 บาท</option>
              		  <option value="เพชรประเสริฐ">เพชรประเสริฐ  ค่าจัดส่ง 150 บาท</option>
                        <option value="สมบัติทัวร์">สมบัติทัวร์  ค่าจัดส่ง 210 บาท</option>
                        <option value="สยามเฟิร์ส">สยามเฟิร์ส  ค่าจัดส่ง 100 บาท</option>
                        <option value="สหพันธ์ร้อยเอ็ด">สหพันธ์ร้อยเอ็ด  ค่าจัดส่ง 210 บาท</option>
                        <option value="แสงประทีป">แสงประทีป  ค่าจัดส่ง 210 บาท</option>
                        <option value="แอร์เมืองเลย">แอร์เมืองเลย  ค่าจัดส่ง 210 บาท</option>


              	      <option value="SP สุภาภัณฑ์">SP สุภาภัณฑ์   ค่าจัดส่ง เก็บปลายทาง บาท</option>
              	      <option value="SD เอส.ดี.">SD เอส.ดี.  ค่าจัดส่ง เก็บปลายทาง บาท</option>
              	      <option value="SDS">SDS  ค่าจัดส่ง เก็บปลายทาง บาท</option>
              	      <option value="PL พีแอล">PL พีแอล  ค่าจัดส่ง เก็บปลายทาง บาท</option>
                        <option value="KPL ทรานสปอร์ต">KPL ทรานสปอร์ต  ค่าจัดส่ง เก็บปลายทาง บาท</option>
              	      <option value="SPEED">SPEED  ค่าจัดส่ง เก็บปลายทาง บาท</option>
              	      <option value="NTC เอ็นทีซี">NTC เอ็นทีซี  ค่าจัดส่ง เก็บปลายทาง บาท</option>
              	      <option value="นิ่มซี่เส็ง">นิ่มซี่เส็ง  ค่าจัดส่ง เก็บปลายทาง บาท</option>

       </select>
                      </div>
                   </div>

                   <div class="col-md-12 col-sm-12 " id="option_select_op5" style="display:none">
                     <p>
                       อีกทางเลือกสำหรับลูกค้าที่อยู่ต่างจังหวัด ทางร้านสามารถจัดส่งผ่านทางรถตู้ ที่วิ่งระหว่างจังหวัดได้ค่ะ ซึ่งทั้งสะดวก รวดเร็ว และประหยัดมากๆค่ะ
 สนใจติดต่อได้ที่เบอร์โทร 02-513-0105 ทุกวัน เวลา 8.00-22.00น.
                     </p>
                   </div>

                   <div class="col-md-12 col-sm-12 " id="option_select_op6" style="display:none">
                     <p>
                       อีกทางเลือกสำหรับลูกค้าที่อยู่ต่างจังหวัด ทางร้านสามารถจัดส่งผ่านทางรถไฟ ที่วิ่งระหว่างจังหวัดได้ค่ะ ซึ่งทั้งสะดวก รวดเร็ว และประหยัดมากๆค่ะ
สนใจติดต่อได้ที่เบอร์โทร 02-513-0105 ทุกวัน เวลา 8.00-22.00น.
                     </p>
                   </div>


                   <div class="col-md-12 col-sm-12 " id="option_select_op7" style="display:none">
                     <p>
                        กรุณาตรวจสอบพื้นที่จัดส่งก่อนค่ะ พื้นที่จัดส่ง (ตรวจสอบพื้นที่บริการ) จัดส่งฟรี เมื่อยอดสั่งงานถึง 500 บาท ในกรณีไม่ถึง 500 บาท คิดค่าบริการ 50 บาท ค่ะ เวลาในการจัดส่งจะมีพนักงานแจ้งให้ทราบอีกครั้งเมื่องานเสร็จแล้วค่ะ
                     </p>
                     <p class="text-danger">
                       **พื้นที่บางส่วนอาจยังไม่ครอบคลุมครบทั้งพื้นที่ สามารถสอบถามได้ที่เบอร์โทรศัพท์ 02-513-0105 ค่ะ
                     </p>
                     <div class="form-group ">

                       <label>เขตพื้นที่จัดส่งสินค้า</label>

                        <select class="form-control" name="area_shipping">
                            <option value="เลือกเขตพื้นที่" selected="selected">เลือกเขตพื้นที่</option>
                      			<option value="คลองเตย">คลองเตย</option>
                      			<option value="จตุจักร">จตุจักร</option>
                      			<option value="ดอนเมือง**">ดอนเมือง**</option>
                      			<option value="ดินแดง">ดินแดง</option>
                      			<option value="ดุสิต">ดุสิต</option>
                      			<option value="บางกะปิ**">บางกะปิ**</option>
                      			<option value="บางเขน ( ภายในเขต กทม. )">บางเขน ( ภายในเขต กทม. )</option>
                      			<option value="บางคอแหลม">บางคอแหลม</option>
                      			<option value="บางจาก**">บางจาก**</option>
                      			<option value="บางซื่อ">บางซื่อ</option>
                      			<option value="บางพลัด**">บางพลัด**</option>
                      			<option value="บางพูด**">บางพูด**</option>
                      			<option value="บางยี่ขัน**">บางยี่ขัน**</option>
                      			<option value="บางอ้อ**">บางอ้อ**</option>
                      			<option value="บ้านใหม่**">บ้านใหม่**</option>
                      			<option value="บึงกุ่ม**">บึงกุ่ม**</option>
                      			<option value="ปทุมวัน">ปทุมวัน</option>
                      			<option value="ป้อมปราบ">ป้อมปราบ</option>
                      			<option value="ปากเกร็ด( สิ้นสุดเขตแม่น้ำเจ้าพระยา ) ">ปากเกร็ด( สิ้นสุดเขตแม่น้ำเจ้าพระยา ) </option>
                      			<option value="พญาไท">พญาไท</option>
                      			<option value="พระนคร">พระนคร</option>
                      			<option value="ยานนาวา">ยานนาวา</option>
                      			<option value="ราชเทวี">ราชเทวี</option>
                      			<option value="ลาดพร้าว">ลาดพร้าว</option>
                      			<option value="วังทองหลาง">วังทองหลาง</option>
                      			<option value="วัฒนา ( ถึงสุขุมวิท 81 )">วัฒนา ( ถึงสุขุมวิท 81 )</option>
                      			<option value="สัมพันธวงศ์">สัมพันธวงศ์</option>
                      			<option value="สาธร">สาธร</option>
                      			<option value="สายไหม**">สายไหม**</option>
                      			<option value="สีลม">สีลม</option>
                      			<option value="หลักสี่">หลักสี่</option>
                      			<option value="ห้วยขวาง">ห้วยขวาง</option>
                          </select>

                      </div>
                   </div>

                   <div class="col-md-12 col-sm-12 " id="option_select_op8" style="display:none">

                     <div class="form-group ">

                       <label>เลือกรูปแบบการจัดส่ง</label>
                        <select class="form-control" name="man_shipping">
                              <option value="เลือกสาขาที่ต้องการมารับสินค้า" selected="selected">เลือกสาขาที่ต้องการมารับสินค้า</option>
                              <option value="สาขาตรงข้ามเซ็นทรัลลาดพร้าว ">สาขาตรงข้ามเซ็นทรัลลาดพร้าว </option>
                              <option value="สาขารามอินทรา กม.4 ">สาขารามอินทรา กม.4 </option>
                              <option value="สาขาบางแค ">สาขาบางแค </option>
                              <option value="สาขาปากซอยหมู่บ้านเศรษฐกิจ ">สาขาปากซอยหมู่บ้านเศรษฐกิจ </option>
                              <option value="สาขาสาทร ">สาขาสาทร </option>
                              <option value="สาขาสุขาภิบาล 3 (รามคำแหง) ">สาขาสุขาภิบาล 3 (รามคำแหง) </option>
                              <option value="สาขาลาดพร้าว 99 ">สาขาลาดพร้าว 99 </option>
                              <option value="สาขาเสรีไทย ">สาขาเสรีไทย </option>
                              <option value="สาขาเกษตร ">สาขาเกษตร </option>
                              <option value="สาขารามคำแหง 100">สาขารามคำแหง 100</option>
                              <option value="สาขารามคำแหง 150">สาขารามคำแหง 150</option>
                              <option value="สาขาพัฒนาการ">สาขาพัฒนาการ</option>
                              <option value="สาขาราชพฤกษ์">สาขาราชพฤกษ์</option>
                              <option value="สาขาคู้บอน">สาขาคู้บอน</option>
                              <option value="สาขาวัชรพล">สาขาวัชรพล</option>
                              <option value="สาขาสวนพลู">สาขาสวนพลู</option>
                              <option value="สาขาพระประแดง">สาขาพระประแดง</option>

                        </select>
                      </div>

                   </div>

                   <div class="col-md-12 col-sm-12 ">
                            <div class="form-group ">

                              <label>หมายเหตุ</label>
                               <textarea rows="3" id="message_contact" name="message_order" class="form-control" placeholder="*หมายเหตุ ข้อความถึงเรา" style="height:150px;"></textarea>

                               <input type="hidden" name="order_price" value="{{$total_pay}}" />
                               <input type="hidden" name="discount" value="0" />
                               <input type="hidden" name="total" value="{{sizeof(Session::get('cart'))}}" />
                             </div>
                             <br>
                          </div>

          </div>













        </div>
        <!--End step -->

        <div id="policy">
          <h4>ข้อตกลงและเงื่อนไข</h4>
          <div class="form-group">


              <label class="image-radio"  id="radio_get" style="font-size:15px;">

                <input type="checkbox" name="c1" value="1" />

                <i class="icon-check-1 hidden"></i>

                ฉันยอมรับข้อกำหนดและเงื่อนไขและนโยบายของเว็บไซต์.
              </label >


              @if ($errors->has('policy_terms'))
              <p class="text-danger" style="margin-top:10px;">
                {{ $errors->first('policy_terms') }}
              </p>
              @endif
          </div>



          <button type="submit" class="btn btn-next">PAYMENT NOW</button>
        </div>



      </div>
      </form>


      <div class="col-md-4 ">


        <div class="box_style_1 hidden-sm hidden-xs">

          <table class="table table_summary" style="font-size: 14px;">
            <tbody>


              <tr>
                <td>
                  Point Order
                </td>
                <td class="text-right">
                  xxx
                </td>
              </tr>

              <tr>
                <td>
                  Total
                </td>
                <td class="text-right">
                  {{sizeof(Session::get('cart'))}}
                </td>
              </tr>
              <tr>
                <td>
                  Discount
                </td>
                <td class="text-right">
                  0
                </td>
              </tr>

              <tr class="total" style="font-size: 18px;">
                <td>
                  Summary
                </td>
                <td class="text-right" >
                ฿ {{number_format((float)$total_pay, 2, '.', '')}}
                </td>
              </tr>
            </tbody>
          </table>

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


<script>

function myFunction() {
    var x = document.getElementById("dvPassport");

    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
        $("#new_address1").hide()
        $("#new_address_bill").hide()
    }

}

if({{$get_my_add_count}} == 0){
  $("#new_address_bill_x").show()
}else{
  $("#new_address1").hide()
}

function getComboA(selectObject) {


    var value1 = selectObject.value;
    console.log(value1)

    if(value1 == 3){
      $("#new_address1").show()
    }else{
      $("#new_address1").hide()
    }


    if(value1 == 2){
      $("#new_address_bill").show()
    }else{
      $("#new_address_bill").hide()
    }


}




function getComboB(selectObject) {
    var e = document.getElementById("shipping_optional");
    var value2 = e.options[e.selectedIndex].getAttribute('data-value');
    console.log(value2)

    if(value2 == 0){
      $("#option_select_op2").hide()
      $("#option_select_op3").hide()
      $("#option_select_op4").hide()
      $("#option_select_op5").hide()
      $("#option_select_op6").hide()
      $("#option_select_op7").hide()
      $("#option_select_op8").hide()
    }

    if(value2 == 2){
      $("#option_select_op2").show()
      $("#option_select_op3").hide()
      $("#option_select_op4").hide()
      $("#option_select_op5").hide()
      $("#option_select_op6").hide()
      $("#option_select_op7").hide()
      $("#option_select_op8").hide()
    }

    if(value2 == 3){
      $("#option_select_op3").show()
      $("#option_select_op2").hide()
      $("#option_select_op4").hide()
      $("#option_select_op5").hide()
      $("#option_select_op6").hide()
      $("#option_select_op7").hide()
      $("#option_select_op8").hide()
    }

    if(value2 == 4){
      $("#option_select_op4").show()
      $("#option_select_op2").hide()
      $("#option_select_op3").hide()
      $("#option_select_op5").hide()
      $("#option_select_op6").hide()
      $("#option_select_op7").hide()
      $("#option_select_op8").hide()
    }

    if(value2 == 5){
      $("#option_select_op5").show()
      $("#option_select_op2").hide()
      $("#option_select_op3").hide()
      $("#option_select_op4").hide()
      $("#option_select_op6").hide()
      $("#option_select_op7").hide()
      $("#option_select_op8").hide()
    }

    if(value2 == 6){
      $("#option_select_op6").show()
      $("#option_select_op2").hide()
      $("#option_select_op3").hide()
      $("#option_select_op4").hide()
      $("#option_select_op5").hide()
      $("#option_select_op7").hide()
      $("#option_select_op8").hide()
    }

    if(value2 == 7){
      $("#option_select_op7").show()
      $("#option_select_op2").hide()
      $("#option_select_op3").hide()
      $("#option_select_op4").hide()
      $("#option_select_op5").hide()
      $("#option_select_op6").hide()
      $("#option_select_op8").hide()
    }

    if(value2 == 8){
      $("#option_select_op8").show()
      $("#option_select_op7").hide()
      $("#option_select_op2").hide()
      $("#option_select_op3").hide()
      $("#option_select_op4").hide()
      $("#option_select_op5").hide()
      $("#option_select_op6").hide()
    }


}

;(function( $ ){
  $.fn.AutoProvince = function( options ) {
    var Setting = $.extend( {
      PROVINCE:		'#province', // select div สำหรับรายชื่อจังหวัด
      AMPHUR:			'#amphur', // select div สำหรับรายชื่ออำเภอ
      DISTRICT:		'#district', // select div สำหรับรายชื่อตำบล
      POSTCODE:		'#postcode', // input field สำหรับรายชื่อรหัสไปรษณีย์
      arrangeByName:		false // กำหนดให้เรียงตามตัวอักษร
    }, options);

    return this.each(function() {
      var xml;
      var dataUrl = "{{url('assets/thailand.xml')}}";


      $(function() {
        initialize();
      });

      function initialize(){
        $.ajax({
          type: "GET",
          url: dataUrl,
          dataType: "xml",
          success: function(xmlDoc) {
            xml = $(xmlDoc);

            _loadProvince();
            addEventList();
          },
          error: function() {
            console.log("Failed to get xml");
          }
        });
      }

      function _loadProvince()
      {
        var list = [];
        xml.find('table').each(function(index){
          if($(this).attr("name") == Setting.PROVINCE.split("#")[1]){
            var PROVINCE_ID = $(this).children().eq(0).text();
            var PROVINCE_NAME = $(this).children().eq(2).text();
            if(PROVINCE_ID)list.push({id:PROVINCE_ID,name:PROVINCE_NAME});

          }
        });
        if(Setting.arrangeByName){
          AddToView(list.sort(SortByName),Setting.PROVINCE);
        }else{
          AddToView(list,Setting.PROVINCE);
        }
      }

      function _loadAmphur(PROVINCE_ID_SELECTED)
      {
        var list = [];
        var isFirst = true;
        $(Setting.AMPHUR).empty();
        xml.find('table').each(function(index){
          if($(this).attr("name") == Setting.AMPHUR.split("#")[1]){
            var AMPHUR_ID = $(this).children().eq(0).text();
            var AMPHUR_NAME = $(this).children().eq(2).text();
            var POSTCODE = $(this).children().eq(3).text();
            var PROVINCE_ID = $(this).children().eq(5).text();
            if(PROVINCE_ID_SELECTED == PROVINCE_ID && AMPHUR_ID){
              if(isFirst)_loadDistrict(AMPHUR_ID);
              isFirst = false;
              list.push({id:AMPHUR_ID,name:AMPHUR_NAME,postcode:POSTCODE});
              $(Setting.POSTCODE).val(POSTCODE);
            }
          }
        });
        if(Setting.arrangeByName){
          AddToView(list.sort(SortByName),Setting.AMPHUR);
        }else{
          AddToView(list,Setting.AMPHUR);
        }
      }

      function _loadDistrict(AMPHUR_ID_SELECTED)
      {
        var list = [];
        $(Setting.DISTRICT).empty();
        xml.find('table').each(function(index){
          if($(this).attr("name") == Setting.DISTRICT.split("#")[1]){
            var DISTRICT_ID = $(this).children().eq(0).text();
            var DISTRICT_NAME = $(this).children().eq(2).text();
            var AMPHUR_ID = $(this).children().eq(3).text();
            if(AMPHUR_ID_SELECTED == AMPHUR_ID && DISTRICT_ID){
              list.push({id:DISTRICT_ID,name:DISTRICT_NAME});
            }
          }
        });
        if(Setting.arrangeByName){
          AddToView(list.sort(SortByName),Setting.DISTRICT);
        }else{
          AddToView(list,Setting.DISTRICT);
        }
      }

      function addEventList(){
        $(Setting.PROVINCE).change(function(e) {
          var PROVINCE_ID = $(this).val();
          _loadAmphur(PROVINCE_ID);
        });
        $(Setting.AMPHUR).change(function(e) {
          var AMPHUR_ID = $(this).val();
          $(Setting.POSTCODE).val($(this).find('option:selected').attr("POSTCODE"));
          _loadDistrict(AMPHUR_ID);
        });
      }
      function AddToView(list,key){
        for (var i = 0;i<list.length;i++) {
          if(key != Setting.AMPHUR){
            $(key).append("<option value='"+list[i].id+"'>"+list[i].name+"</option>");
          }else{
            $(key).append("<option value='"+list[i].id+"' POSTCODE='"+list[i].postcode+"'>"+list[i].name+"</option>");
          }
        }
      }

      function SortByName(a, b){
        var aName = a.name.toLowerCase();
        var bName = b.name.toLowerCase();
        return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
      }
    });
  };
})( jQuery );

$('body').AutoProvince({
  PROVINCE:		'#province', // select div สำหรับรายชื่อจังหวัด
  AMPHUR:			'#amphur', // select div สำหรับรายชื่ออำเภอ
  DISTRICT:		'#district', // select div สำหรับรายชื่อตำบล
  POSTCODE:		'#postcode', // input field สำหรับรายชื่อรหัสไปรษณีย์
  arrangeByName:		false // กำหนดให้เรียงตามตัวอักษร
});


</script>






@stop('scripts')

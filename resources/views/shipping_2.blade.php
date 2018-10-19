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
                        <select class="form-control" name="deliver_order" required="">
                              <option value="">-- เลือกรูปแบบการจัดส่ง --</option>

                              @if($delivery)
                              @foreach($delivery as $u)
                              <option value="{{$u->id}}">{{$u->name}}</option>
                              @endforeach
                              @endif

                        </select>
                      </div>
                      <br>
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
    }
}




</script>






@stop('scripts')

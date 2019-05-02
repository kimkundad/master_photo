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
@if(Auth::guest())

  @foreach(Session::get('cart') as $u)
  <?php
  $total_pay += ($u['data'][3]['sum_price']*$u['data'][2]['sum_image']);
  $total_img += $u['data'][2]['sum_image'];
   ?>
  @endforeach

@else

  @if($get_data2)
  @foreach($get_data2 as $u2)
  <?php
  $total_pay += $u2->sum_image*$u2->sum_price;
  $total_img += $u2->sum_price;
   ?>
  @endforeach
  @endif

@endif



    <div class="row margin_30">
      <form action="{{url('/add_order')}}" method="post" enctype="multipart/form-data" name="product">
        {{ csrf_field() }}
      <div class="col-md-8 box_style_1  add_bottom_15">
        <input type="hidden" id="get_sum_ship" name="get_sum_ship" value="0" />
        <input type="hidden" id="type_ship" name="type_ship" value="0" />

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
                @if (Auth::guest())
                <td class="text-right">
                  {{sizeof(Session::get('cart'))}}
                </td>
                @else
                <td class="text-right">
                  {{$count_data2}}
                </td>
                @endif
              </tr>
              <tr>
                <td>
                  Discount
                </td>
                <td class="text-right">
                  0
                </td>
              </tr>

              <tr>
                <td>
                  ค่าขนส่ง
                </td>
                <td class="text-right" id="get_ship_price2">

                </td>
              </tr>

              <tr>
                <td>
                  ราคาสินค้า x {{$count_data2}}
                </td>
                <td class="text-right" >
                  {{number_format((float)$total_pay, 2, '.', '')}}
                </td>
              </tr>

              <tr class="total" style="font-size: 18px;">
                <td>
                  ยอดชำระ
                </td>

                <td class="text-right" id="get_image_price2">
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

          @if ($errors->has('van_shipping'))
          <p class="text-danger" style="margin-top:10px;">
          <b><i style="font-size:16px;" class="im im-icon-Information"></i></b>  กรุณาเลือกรูปแบบการจัดส่งให้สำเร็จ
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

            <div class="col-md-12">




                <input type="hidden" name="address_type_order" value="{{$check_address}}" />
                <div class="form-group ">
                  <label>เลือกที่อยู่ในการจัดส่ง <span class="text-danger">*</span></label>
                  <select name="address_shipping_order" class="form-control " >
                    @if($get_my_add_3)
                    @foreach($get_my_add_3 as $add)
                    <option value="{{$add->id}}">{{$add->name_ad}}, {{$add->address_ad}} {{$add->subdistrictsz}} {{$add->districtz}} {{$add->provincez}} {{$add->zip_code}}</option>
                    @endforeach
                    @endif

                  </select>

                </div>

                <hr />
                <br />

            </div>



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

                            <option value="3">2. กำหนดเอง</option>
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
                              <option value="" data-value="">-- กรุณาเลือกวิธีรับสินค้า --</option>
                              @if($deli)
                              @foreach($deli as $delis)
                              <option value="{{$delis->id}}" data-value="{{$delis->name}}" data-free="{{$delis->de_status}}" data-price="{{$delis->de_price}}" data-id="{{$delis->id}}" data-set="{{$delis->de_type}}">{{$delis->name}}</option>
                              @endforeach
                              @endif

                              <!--
                              <option value="จัดส่งด่วน 1 วัน แบบ Express" data-value="2">จัดส่งด่วน 1 วัน แบบ Express</option>
                              <option value="จัดส่งทางไปรษณีย์ EMS" data-value="3">จัดส่งทางไปรษณีย์ EMS</option>
                              <option value="จัดส่งผ่านทางรถ บขส." data-value="4">จัดส่งผ่านทางรถ บขส.</option>
                              <option value="จัดส่งผ่านทางรถตู้" data-value="5">จัดส่งผ่านทางรถตู้</option>
                              <option value="จัดส่งผ่านทางรถไฟ " data-value="6">จัดส่งผ่านทางรถไฟ </option>
                              <option value="ทางร้านจัดส่ง Delivery" data-value="7">ทางร้านจัดส่ง Delivery </option>
                              <option value="รับสินค้าด้วยตัวเอง" data-value="8"> รับสินค้าด้วยตัวเอง</option>
                              -->
                        </select>
                      </div>
                      <br>
                   </div>



                   <div class="col-md-12 col-sm-12 " id="targeted" >




                   </div>










                   <div class="col-md-12 col-sm-12 ">
                            <div class="form-group ">

                              <label>หมายเหตุ</label>
                               <textarea rows="3" id="message_contact" name="message_order" class="form-control" placeholder="*หมายเหตุ ข้อความถึงเรา" style="height:150px;"></textarea>

                               <input type="hidden" name="order_price" value="{{$total_pay}}" />
                               <input type="hidden" name="discount" value="0" />
                               <input type="hidden" name="total" value="{{$count_data2}}" />
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

                <input type="checkbox" name="c1" value="1" checked/>

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
                @if (Auth::guest())
                <td class="text-right">
                  {{sizeof(Session::get('cart'))}}
                </td>
                @else
                <td class="text-right">
                  {{$count_data2}}
                </td>
                @endif
              </tr>
              <tr>
                <td>
                  Discount
                </td>
                <td class="text-right">
                  0
                </td>
              </tr>

              <tr>
                <td>
                  ค่าขนส่ง
                </td>
                <td class="text-right" id="get_ship_price">

                </td>
              </tr>

              <tr>
                <td>
                  ราคาสินค้า x {{$count_data2}}
                </td>
                <td class="text-right" >
                  {{number_format((float)$total_pay, 2, '.', '')}}
                </td>
              </tr>

              <tr class="total" style="font-size: 18px;">
                <td>
                  ยอดชำระ
                </td>
                <td class="text-right" id="sum_image_price" style="display:none">{{number_format((float)$total_pay, 2, '.', '')}}</td>
                <td class="text-right" id="get_image_price">
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
var get_van = 0;
var get_bsk = 0;
var get_train = 0;
var zero_var = 0;
var value2 = 0;

var price_product = {{number_format((float)$total_pay, 2, '.', '')}};
var get_sum_ship = {{$get_sum_ship}};
var get_sum_ship2 = {{$get_sum_ship2}};



var price_image = document.getElementById('sum_image_price').innerText;


$('#get_ship_price').append( (0).toFixed(2) );
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

function getComboA8(selectObject) {
    var a3 = document.getElementById("get_van");
    get_van = a3.options[a3.selectedIndex].getAttribute('data-value');

    $('#get_image_price').html("");
    $('#get_ship_price').html("");

    $('#get_image_price').append((Number(price_image)+Number(get_van)).toFixed(2));
    $('#get_ship_price').append( Number(get_van) );
    document.getElementById("get_sum_ship").value = Number(get_van);

}


function getComboA9(selectObject) {
    var a2 = document.getElementById("get_train");
    get_train = a2.options[a2.selectedIndex].getAttribute('data-value');

    $('#get_image_price').html("");
    $('#get_ship_price').html("");

    $('#get_image_price').append((Number(price_image)+Number(get_train)).toFixed(2));
    $('#get_ship_price').append( Number(get_train) );
    document.getElementById("get_sum_ship").value = Number(get_train);

}


function getComboA11(selectObject) {
    var a1 = document.getElementById("get_bsk");
    get_bsk = a1.options[a1.selectedIndex].getAttribute('data-value');

    $('#get_image_price').html("");
    $('#get_ship_price').html("");

    $('#get_image_price').append((Number(price_image)+Number(get_bsk)).toFixed(2));
    $('#get_ship_price').append( Number(get_bsk) );
    document.getElementById("get_sum_ship").value = Number(get_bsk);
}


function getComboB(selectObject) {
    var e = document.getElementById("shipping_optional");
    value2 = e.options[e.selectedIndex].getAttribute('data-value');
    value_id = e.options[e.selectedIndex].getAttribute('data-id');
    value_type = e.options[e.selectedIndex].getAttribute('data-set');
    value_price = e.options[e.selectedIndex].getAttribute('data-price');
    value_free = e.options[e.selectedIndex].getAttribute('data-free');

    console.log(value_free);

    if(value_type == 1){

      $('#get_image_price').html("");
      $('#get_ship_price').html("");
      $('#targeted').html("");
      $('#get_image_price2').html("");
      $('#get_ship_price2').html("");

      if(value_free <= price_image){
        value_price = 0;
      }

      document.getElementById("type_ship").value = Number(value_type);
      $('#get_image_price').append((Number(price_image)+Number(value_price)).toFixed(2));
      $('#get_ship_price').append( Number(value_price) );

      $('#get_image_price2').append((Number(price_image)+Number(value_price)).toFixed(2));
      $('#get_ship_price2').append( Number(value_price) );

      document.getElementById("get_sum_ship").value = Number(value_price);

    }else if(value_type == 2){

      $('#get_image_price').html("");
      $('#get_ship_price').html("");
      $('#get_image_price2').html("");
      $('#get_ship_price2').html("");

      document.getElementById("type_ship").value = Number(value_type);
      var get_option = 0;
      $.ajax({
      type: "POST",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data: { "ship_id" : value_id },
      url: "{{url('/api/shipping_data_2')}}",
      success: function(data) {
          $('#targeted').html(data.data.html);
          get_option = 1;
      }
      });


    }else{

      $('#targeted').html("");
      $('#get_image_price').html("");
      $('#get_ship_price').html("");
      $('#get_image_price2').html("");
      $('#get_ship_price2').html("");
      document.getElementById("type_ship").value = Number(value_type);

      $.ajax({
      type: "POST",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data: { "ship_id" : value_id, "price_pro" : price_product },
      url: "{{url('/api/shipping_data_3')}}",
      success: function(data) {
        console.log(data.data);

        //  $('#targeted').html(data.data.html);

        if(value_free <= price_image){
          data.data.price = 0;
        }

        $('#get_image_price').append((Number(price_image)+Number(data.data.price)).toFixed(2));
        $('#get_ship_price').append( Number(data.data.price) );

        $('#get_image_price2').append((Number(price_image)+Number(data.data.price)).toFixed(2));
        $('#get_ship_price2').append( Number(data.data.price) );
        document.getElementById("get_sum_ship").value = Number(data.data.price);


      }
      });

    }


  //  console.log(value2)
}

function run() {

  $('#get_image_price').html("");
  $('#get_ship_price').html("");
  $('#get_image_price2').html("");
  $('#get_ship_price2').html("");

    var selector = document.getElementById("get_option12");
    var value9 = selector.options[selector.selectedIndex].getAttribute('data-value');
    var val_free = selector.options[selector.selectedIndex].getAttribute('data-free');




    if(Number(val_free) <= Number(price_image)){
      value9 = 0;
    }

    console.log("free " + val_free + " price" + price_image + " ship" + value9);

    $('#get_image_price').append((Number(price_image)+Number(value9)).toFixed(2));
    $('#get_ship_price').append( Number(value9) );
    $('#get_image_price2').append((Number(price_image)+Number(value9)).toFixed(2));
    $('#get_ship_price2').append( Number(value9) );
    document.getElementById("get_sum_ship").value = Number(value9);


}


//console.log(price_image);
$('#get_image_price').append(price_image);



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

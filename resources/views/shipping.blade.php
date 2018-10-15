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

        <div class="form_title">
          <h3><strong>1</strong>ข้อมูลผู้สั่งสินค้า</h3>
          <p style="font-size:14px; margin-top:5px;">
            เพื่อความสะดวกและความถูกต้องในการส่งสินค้า กรุณากรอกข้อมูลที่ชัดเจน
          </p>
        </div>
        <div class="step">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{Auth::user()->name}}" name="firstname_order" value="{{ old('firstname_order')}}">
                @if ($errors->has('firstname_order'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('firstname_order') }}
                </p>
                @endif

              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                <input type="text" name="phone_order" value="{{ old('phone_order')}}" class="form-control">
                <input type="hidden" class="form-control" name="order_price" value="{{$total_pay}}">
                <input type="hidden" class="form-control" name="total" value="{{$total_img}}">
                @if ($errors->has('phone_order'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('phone_order') }}
                </p>
                @endif
              </div>
            </div>

          </div>


        </div>
        <!--End step -->


        <div class="form_title">
          <h3><strong>2</strong>ที่อยู่ในการจัดส่ง</h3>
          <p style="font-size:14px; margin-top:5px;">
            ที่อยู่ในการออกใบกำกับภาษีใช้ที่อยู่เดียวกับการจัดส่ง
          </p>
        </div>
        <div class="step">

          <div class="row">


            <div class="col-md-12 col-sm-12">
              <div class="form-group">





                <label class="image-radio"  id="radio_get" style="font-size:15px;">

                  <input type="checkbox" name="c1" value="1" />
                  <ins class="iCheck-helper" onclick="myFunction()" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                  <i class="icon-check-1 hidden"></i>

                  ขอใบกำกับภาษี.
                </label >





              </div>

              </div>







            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <label>ที่อยู่ </label>
                <div >
								<input type="text" class="form-control" name="address" placeholder="บ้านเลขที่.." value="{{ old('address')}}">
                @if ($errors->has('address'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('address') }}
                </p>
                @endif
							</div>

              </div>
            </div>

          </div>



          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>จังหวัด</label>

                <select id="province" name="province" class="form-control " >

                <option value="">- กรุณาเลือกจังหวัด -</option>

                </select>
                @if ($errors->has('province'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('province') }}
                </p>
                @endif
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>เขต/อำเภอ</label>
                <select id="amphur" name="amphur" class="form-control " >

                <option value="">- กรุณาเลือกอำเภอ -</option>

                </select>
                @if ($errors->has('province'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('province') }}
                </p>
                @endif
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>แขวง/ตำบล</label>
                <select id="district" name="district" class="form-control " >

                <option value="">- กรุณาเลือกตำบล -</option>

                </select>
                @if ($errors->has('province'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('province') }}
                </p>
                @endif
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>รหัสไปรษณีย์</label>
                <input type="text" id="postcode" name="postcode" placeholder="รหัสไปรษณีย์ " class="form-control" value="{{ old('zipcode')}}">
                @if ($errors->has('zipcode'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('zipcode') }}
                </p>
                @endif
              </div>
            </div>
          </div>





          <div class="body1 row" id="dvPassport" style="display: none">
            <br />
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <label>ที่อยู่ </label>
                <div >
								<input type="text" class="form-control" name="address" placeholder="บ้านเลขที่.." value="{{ old('address')}}">
                @if ($errors->has('address'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('address') }}
                </p>
                @endif
							</div>

              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>จังหวัด</label>

                <select id="province1" name="province" class="form-control " >

                <option value="">- กรุณาเลือกจังหวัด -</option>

                </select>
                @if ($errors->has('province'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('province') }}
                </p>
                @endif
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>เขต/อำเภอ</label>
                <select id="amphur1" name="amphur" class="form-control " >

                <option value="">- กรุณาเลือกอำเภอ -</option>

                </select>
                @if ($errors->has('province'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('province') }}
                </p>
                @endif
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>แขวง/ตำบล</label>
                <select id="district1" name="district" class="form-control " >

                <option value="">- กรุณาเลือกตำบล -</option>

                </select>
                @if ($errors->has('province'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('province') }}
                </p>
                @endif
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>รหัสไปรษณีย์</label>
                <input type="text" id="postcode1" name="postcode" placeholder="รหัสไปรษณีย์ " class="form-control" value="{{ old('zipcode')}}">
                @if ($errors->has('zipcode'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('zipcode') }}
                </p>
                @endif
              </div>
            </div>

          </div>
          <!--End row -->
        </div>
        <!--End step -->

        <div id="policy">
          <h4>ข้อตกลงและเงื่อนไข</h4>
          <div class="form-group">
            <label>
              <div class="icheckbox_square-grey" style="position: relative; width: 23px;">

                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                  <input type="checkbox" name="c1" value="1" style="position: absolute; opacity: 0;">
                </ins>
              </div>ฉันยอมรับข้อกำหนดและเงื่อนไขและนโยบายของเว็บไซต์.</label>
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

<!-- Google Autocomplete -->
<script>
  function initAutocomplete() {
    var input = document.getElementById('autocomplete-input');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }
    });

	if ($('.main-search-input-item')[0]) {
	    setTimeout(function(){
	        $(".pac-container").prependTo("#autocomplete-container");
	    }, 300);
	}
}
</script>




@stop('scripts')

@extends('layouts.template')

@section('title')
user profile
@stop

@section('stylesheet')
<link href="{{url('master/assets/css/admin.css')}}" rel="stylesheet">

@stop('stylesheet')
@section('content')


<main class=" slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span>{{ trans('message.address') }} </span></h2>

    </div>

    <div class="row">


      <aside class="col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
							<li><a href="{{url('profile')}}"><i class="icon_set_1_icon-29"></i>{{ trans('message.user_pro') }} </a>
							</li>
							<li><a href="{{url('address_book')}}" id="active"><i class="icon_set_1_icon-41"></i>{{ trans('message.address') }} </a>
							</li>
							<li><a href="#"><i class="im im-icon-Gift-Box" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.credit') }} </a>
							</li>
              <li><a href="{{url('my_order')}}"><i class="icon_set_1_icon-50" ></i> {{ trans('message.user_order') }} </a>
							</li>
              <li><a href="{{url('payment_notify')}}"><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.pay_ment') }} </a>
							</li>

						</ul>
        </div>
      </aside>







      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h3>{{ trans('message.address') }}  <form  action="{{url('delete_address_book/')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                            <input type="hidden" name="_method" value="POST">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <input type="hidden" name="address_id" value="{{ $package->id }}">
                            <button type="submit" title="ลบบทความ" class="btn btn-danger btn-xs pull-right"> {{ trans('message.delete') }}</button>
                        </form></h3>
                    <br />
                    @if (count($errors) > 0)
                    <br>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" action="{{url('post_edit_address_book')}}" method="post" enctype="multipart/form-data">

                      {{ csrf_field() }}


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.name_pro') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name" value="{{ $package->name_ad }}" required="">
                          <input type="hidden" class="form-control" name="address_id" value="{{ $package->id }}" required="">

                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.telephone_num') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="phone" value="{{ $package->phone_ad }}" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Tax_ID') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="id_card_no" placeholder="{{ trans('message.Tax_ID') }}" value="{{ old('id_card_no', $package->id_card_no)}}" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.branch_code') }} ({{ trans('message.if_there_is') }})</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control"name="branch_code" value="{{ old('branch_code', $package->branch_code)}}" placeholder="กรุณากรอกรหัสสาขา (ถ้ามี)" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.address_1') }}</label>
                        <div class="col-md-8">
                          <textarea class="form-control" rows="3" name="address"  required="">{{ $package->address_ad }}</textarea>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.province') }}</label>
                        <div class="col-md-8">

                          <select id="province" name="province" class="form-control " required="">

                          <option value="{{$province->PROVINCE_ID}}">{{$province->PROVINCE_NAME}}</option>

                          </select>

                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.District') }}</label>
                        <div class="col-md-8">

                          <select id="amphur" name="amphur" class="form-control " required="">

                          <option value="{{$district->AMPHUR_ID}}">{{$district->AMPHUR_NAME}}</option>

                          </select>

                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Subdistrict') }}</label>
                        <div class="col-md-8">

                          <select id="district" name="district" class="form-control " required="">

                          <option value="{{$subdistricts->DISTRICT_ID}}">{{$subdistricts->DISTRICT_NAME}}</option>

                          </select>

                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.zip_code') }}</label>
                        <div class="col-md-8">

                          <input type="text" id="postcode" class="form-control" name="postcode" value="{{$package->zip_code}}"  required="">

                        </div>
                      </div>


                  <!--    <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Address_Type') }}</label>
                        <div class="col-md-8">

                          <select name="type_ad" class="form-control " required="">

                          <option value="0" @if( $package->type_address == 0)
                          selected='selected'
                          @endif >{{ trans('message.shipping_address') }}</option>
                          <option value="1" @if( $package->type_address == 1)
                          selected='selected'
                          @endif>{{ trans('message.address_of_the_receipt') }}</option>

                          <option value="3" @if( $package->type_address == 3)
                          selected='selected'
                          @endif>{{ trans('message.shipping_address_together') }}</option>
                          </select>

                        </div>
                      </div> -->



                  <div class="col-md-12 text-center" >
                    <button type="submit" class="btn btn-next">{{ trans('message.sub_memory') }}</button>
                    <a href="{{url('address_book')}}" class="btn btn-default">{{ trans('message.btn_cancel') }}</a>
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

<script src="{{url('master/assets/js/tabs.js')}}"></script>
<script>
    new CBPFWTabs(document.getElementById('tabs'));
  </script>

</body>



<script>


  ;(function( $ ){
  	$.fn.AutoProvince = function( options ) {
  		var Setting = $.extend( {
  			PROVINCE:		'#province', // select div สำหรับรายชื่อจังหวัด
  			AMPHUR:			'#amphur', // select div สำหรับรายชื่ออำเภอ
  			DISTRICT:		'#district', // select div สำหรับรายชื่อตำบล
  			POSTCODE:		'#postcode', // input field สำหรับรายชื่อรหัสไปรษณีย์
  			arrangeByName:		false // กำหนดให้เรียงตามตัวอักษร
  		}, options);

    //  console.log({{$package->province}});

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
              console.log(Setting.PROVINCE);
              _loadAmphur({{$province->PROVINCE_ID}});
              _loadDistrict({{$district->AMPHUR_ID}});
  						_loadProvince();

  						addEventList();

              $("#amphur").val('{{$district->AMPHUR_ID}}');
              $("#district").val('{{$subdistricts->DISTRICT_ID}}');
              $("#postcode").val('{{$package->zip_code}}');
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

          console.log(Setting.PROVINCE_ID);

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
  				for (var i = 0;i<list.length;i++) { //_$district->AMPHUR_ID
  					if(key != Setting.AMPHUR){
  						$(key).append("<option @if($package->province == "+list[i].id+") selected='selected' @endif value='"+list[i].id+"'>"+list[i].name+"</option>");
  					}else{
  						$(key).append("<option  @if($district->AMPHUR_ID == "+list[i].id+") selected='selected' @endif value='"+list[i].id+"' POSTCODE='"+list[i].postcode+"'>"+list[i].name+"</option>");
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


<script>
@if ($message = Session::get('edit_address'))
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



@stop('scripts')

@extends('admin.layouts.template')
@section('admin.content')






				<section role="main" class="content-body">

					<header class="page-header">
						<h2>{{$header}}</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.html">
										<i class="fa fa-home"></i>
									</a>
								</li>

								<li><span>{{$header}}</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>


					<!-- start: page -->




							<div class="row">
							<div class="col-md-2">


                <section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">
                    @if($objs->avatar != NULL && $objs->provider == "email")
										<img src="{{url('assets/images/avatar/'.$objs->avatar)}}" class="rounded img-responsive" alt="{{$objs->name}}">
										@elseif ($objs->provider == 'facebook')
										<img src="{{$objs->avatar}}" class="rounded img-responsive" alt="{{$objs->name}}">
                    @else
                    <img src="{{url('assets/images/avatar/blank_avatar_240x240.gif')}}" class="rounded img-responsive" alt="{{$objs->name}}">
                    @endif

									</div>







								</div>
							</section>

							</div>







              <d<div class="col-md-10">

							<div class="tabs">

								<div class="tab-content">

									<div id="edit" class="tab-pane active">

										<form class="form-horizontal" action="{{url('post_edit_address')}}" method="post" enctype="multipart/form-data">
											{{ csrf_field() }}

											<h4 class="mb-xlg">เพิ่มที่อยู่ใหม่</h4>
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




											<fieldset>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ-สกุล</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="name" value="{{ $package->name_ad }}" required="">
                            <input type="hidden" class="form-control" name="address_id" value="{{ $package->id }}" required="">
													</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">เบอร์โทรศัพท์</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="phone" value="{{ $package->phone_ad }}" required="">
													</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ที่อยู่</label>
													<div class="col-md-8">
														<textarea class="form-control" rows="3" name="address"  required="">{{ $package->address_ad }}</textarea>
													</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">จังหวัด</label>
													<div class="col-md-8">

                            <select id="province" name="province" class="form-control " required="">

                            <option value="{{$province->PROVINCE_ID}}">{{$province->PROVINCE_NAME}}</option>

                            </select>

													</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">เขต/อำเภอ</label>
													<div class="col-md-8">

                            <select id="amphur" name="amphur" class="form-control " required="">

                            <option value="{{$district->AMPHUR_ID}}">{{$district->AMPHUR_NAME}}</option>

                            </select>

													</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">แขวง/ตำบล</label>
													<div class="col-md-8">

                            <select id="district" name="district" class="form-control " required="">

                            <option value="{{$subdistricts->DISTRICT_ID}}">{{$subdistricts->DISTRICT_NAME}}</option>

                            </select>

													</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">รหัสไปรษณีย์</label>
													<div class="col-md-8">

                            <input type="text" id="postcode" class="form-control" name="postcode" value="{{$package->zip_code}}"  required="">

													</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ประเภทที่อยู่</label>
													<div class="col-md-8">

                            <select name="type_ad" class="form-control " required="">

                            <option value="0">Shipping Adress</option>
                            <option value="1">Billing Address</option>

                            </select>

													</div>
												</div>


											</fieldset>





											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">บันทึก</button>
														<a href="{{url('admin/user/'.$objs->id)}}" class="btn btn-default">ยกเลิก</a>
													</div>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>











						</div>

</section>
@stop

@section('scripts')

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
$.fn.datepicker.defaults.format = "yyyy-mm-dd";
$('.datepicker').datepicker({
});
</script>

@if ($message = Session::get('edit_address'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการแก้ไขข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif

@stop('scripts')

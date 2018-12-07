@extends('admin.layouts.template')





@section('admin.content')






        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$datahead}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$datahead}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



          <div class="row">








                        <div class="col-md-6" style="margin-bottom:120px;">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">




          											<h4 class="mb-xlg">ข้อมูล Order ที่ #{{$objs->id}}</h4>

          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อผู้สั่งซื้อ</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->name}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">อีเมล</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->email}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เบอร์โทร</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->phone}}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ยอดชำระ</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->order_price}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ส่วนลด</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->discount}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Note</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="pro_name_detail" rows="6">{{ $objs->note }}</textarea>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เลือกที่จัดส่งใบกำกับภาษี</label>
          													<div class="col-md-8">
                                      <select name="text_re_user" class="form-control mb-md" required>

                                        <option value="1" @if( $objs->text_re_user == 1)
                                        selected='selected'
                                        @endif>-- ใช้ที่อยู่จัดส่ง --</option>
  								                      <option value="2" @if( $objs->text_re_user == 2)
                                        selected='selected'
                                        @endif>-- ใช้ที่อยู่ที่เคยออกใบกำกับภาษี --</option>
                                        <option value="3" @if( $objs->text_re_user == 3)
                                        selected='selected'
                                        @endif>-- กำหนดเอง --</option>
  								                    </select>
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">การขอใบกำกับภาษี</label>
          													<div class="col-md-8">
                                      <select name="pro_category" class="form-control mb-md" required>

                                        <option value="0" @if( $objs->bil_req == 0)
                                        selected='selected'
                                        @endif>-- ไม่ขอ --</option>
  								                      <option value="1" @if( $objs->bil_req == 1)
                                        selected='selected'
                                        @endif>-- ขอใบกำกับภาษี --</option>
  								                    </select>
          														</div>
          												</div>




                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">การจัดส่งสินค้า</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->deliver_order}}">
          														</div>
          												</div>

                                  @if($objs->deliver_order != null)
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เลือกเขตพื้นที่</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->shipping_t2}}">
          														</div>
          												</div>

                                  @else
                                  @endif





          											</fieldset>










          									</div>
          								</div>
          							</div>







                        <div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


          											<h4 class="mb-xlg">ที่อยู่ในการจัดส่ง</h4>

                                <fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อผู้รับสินค้า</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$get_address->name_ad}}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เบอร์ติดต่อ</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$get_address->phone_ad}}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ที่อยู่</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="pro_name_detail" rows="6">{{ $get_address->address_ad }}</textarea>
          														</div>
          												</div>



                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">จังหวัด</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$province->PROVINCE_NAME}}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เขต/อำเภอ</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$district->AMPHUR_NAME}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">แขวง/ตำบล</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$subdistricts->DISTRICT_NAME}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รหัสไปรษณีย์</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$get_address->zip_code}}">
          														</div>
          												</div>

                                  </fieldset>

                              </div>
                            </div>
                          </div>


                          @if($get_address_bill != null)


                          <div class="tabs">

            								<div class="tab-content">

            									<div id="edit" class="tab-pane active">


            											<h4 class="mb-xlg">ที่อยู่ในการจัดส่งใบกำกับภาษี</h4>

                                  <fieldset>
                                    <div class="form-group">
            													<label class="col-md-3 control-label" for="profileFirstName">ชื่อผู้รับสินค้า</label>
            													<div class="col-md-8">
            														<input type="text" class="form-control" name="name_cat" value="{{$get_address_bill->name_ad}}">
            														</div>
            												</div>


                                    <div class="form-group">
            													<label class="col-md-3 control-label" for="profileFirstName">เบอร์ติดต่อ</label>
            													<div class="col-md-8">
            														<input type="text" class="form-control" name="name_cat" value="{{$get_address_bill->phone_ad}}">
            														</div>
            												</div>


                                    <div class="form-group">
            													<label class="col-md-3 control-label" for="profileFirstName">ที่อยู่</label>
            													<div class="col-md-8">
            														<textarea class="form-control" name="pro_name_detail" rows="6">{{ $get_address_bill->address_ad }}</textarea>
            														</div>
            												</div>



                                    <div class="form-group">
            													<label class="col-md-3 control-label" for="profileFirstName">จังหวัด</label>
            													<div class="col-md-8">
            														<input type="text" class="form-control" name="name_cat" value="{{$province_bill->PROVINCE_NAME}}">
            														</div>
            												</div>


                                    <div class="form-group">
            													<label class="col-md-3 control-label" for="profileFirstName">เขต/อำเภอ</label>
            													<div class="col-md-8">
            														<input type="text" class="form-control" name="name_cat" value="{{$district_bill->AMPHUR_NAME}}">
            														</div>
            												</div>

                                    <div class="form-group">
            													<label class="col-md-3 control-label" for="profileFirstName">แขวง/ตำบล</label>
            													<div class="col-md-8">
            														<input type="text" class="form-control" name="name_cat" value="{{$subdistricts_bill->DISTRICT_NAME}}">
            														</div>
            												</div>

                                    <div class="form-group">
            													<label class="col-md-3 control-label" for="profileFirstName">รหัสไปรษณีย์</label>
            													<div class="col-md-8">
            														<input type="text" class="form-control" name="name_cat" value="{{$get_address_bill->zip_code}}">
            														</div>
            												</div>

                                    </fieldset>

                                </div>
                              </div>
                            </div>
                            @endif










          						</div>







                      <div class="col-md-6" style="margin-bottom:120px;">

                      @if($order_detail)
                      @foreach($order_detail as $u)

                      <div class="tabs">

                        <div class="tab-content">

                          <div id="edit" class="tab-pane active">

                              <h4 class="mb-xlg">ข้อมูลการสั่งซื้อ</h4>
                              <fieldset>

                                <div class="form-group">
                                  <label class="col-md-3 control-label" for="profileFirstName">ชื่อสินค้า</label>
                                  <div class="col-md-8">
                                    <input type="text" class="form-control" name="name_cat" value="{{$u->pro_name}}">
                                    </div>
                                </div>

                                @if($u->order_option)
                                @foreach($u->order_option as $k1)

                                <div class="form-group">
                                  <label class="col-md-3 control-label" for="profileFirstName">{{$k1->item_name}}</label>
                                  <div class="col-md-8">
                                    @if($k1->item_status == 1)
                                    <input type="text" class="form-control" name="name_cat" value="฿{{number_format((float)$k1->item_price, 2, '.', '')}}">
                                    @endif
                                    </div>
                                </div>

                                @endforeach
                                @endif


                                @if($u->order_images)
                                @foreach($u->order_images as $h)
                                <div class="form-group">
                                  <label class="col-md-3 control-label" for="profileFirstName">จำนวน {{$h->order_image_sum}}</label>
                                  <div class="col-md-8">
                                    <img src="{{url('assets/image/all_image/'.$h->order_image)}}" class="img-responsive" style="width:70%">
                                    <a class="mb-xs mt-xs mr-xs btn btn-sm btn-default " href="{{url('admin/load_img/'.$h->id_img)}}" >
                                         Download</a>
                                    </div>
                                </div>
                                <hr />
                                @endforeach
                                @endif

                              </fieldset>


                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif





                        </div>












          						</div>




</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>


@if ($message = Session::get('success'))
<script type="text/javascript">
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var notice = new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success',
      addclass: 'stack-bar-top',
      stack: stack_bar_top,
      width: "100%"
    });
</script>
@endif


@if ($message = Session::get('delete'))
<script type="text/javascript">
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var notice = new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success',
      addclass: 'stack-bar-top',
      stack: stack_bar_top,
      width: "100%"
    });
</script>
@endif

@stop('scripts')

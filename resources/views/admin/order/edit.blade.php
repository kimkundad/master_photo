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




          											<h4 class="mb-xlg">Order ที่ #{{$objs->code_gen}}</h4>


                        <div class="table-responsive">
    										<table class="table table-striped mb-none">

    											<tbody>

    												<tr>
    													<td>ชื่อผู้สั่งซื้อ</td>
    													<td>{{$objs->name}}</td>
    												</tr>
                            <tr>
    													<td>อีเมล</td>
    													<td>{{$objs->email}}</td>
    												</tr>
                            <tr>
    													<td>เบอร์โทร</td>
    													<td>{{$objs->phone}}</td>
    												</tr>
                            <tr>
    													<td>ยอดชำระ</td>
    													<td>{{$objs->order_price+$objs->shipping_p}} บาท</td>
    												</tr>
                            <tr>
    													<td><b>ส่วนลด</b></td>
    													<td><b>{{$objs->discount}} บาท</b></td>
    												</tr>

                            <tr>
    													<td><b>เลือกที่จัดส่งใบกำกับภาษี</b></td>
    													<td>

                                @if( $objs->text_re_user == 1)
                                ใช้ที่อยู่จัดส่ง
                                @endif
                                @if( $objs->text_re_user == 2)
                                ใช้ที่อยู่ที่เคยออกใบกำกับภาษี
                                @endif
                                @if( $objs->text_re_user == 3)
                                กำหนดเอง
                                @endif


                            </td>
    												</tr>

                            <tr>
    													<td><b>การขอใบกำกับภาษี</b></td>
    													<td>
                              @if( $objs->bil_req == 0)
                              ไม่ขอ
                              @endif

                              @if( $objs->bil_req == 1)
                              ขอใบกำกับภาษี
                              @endif

                            </td>
    												</tr>
                            @if($objs->deliver_order != null)
                            <tr>
    													<td>เลือกเขตพื้นที่</td>
    													<td>{{$objs->shipping_t2}}</td>
    												</tr>
                            @endif

    											</tbody>
    										</table>
                        </div>


                        <br />
                        <br />

                        <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                    {{ method_field($method) }}
                                    {{ csrf_field() }}



                          <fieldset>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileFirstName">สถานะออเดอร์</label>
                              <div class="col-md-8">
                                <select name="option_type" class="form-control mb-md" required>

                                 <option value="0"
                                 @if($objs->status == 0)
                                 selected='selected'
                                 @endif
                                 > รอการตรวจสอบ </option>

                                 <option value="1"
                                 @if($objs->status == 1)
                                 selected='selected'
                                 @endif
                                 > ชำระเงินแล้ว </option>

                                 <option value="2"
                                 @if($objs->status == 2)
                                 selected='selected'
                                 @endif
                                 > อยู่ระหว่างการจัดส่ง </option>

                                 <option value="3"
                                 @if($objs->status == 3)
                                 selected='selected'
                                 @endif
                                 > จัดส่งเรียบร้อย </option>


                                </select>
                                </div>
                            </div>
                            <br>


                          </fieldset>


                          <div class="panel-footer">
                            <div class="row">
                              <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">อัพเดทข้อมูล</button>
                                <a href="{{url('admin/order_print/'.$objs->id_or)}}" target="_blank" class="btn btn-warning">Print ใบปะหน้า</a>
                                <a href="{{url('admin/order')}}" class="btn btn-default">ยกเลิก</a>

                              </div>
                            </div>
                          </div>

                        </form>








          									</div>
          								</div>
          							</div>







                        <div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


          											<h4 class="mb-xlg">ที่อยู่ในการจัดส่ง</h4>


                                <div class="table-responsive">
            										<table class="table table-striped mb-none">

            											<tbody>

            												<tr>
            													<td>ชื่อผู้รับสินค้า</td>
            													<td>{{$get_address->name_ad}}</td>
            												</tr>
                                    <tr>
            													<td>เบอร์ติดต่อ</td>
            													<td>{{$get_address->phone_ad}}</td>
            												</tr>
                                    <tr>
            													<td>ที่อยู่</td>
            													<td>{{$get_address->address_ad}}</td>
            												</tr>
                                    <tr>
            													<td>จังหวัด</td>
            													<td>{{$province->PROVINCE_NAME}}</td>
            												</tr>
                                    <tr>
            													<td>เขต/อำเภอ</td>
            													<td>{{$district->AMPHUR_NAME}}</td>
            												</tr>
                                    <tr>
            													<td>แขวง/ตำบล</td>
            													<td>{{$subdistricts->DISTRICT_NAME}}</td>
            												</tr>

                                    <tr>
            													<td>รหัสไปรษณีย์</td>
            													<td>{{$get_address->zip_code}}</td>
            												</tr>


            											</tbody>
            										</table>
                                </div>



                              </div>
                            </div>
                          </div>


                          @if($get_address_bill != null)


                          <div class="tabs">

            								<div class="tab-content">

            									<div id="edit" class="tab-pane active">


            											<h4 class="mb-xlg">ที่อยู่ในการจัดส่งใบกำกับภาษี</h4>



                                  <div class="table-responsive">
              										<table class="table table-striped mb-none">

              											<tbody>

              												<tr>
              													<td>ชื่อผู้รับสินค้า</td>
              													<td>{{$get_address_bill->name_ad}}</td>
              												</tr>
                                      <tr>
              													<td>เบอร์ติดต่อ</td>
              													<td>{{$get_address_bill->phone_ad}}</td>
              												</tr>
                                      <tr>
              													<td>ที่อยู่</td>
              													<td>{{$get_address_bill->address_ad}}</td>
              												</tr>
                                      <tr>
              													<td>จังหวัด</td>
              													<td>{{$province_bill->PROVINCE_NAME}}</td>
              												</tr>
                                      <tr>
              													<td>เขต/อำเภอ</td>
              													<td>{{$district_bill->AMPHUR_NAME}}</td>
              												</tr>
                                      <tr>
              													<td>แขวง/ตำบล</td>
              													<td>{{$subdistricts_bill->DISTRICT_NAME}}</td>
              												</tr>

                                      <tr>
              													<td>รหัสไปรษณีย์</td>
              													<td>{{$get_address_bill->zip_code}}</td>
              												</tr>


              											</tbody>
              										</table>
                                  </div>






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


                              <div class="table-responsive">
                              <table class="table table-striped mb-none">

                                <tbody>

                                  <tr>
                                    <td>ชื่อสินค้า</td>
                                    <td>{{$u->pro_name}}</td>
                                  </tr>
                                  <tr>
                                    <td>รายละเอียดสินค้าที่สั่ง</td>
                                    <td>&nbsp</td>
                                  </tr>
                                  @if($u->order_option)
                                  @foreach($u->order_option as $k1)

                                  <tr>
                                    <td>&nbsp</td>
                                    <td>{{$k1->item_name}}
                                    </td>
                                  </tr>

                                  @endforeach
                                  @endif

                                  <tr>
                                    <td>จำนวนสินค้า </td>
                                    <td>{{$u->sum_image}}</td>
                                  </tr>

                                  <tr>
                                    <td>ราคาสินค้า </td>
                                    <td>{{$u->sum_price*$u->sum_image}} บาท</td>
                                  </tr>

                                  <tr>
                                    <td>ค่าขนส่ง </td>
                                    @if($objs->shipping_p == 0)

          													<td>0 บาท</td>
                                    @else
                                    <td>{{$u->sum_shipping}} บาท</td>
                                    @endif
                                  </tr>


                                  <tr>
                                    <td>ราคารวม </td>
                                    @if($objs->shipping_p == 0)

          													<td>{{$u->sum_price*$u->sum_image}} บาท</td>
                                    @else
                                    <td>{{($u->sum_price*$u->sum_image)*$u->sum_shipping}} บาท</td>
                                    @endif
                                  </tr>



                                </tbody>
                              </table>
                              </div>

                              <br />
                              <fieldset>





                                @if($u->order_images)
                                @foreach($u->order_images as $h)
                                <div class="form-group">
                                  <label class="col-md-3 control-label" for="profileFirstName">จำนวน {{$h->order_image_sum}}</label>
                                  <div class="col-md-8">
                                    <img src="{{url('assets/image/all_image/'.$h->order_image)}}" class="img-responsive" style="width:50%">

                                    </div>
                                </div>
                                <hr />
                                @endforeach
                                @endif

                                <a class="mb-xs mt-xs mr-xs btn btn-sm btn-default " href="{{url('admin/load_img/'.$u->id_de)}}" >
                                     Download ทั้งหมด</a>

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


@if ($message = Session::get('edit_success'))
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

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
    													<td><b>พนักงาน</b></td>
    													<td>{{$objs->name_employee}}</td>
    												</tr>
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
    													<td>ราคาสินค้า</td>
    													<td>{{number_format($objs->order_price, 2)}} บาท</td>
    												</tr>
                            <tr>
    													<td>ค่าขนส่ง</td>
    													<td>{{number_format($objs->shipping_p, 2)}} บาท</td>
    												</tr>
                            <tr>
    													<td>ยอดชำระ</td>
    													<td>{{number_format($objs->order_price+$objs->shipping_p, 2)}} บาท</td>
    												</tr>
                            <tr>
    													<td><b>ส่วนลด</b></td>
    													<td><b>{{number_format($objs->discount, 2)}} บาท</b></td>
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

                            <tr>

    													<td colspan="2"><p class="text-danger">หมายเหตุ(ลูกค้า) : {{$objs->note}}</h1></p>
    												</tr>

                            <tr>
    													<td>วิธีการจัดส่ง</td>
    													<td>{{$objs->name_deli}}</td>
    												</tr>
                            @if($objs->bill_address == 2)
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
                              <label class="col-md-3 control-label" for="profileFirstName">หมายเหตุ (พนักงาน ถึง ลูกค้า)</label>
                              <div class="col-md-8">
                                <textarea class="form-control" name="note_admin_user" rows="8">{{ $objs->note_admin_user }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileFirstName">หมายเหตุ (พนักงาน)</label>
                              <div class="col-md-8">
                                <textarea class="form-control" name="note_admin" rows="8">{{ $objs->note_admin }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileFirstName">สถานะออเดอร์</label>
                              <div class="col-md-8">
                                <select name="option_type" class="form-control mb-md" required>

                                 <option value="0"
                                 @if($objs->status == 0)
                                 selected='selected'
                                 @endif
                                 > รอการชำระเงิน </option>

                                 <option value="1"
                                 @if($objs->status == 1)
                                 selected='selected'
                                 @endif
                                 > ชำระเงินแล้ว </option>

                                 <option value="2"
                                 @if($objs->status == 2)
                                 selected='selected'
                                 @endif
                                 > อยู่ระหว่างดำเนินการผลิต </option>

                                 <option value="3"
                                 @if($objs->status == 3)
                                 selected='selected'
                                 @endif
                                 > จัดส่งเรียบร้อย </option>

                                 <option value="4"
                                 @if($objs->status == 4)
                                 selected='selected'
                                 @endif
                                 > ยกเลิก </option>





                                </select>
                                </div>
                            </div>
                            <br>


                          </fieldset>


                          <div class="panel-footer">
                            <div class="row">
                              <div class="col-md-12 col-md-offset-1">
                                <button type="submit" class="btn btn-primary">อัพเดทข้อมูล</button>
                                <a href="{{url('admin/order_print/'.$objs->id_or)}}" target="_blank" class="btn btn-warning">Print ใบปะหน้า</a>

                                <a class="mb-xs mt-xs mr-xs btn  btn-default " href="{{url('admin/load_img/'.$objs->id_or)}}" >
                                     Download ทั้งหมด</a>
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
            													<td>{{$get_address->address_ad}} {{$subdistricts->DISTRICT_NAME}} {{$district->AMPHUR_NAME}} {{$province->PROVINCE_NAME}} {{$get_address->zip_code}}</td>
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


            											<h4 class="mb-xlg">ที่อยู่ออกใบกำกับภาษี</h4>



                                  <div class="table-responsive">
              										<table class="table table-striped mb-none">



                                    <tbody>

              												<tr>
              													<td>ชื่อผู้รับ</td>
              													<td>{{$get_address_bill->name_ad}}</td>
              												</tr>
                                      <tr>
              													<td>เบอร์ติดต่อ</td>
              													<td>{{$get_address_bill->phone_ad}}</td>
              												</tr>
                                      <tr>
              													<td>ที่อยู่</td>
              													<td>{{$get_address_bill->address_ad}} {{$subdistricts_bill->DISTRICT_NAME}} {{$district_bill->AMPHUR_NAME}} {{$province_bill->PROVINCE_NAME}} {{$get_address_bill->zip_code}}</td>
              												</tr>
                                      <tr>
              													<td>เลขประจำตัวผู้เสียภาษี</td>
              													<td>{{$get_address_bill->id_card_no}}</td>
              												</tr>
                                      <tr>
              													<td>รหัสสาขา</td>
              													<td>{{$get_address_bill->branch_code}}</td>
              												</tr>


              											</tbody>
              										</table>
                                  </div>






                                </div>
                              </div>
                            </div>
                            @endif




                            @if(isset($get_pay))
                            <div class="tabs">

              								<div class="tab-content">

              									<div id="edit" class="tab-pane active">


              											<h4 class="mb-xlg">การชำระเงิน</h4>


                                    <div class="table-responsive">
                										<table class="table table-striped mb-none">

                                      <tbody>

                												<tr>
                													<td>ประเภทการชำระ</td>
                													<td>@if($get_pay->pay_type == 1)
                                          <b>โอนธนาคาร </b> {{$get_pay->bank}}
                                          @elseif($get_pay->pay_type == 2)
                                          <b>2C2P </b>
                                          @elseif($get_pay->pay_type == 3)
                                          <b>Paypal </b>
                                          @else
                                          @endif</td>
                												</tr>

                                        <tr>
                													<td>วันที่</td>
                													<td>{{$get_pay->time_tran}}</td>
                												</tr>

                                        <tr>
                													<td>เวลา</td>
                													<td>{{$get_pay->time2_tran}} {{$get_pay->time3_tran}}</td>
                												</tr>

                                        <tr>
                													<td>ยอดเงิน</td>
                													<td>{{number_format((($get_pay->money)),2)}}</td>
                												</tr>
                                        @if($get_pay->pay_type == 2)
                                        <tr>
                                          <td>
                                            สถานะ การจ่ายเงินของ 2C2P
                                          </td>
                                          <td>

                                            <br/>
                                            <b>Status </b>
                                            @if($get_pay->payment_status == '000')
                                            <span class="text-success">Payment Successful</span>
                                            @elseif($get_pay->payment_status == '001')
                                            <span class="text-warning">Payment Pending</span>
                                            @elseif($get_pay->payment_status == '002')
                                            <span class="text-danger">Payment Rejected</span>
                                            @elseif($get_pay->payment_status == '003')
                                            <span class="text-danger">Payment was canceled by user</span>
                                            @else
                                            <span class="text-danger">Payment Failed</span>
                                            @endif


                                          </td>
                                        </tr>
                                        @endif

                                        @if($get_pay->image_tran != null)
                                        <tr>
                													<td>เอกสารแนบ</td>
                													<td><img src="{{url('assets/image/slip/'.$get_pay->image_tran)}}" class="img-responsive" style="width:100%"></td>
                												</tr>
                                        @else
                                        @endif

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
                                    <td>{{number_format($u->sum_price*$u->sum_image, 2)}}  บาท</td>
                                  </tr>

                                  <tr>
                                    <td>ค่าขนส่ง </td>
                                    @if($objs->shipping_p == 0)

          													<td>0 บาท</td>
                                    @else
                                    <td>{{number_format($u->sum_shipping, 2)}} บาท</td>
                                    @endif
                                  </tr>


                                  <tr>
                                    <td>ราคารวม </td>
                                    @if($objs->shipping_p == 0)

          													<td>{{number_format($u->sum_price*$u->sum_image, 2)}} บาท</td>
                                    @else
                                    <td>{{number_format(($u->sum_price*$u->sum_image)+$u->sum_shipping, 2)}}  บาท</td>
                                    @endif
                                  </tr>



                                </tbody>
                              </table>
                              </div>

                              <br />
                              <fieldset>





                              <!--  @if($u->order_images)
                                @foreach($u->order_images as $h)
                                <div class="form-group">
                                  <label class="col-md-3 control-label" for="profileFirstName">จำนวน {{$h->order_image_sum}}</label>
                                  <div class="col-md-8">
                                    <img src="{{url('assets/image/all_image/'.$h->order_image)}}" class="img-responsive" style="width:50%">

                                    </div>
                                </div>
                                <hr />
                                @endforeach
                                @endif -->



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

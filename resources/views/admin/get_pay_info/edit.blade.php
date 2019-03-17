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








                        <div class="col-md-6">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{url('admin/post_pay_info')}}" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" name="id" value="{{$objs->id}}">
                                          {{ csrf_field() }}

          											<h4 class="mb-xlg">แจ้งการชำระเงิน #{{$objs->order_id}}</h4>

          											<fieldset>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ-นามสกุล</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name" value="{{$objs->name}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">อีเมล</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="email" value="{{$objs->email}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">จำนวนเงิน</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="money" value="{{$objs->money}}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ธนาคาร</label>
          													<div class="col-md-8">
                                      <select name="bank" class="form-control mb-md" required>
                                        @if(isset($bank))
                                        @foreach($bank as $u)
                                        <option value="{{$u->id}}" @if( $u->id == $objs->bank)
                                        selected='selected'
                                        @endif>{{$u->name_bank}}</option>
                                        @endforeach
  								                      @endif
  								                    </select>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">วัน-เวลา</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="time_tran" value="{{$objs->time_tran}}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">สถานะการโอนเงิน</label>
          													<div class="col-md-8">
                                      <select name="pay_status" class="form-control mb-md" required>

                                        <option value="0" @if( $objs->pay_status == 0)
                                        selected='selected'
                                        @endif>ยังไม่ตรวจสอบ</option>

                                        <option value="1" @if( $objs->pay_status == 1)
                                        selected='selected'
                                        @endif>ตรวจสอบแล้ว</option>

  								                    </select>
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">หลักฐานการโอนเงิน</label>
          													<div class="col-md-8">
          														<img src="{{url('assets/image/slip/'.$objs->image_tran)}}" class="img-responsive" style="width:70%">
          														</div>
          												</div>








          											</fieldset>







          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          														<a href="{{url('admin/get_pay_info')}}" class="btn btn-default">ยกเลิก</a>
          													</div>
          												</div>
          											</div>

          										</form>

          									</div>
          								</div>
          							</div>
          						</div>




                      <div class="col-md-6">

                      <div class="tabs">

                        <div class="tab-content">

                          <div id="edit" class="tab-pane active">
                            <h4 class="mb-xlg">รายละเอียดของออเดอร์</h4>
                            <div class="table-responsive">
										<table class="table table-striped mb-none">

											<tbody>

												<tr>
													<td>Order ID</td>
													<td><a href="{{url('admin/order/'.$get_order->id.'/edit')}}">#{{$get_order->code_gen}}</a></td>
												</tr>
                        <tr>
													<td>การรับสินค้า</td>
													<td>{{$get_order->deliver_order}}</td>
												</tr>
                        <tr>
													<td>ราคาสั่งสินค้า</td>
													<td>{{$get_order->order_price}} บาท</td>
												</tr>
                        <tr>
													<td>ราคาค่าขนส่ง</td>
													<td>{{$get_order->shipping_p}} บาท</td>
												</tr>
                        <tr>
													<td><b>ราคารวม</b></td>
													<td><b>{{$get_order->shipping_p+$get_order->order_price}} บาท</b></td>
												</tr>

											</tbody>
										</table>
                    <br />
                    @if(isset($get_order->option))
                    @foreach($get_order->option as $k)

                    <table class="table table-striped mb-none">
                      <thead>
												<tr>
													<th>#{{$k->code_gen_d}}</th>
													<th></th>

												</tr>
											</thead>
											<tbody>

                        <tr>
													<td>ชื่อสินค้า</td>
													<td>{{$k->product_name}}</td>
												</tr>
                        <tr>
													<td>จำนวนสินค้า</td>
													<td>{{$k->sum_image}}</td>
												</tr>
                        <tr>
													<td>ราคาสินค้า</td>
													<td>{{$k->sum_price*$k->sum_image}} บาท</td>
												</tr>
                        <tr>
													<td>ราคาค่าขนส่ง</td>
                          @if($get_order->shipping_p == 0)
													<td>0 บาท</td>
                          @else
                          <td>{{$k->sum_shipping}} บาท</td>
                          @endif
												</tr>

                        <tr>
													<td><b>ราคารวม</b></td>
                          @if($get_order->shipping_p == 0)
													<td>{{$k->sum_price*$k->sum_image}} บาท</td>
                          @else
                          <td>{{($k->sum_price*$k->sum_image)*$k->sum_shipping}} บาท</td>
                          @endif

												</tr>


											</tbody>
										</table>

                    @endforeach
                    @endif
									</div>
                          </div>
                        </div>
                      </div>
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




@stop('scripts')

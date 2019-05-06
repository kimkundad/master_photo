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
              <div class="row">
              <div class="col-xs-12">

            <section class="panel">



              <div class="panel-body">






              <form class="form-horizontal form-bordered" method="POST" action="{{url('admin/search_order')}}">
                {{ csrf_field() }}

											<div class="form-group row">
                        <h5 class="font-weight-semibold text-dark text-uppercase col-lg-2">order สั่งสินค้า</h5>
												<label class="col-lg-1 control-label text-lg-right pt-1">วันที่ </label>
												<div class="col-lg-5">
													<div class="input-daterange input-group" data-plugin-datepicker="">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" class="form-control" name="start" value="{{$start}}">
														<span class="input-group-addon">to</span>
														<input type="text" class="form-control" name="end" value="{{$end}}">
													</div>
												</div>
                        <label class="col-lg-1 control-label text-lg-right pt-1">สถานะ </label>
                        <div class="col-lg-2">
                          <select class="form-control mb-3" name="status">

                            <option value="100"
                            @if($status == 100)
                            selected='selected'
                            @endif>ทั้งหมด</option>
                            <option value="0"
                            @if($status == 0)
                            selected='selected'
                            @endif>รอการชำระเงิน</option>
														<option value="1"
                            @if($status == 1)
                            selected='selected'
                            @endif>ชำระเงินแล้ว</option>
														<option value="2"
                            @if($status == 2)
                            selected='selected'
                            @endif>อยู่ระหว่างดำเนินการผลิต</option>
														<option value="3"
                            @if($status == 3)
                            selected='selected'
                            @endif>จัดส่งเรียบร้อย</option>
                            <option value="4"
                            @if($status == 4)
                            selected='selected'
                            @endif>ยกเลิก</option>

													</select>
                        </div>
                        <div class="col-lg-1">
                        <button type="submit" class="mb-1 mt-1 mr-1 btn btn-info"><i class="fa fa-search"></i> </button>
                        </div>
											</div>

									</form>
                  <hr />
                <table class="table table-responsive-lg table-striped table-sm mb-0" >
                  <thead>
                    <tr>
                      <th>เลขสั่งซื้อ</th>
                      <th>เวลา</th>
                      <th>ชื่อลูกค้า</th>
                      <th>ยอดเงิน</th>
                      <th>สถานะ</th>
                      <th>พนักงาน</th>
                      <th>Download</th>
                      <th>
                        หมายเหตุ
                      </th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
             @if($objs)
                @foreach($objs as $u)
                    <tr id="{{$u->id}}">
                      <td ><a href="{{url('admin/order/'.$u->id.'/edit')}}">#{{$u->code_gen}}</a></td>
                      <td >{{$u->created_ats}}</td>
                      <td>{{$u->name}}</td>

                      <td>{{$u->order_price+$u->shipping_p}} บาท</td>
                      <th>

                        @if($u->status == 0)
                        <span class="text-danger">รอการชำระเงิน</span>
                        @elseif($u->status == 1)
                        <span class="text-success">ชำระเงินแล้ว</span>

                        @elseif($u->status == 2)
                        <span class="text-warning">อยู่ระหว่างดำเนินการผลิต</span>

                        @elseif($u->status == 3)
                        <span class="text-primary">จัดส่งเรียบร้อย</span>

                        @else
                        <span class="text-muted">ยกเลิก </span>

                        @endif
                      </th>
                      <td>Admin</td>
                      <td><a href="{{url('admin/load_img/'.$u->id_or)}}" class="mb-1 mt-1 mr-1 btn btn-xs btn-primary">Download</a></td>
                      <td><a class="mb-1 mt-1 mr-1 btn btn-xs btn-default">หมายเหตุ</a>
                        <div id="modalBasic" class="modal-block mfp-hide">
                            <section class="card">

                              <div class="card-body">
                                <div class="modal-wrapper">
                                  <div class="modal-text">
                                    <p class="mb-0">{{$u->note}}</p>
                                  </div>
                                </div>
                              </div>
                              <footer class="card-footer">
                                <div class="row">
                                  <div class="col-md-12 text-right">

                                    <button class="btn btn-default modal-dismiss">ปิด</button>
                                  </div>
                                </div>
                              </footer>
                            </section>
                          </div>
                      </td>
                      <td>

                        <div class="btn-group flex-wrap">
  												<button type="button" class="mb-1 mt-1 mr-1 btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">จัดการ <span class="caret"></span></button>
  												<div class="dropdown-menu" role="menu">

  													<a class="dropdown-item text-1 text-primary" href="{{url('admin/order/'.$u->id.'/edit')}}"><i class="fa fa-gear"></i> แก้ไขข้อมูล</a>
  												<!--	<a class="dropdown-item text-1 text-danger" href="">ลบ</a> -->
                          <form  action="{{url('admin/order/'.$u->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                              <input type="hidden" name="_method" value="DELETE">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" title="ลบบทความ" class="dropdown-item text-1 text-danger"><i class="fa fa-times "></i> ลบ</button>
                          </form>

  												</div>
  											</div>

                      </td>
                    </tr>
                 @endforeach
              @endif

                  </tbody>
                </table>
                <div class="pagination"> {{ $objs->links() }} </div>
              </div>
            </section>

              </div>
            </div>
        </div>
</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>

<script type="text/javascript">


$('.input-daterange').datepicker({
    format: 'yyyy-mm-dd'
});


$(document).ready(function(){
  $("input:checkbox").change(function() {
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api/api_order_status')}}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "user_id" : user_id },
            success: function(data){
              if(data.data.success){


                var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
                      var notice = new PNotify({
                            title: 'ทำรายการสำเร็จ',
                            text: 'คุณเปลี่ยนการแสดงผล สำเร็จเรียบร้อยแล้วค่ะ',
                            type: 'success',
                            addclass: 'stack-topright'
                          });



              }
            }
        });
    });
});
</script>

@if ($message = Session::get('add_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif


@if ($message = Session::get('delete'))
<script type="text/javascript">


    var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
        var notice = new PNotify({
              title: 'ทำรายการสำเร็จ',
              text: 'ยินดีด้วย ได้ทำการลบข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
              type: 'success',
              addclass: 'stack-topright'
            });
</script>
@endif

@stop('scripts')

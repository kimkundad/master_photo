@extends('admin.layouts.template')





@section('admin.content')


<style>
.card-body {
    background: #fdfdfd;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    border-radius: 5px;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
table.table {
    font-size: 12px;
}
</style>



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
          							<div class="col-md-2 col-lg-2">




          							</div>







                        <div class="col-md-8 col-lg-8">

                          <div class="wizard-progress wizard-progress-lg">
                            <div class="steps-progress">
                            <div class="progress-indicator" style="width: 100%;"></div>
                          </div>
                            <ul class="nav wizard-steps">
                              <li class="nav-item active completed">
                                <a class="nav-link"  data-toggle="tab"><span>1</span>ข้อมูลสินค้า</a>
                              </li>
                              <li class="nav-item active completed">
                                <a class="nav-link"  data-toggle="tab"><span>2</span>รูปประกอบ</a>
                              </li>
                              <li class="nav-item active completed">
                                <a class="nav-link" data-toggle="tab"><span>3</span>ออฟชั่นสินค้า</a>
                              </li>
                              <li class="nav-item active">
                                <a class="nav-link" data-toggle="tab"><span>4</span>ราคาจัดส่ง</a>
                              </li>
                            </ul>
                          </div>






          						</div>

                      <div class="col-md-4">
                        </div>
                      <div class="col-md-4">


                            <a class="btn btn-info btn-block" href="{{url('admin/product/'.$objs->id_q.'/edit')}}">
                                <i class="fa fa-cube"></i> กลับไปข้อมูลสินค้า</a>
                                <h5 style="margin-left:15px; margin-bottom:15px;"> กด ICON เพื่อเพิ่มข้อมูล บริการจัดส่งได้เลย</h5>
                      </div>

                      <div class="col-md-12">

                        <hr />
                        @if(isset($deli))
                          @foreach($deli as $de)

                        <div class="
                        @if($de->option == 0)
                        col-md-1
                        @else
                        col-md-4
                        @endif
                        ">
                          <img src="{{url('assets/image/app_ship/'.$de->de_image)}}" data-toggle="modal" data-target="#modalBootstrap_main{{$de->id_q}}" class="img-rounded img-responsive" style="width:60px; height:60px;">



                          <div class="modal" id="modalBootstrap_main{{$de->id_q}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">เพิ่มช่องทางการส่งสินค้า {{$de->name}}?</h5>

                                </div>
                                <form  method="POST" action="{{url('admin/add_deli_item_com/')}}" name="modalBootstrap_main{{$de->id_q}}" enctype="multipart/form-data">
                                <div class="modal-body">
                                  {{ csrf_field() }}
                                    <fieldset>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileFirstName">ตั้งแต่*</label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control" name="start_rank" value="0">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileFirstName">ถึง*</label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control" name="end_rank" value="0">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileFirstName">ค่าขนส่ง*</label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control" name="total_price" value="0">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileFirstName">ค่าขนส่งรอง*</label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control" name="total_price2" value="0">
                                          </div>
                                      </div>
                                    <input type="hidden" class="form-control" name="id_deli" value="{{$de->id_q}}">
                                    <input type="hidden" class="form-control" name="name_ser" value="{{$de->name}}">
                                    <input type="hidden" class="form-control" name="product_id" value="{{$objs->id_q}}">
                                    </fieldset>

                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>

                          <!-- End modal add main  -->
                          @if($de->option != 0)
                          <div class="card-body {{$de->option}}" >

                            <table class="table table-responsive-md mb-0">
                              <thead>
                                <tr>
                                  <th>เริ่ม</th>
                                  <th>ถึง</th>
                                  <th>ราคา</th>
                                  <th>ราคา 2</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                @if(isset($de->option_item))
                                  @foreach($de->option_item as $u)
                                <tr>
                                  <td>{{$u->start_rank}}</td>
                                  <td>{{$u->end_rank}}</td>
                                  <td>{{$u->total_price}}</td>
                                  <td>{{$u->total_price2}}</td>
                                  <td>
                                    <a class="text-muted t-r-10" data-toggle="modal" data-target="#modalBootstrap_edit_item{{$u->id_item}}" href="#" style="margin-right:5px;"><i class="fa fa-gear" aria-hidden="true"></i></a>

                                    <div class="modal" id="modalBootstrap_edit_item{{$u->id_item}}" tabindex="-1" role="dialog">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">เพิ่มช่องทางการส่งสินค้า {{$de->name}}?</h5>
                                            
                                            </button>
                                          </div>
                                          <form  method="POST" action="{{url('admin/edit_deli_item_com/')}}" name="modalBootstrap_edit_item{{$u->id_item}}" enctype="multipart/form-data">
                                          <div class="modal-body">
                                            {{ csrf_field() }}
                                              <fieldset>
                                                <div class="form-group">
                                                  <label class="col-md-3 control-label" for="profileFirstName">ตั้งแต่*</label>
                                                  <div class="col-md-8">
                                                    <input type="text" class="form-control" name="start_rank" value="{{$u->start_rank}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                  <label class="col-md-3 control-label" for="profileFirstName">ถึง*</label>
                                                  <div class="col-md-8">
                                                    <input type="text" class="form-control" name="end_rank" value="{{$u->end_rank}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                  <label class="col-md-3 control-label" for="profileFirstName">ค่าขนส่ง*</label>
                                                  <div class="col-md-8">
                                                    <input type="text" class="form-control" name="total_price" value="{{$u->total_price}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                  <label class="col-md-3 control-label" for="profileFirstName">ค่าขนส่งรอง*</label>
                                                  <div class="col-md-8">
                                                    <input type="text" class="form-control" name="total_price2" value="{{$u->total_price2}}">
                                                    </div>
                                                </div>
                                              <input type="hidden" class="form-control" name="product_id" value="{{$objs->id_q}}">
                                              <input type="hidden" class="form-control" name="id_deli_item" value="{{$u->id_item}}">
                                              </fieldset>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- End modal edit item  -->

                                    <a class="text-danger t-r-10" data-toggle="modal" data-target="#modalBootstrap_del_item{{$u->id_item}}" href="#" ><i class="fa fa-times" aria-hidden="true"></i></a>

                                    <div class="modal fade" id="modalBootstrap_del_item{{$u->id_item}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document" >
                                        <div class="modal-content ">
                                        <form  method="POST" action="{{url('admin/del_item_on_ship/'.$u->id_item)}}" name="modalBootstrap_del_item{{$u->id_item}}">
                                          {{ csrf_field() }}
                                          <div class="modal-body">
                                              <h4 class="mb-xlg text-center">คุณแน่ใจใช่ไหม? ที่จะลบ Item นี้ออกไป</h4>
                                              <fieldset>
                                                <div class="form-group">

                                                  <div class="col-md-8">

                                                    <input type="hidden" class="form-control" name="product_id" value="{{$objs->id_q}}">
                                                    </div>
                                                </div>
                                              </fieldset>
                                          </div>
                                          <div class="panel-footer">
                                            <div class="row">
                                              <div class="col-md-9 col-md-offset-4">
                                                <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                                                <button data-dismiss="modal" class="btn btn-default">ยกเลิก</button>
                                              </div>
                                            </div>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>

                                  </td>
                                </tr>
                                  @endforeach
                                @endif

                              </tbody>
                            </table>

            								</div>
                            @endif

                            <!-- End card body -->

                        </div>
                          @endforeach
                        @endif

                      </div>









          						</div>




</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>


@if ($message = Session::get('add_item_success'))
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

@if ($message = Session::get('edit_item_success'))
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


@if ($message = Session::get('del_item_success'))
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

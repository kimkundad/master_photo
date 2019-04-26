@extends('admin.layouts.template')





@section('admin.content')

<style>
.modal-header .close {
    margin-top: -20px;
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

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

          											<h4 class="mb-xlg">แก้ไขช่องทางการส่งสินค้า</h4>

          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อบริการ*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name" value="{{$objs->name}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName"></label>
          													<div class="col-md-8">
          														<img src="{{url('assets/image/app_ship/'.$objs->de_image)}}" class="img-rounded img-responsive" style="width:120px;" title="">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รายละเอียด</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="de_detail" rows="6">{{ $objs->de_detail }}</textarea>
          														</div>
          												</div>

                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1">Logo ผู้ให้บริการ</label>
                                    <div class="col-md-8">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                              <div class="input-append">
                                                <div class="uneditable-input">
                                                  <i class="fa fa-file fileupload-exists"></i>
                                                  <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                  <span class="fileupload-exists">Change</span>
                                                  <span class="fileupload-new">Select file</span>
                                                  <input type="file" name="image">
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                              </div>
                                            </div>
                                            </div>
                                  </div>
                                  <br>







          											</fieldset>







          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          														<a href="{{url('admin/delivery')}}" class="btn btn-default">ยกเลิก</a>
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

                              <div class="col-md-6 " style="padding-left: 1px;">
                              <h4 class="mb-xlg">ท่าขนส่ง ของ {{$objs->name}}</h4>
                              </div>
                              <div class="col-md-6 " style="padding-left: 1px;">

                                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalBootstrap" href="#" >
                                    <i class="fa fa-plus"></i> เพิ่ม</a>
                              </div>

                              <div class="modal" id="modalBootstrap" tabindex="-1" role="dialog">
            										<div class="modal-dialog" role="document">
            											<div class="modal-content">
            												<div class="modal-header">
            													<h5 class="modal-title">เพิ่มช่องทางการส่งสินค้า?</h5>
            													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            														<span aria-hidden="true">&times;</span>
            													</button>
            												</div>
                                    <form  method="POST" action="{{url('admin/add_deli_item')}}" enctype="multipart/form-data">
            												<div class="modal-body">


                                                  {{ csrf_field() }}



                  											<fieldset>
                                          <div class="form-group">
                  													<label class="col-md-3 control-label" for="profileFirstName">ชื่อท่าขนส่ง*</label>
                  													<div class="col-md-8">
                  														<input type="text" class="form-control" name="name">
                  														</div>
                  												</div>

                                          <div class="form-group">
                  													<label class="col-md-3 control-label" for="profileFirstName">ราคาค่าขนส่ง*</label>
                  													<div class="col-md-8">
                  														<input type="text" class="form-control" name="de_price">
                  														</div>
                  												</div>

                                        <input type="hidden" class="form-control" name="id_deli" value="{{$objs->id}}">


                                          <br>





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

                              <br><br>

                              <table class="table table-responsive-lg table-striped table-sm mb-0" >
                                <thead>
                                  <tr>
                                    <th>ท่าขนส่ง</th>
                                    <th>ราคาค่าขนส่ง</th>
                                    <th class="text-right">จัดการ</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @if(isset($item))
                                  @foreach($item as $a)
                                  <tr>
                                    <td>
                                      {{$a->deli_name}}
                                    </td>
                                    <td>
                                      {{$a->deli_price}}
                                    </td>
                                    <td style="text-align: right;">
                                      <a type="button" class="mb-xs mt-xs mr-xs btn btn-warning" data-toggle="modal" data-target="#modalBootstrap-{{$a->id}}"><i class="fa fa-gear"></i></a>

                                      <div class="modal" id="modalBootstrap-{{$a->id}}" tabindex="-1" role="dialog">
                    										<div class="modal-dialog" role="document">
                    											<div class="modal-content">
                    												<div class="modal-header">
                    													<h5 class="modal-title text-left">แก้ไขช่องทางการส่งสินค้า?</h5>
                    													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    														<span aria-hidden="true">&times;</span>
                    													</button>
                    												</div>
                                            <form  method="POST" action="{{url('admin/edit_deli_item')}}" enctype="multipart/form-data">
                    												<div class="modal-body">


                                                          {{ csrf_field() }}



                          											<fieldset>
                                                  <div class="form-group">
                          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อท่าขนส่ง*</label>
                          													<div class="col-md-8">
                          														<input type="text" class="form-control" name="name" value="{{$a->deli_name}}">
                          														</div>
                          												</div>

                                                  <div class="form-group">
                          													<label class="col-md-3 control-label" for="profileFirstName">ราคาค่าขนส่ง*</label>
                          													<div class="col-md-8">
                          														<input type="text" class="form-control" name="de_price" value="{{$a->deli_price}}">
                          														</div>
                          												</div>

                                                <input type="hidden" class="form-control" name="de_status" value="{{$a->id}}">
                                                <input type="hidden" class="form-control" name="de_status2" value="{{$objs->id}}">


                                                  <br>





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


                                      <a data-toggle="modal" data-target="#modalNoFooter-del-{{$objs->id}}" href="#" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-times "></i></a>



                                      <div class="modal" id="modalNoFooter-del-{{$objs->id}}" tabindex="-1" role="dialog">
                    										<div class="modal-dialog" role="document">
                    											<div class="modal-content">
                    												<div class="modal-header">
                    													<h5 class="modal-title text-left">แน่ใจใช่ไหม?</h5>
                    													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    														<span aria-hidden="true">&times;</span>
                    													</button>
                    												</div>
                                            <form  method="POST" name="del_item" action="{{url('admin/del_deli_item')}}" enctype="multipart/form-data">
                                              {{ csrf_field() }}
                    												<div class="modal-body">

                      														<p class="mb-0">ท่านต้องการลบข้อมูลนี้จริงๆ ใช่ไหม?</p>
                                                  <input type="hidden" class="form-control" name="de_status" value="{{$a->id}}">
                                                  <input type="hidden" class="form-control" name="de_status2" value="{{$objs->id}}">
                    												</div>
                    												<div class="modal-footer">
                    													<button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                    													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
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
                          </div>
                        </div>
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />





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

@if ($message = Session::get('edit_item_success'))
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

@if ($message = Session::get('edit_item_success2'))
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

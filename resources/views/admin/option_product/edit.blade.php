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
          							<div class="col-md-2 col-lg-2">




          							</div>







                        <div class="col-md-8 col-lg-8">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

          											<h4 class="mb-xlg">แก้ไข option</h4>

          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ option*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="option_name" value="{{ $objs->option_name }}">
          														</div>
          												</div>


                                  @if($objs->option_title != null)
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ option*</label>
          													<div class="col-md-8">
          														<img src="{{url('assets/image/product/'.$objs->option_title)}}" class="img-responsive" style="height:250px;" />
          														</div>
          												</div>
                                  @endif



                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1">รูป คำอธิบาย*</label>
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


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">option type*</label>
          													<div class="col-md-8">
          														<select name="option_type" class="form-control mb-md" required>

          								             <option value="1"
                                       @if($objs->option_type == 1)
                                       selected='selected'
                                       @endif
                                       > select type </option>
          								             <option value="2"
                                       @if($objs->option_type == 2)
                                       selected='selected'
                                       @endif
                                       > select image type </option>
          								            </select>
          													</div>
          												</div>
          											</fieldset>

          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          														<a href="{{url('admin/option_product')}}" class="btn btn-default">ยกเลิก</a>
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

                              <h4 class="mb-xlg">Option Item</h4>



                              <table class="table">
                                <thead>
                                  <tr>

                                    <th>รายละเอียด</th>
                                    <th>ราคา</th>
                                    <th>resolution</th>
                                    <th>รูป</th>
                                    <th>จัดการ</th>
                                  </tr>
                                </thead>
                                <tbody>
                           @if($option_set)
                              @foreach($option_set as $u)
                                  <tr>

                                    <td>{{$u->item_name}}</td>
                                    <td>{{$u->item_price}}</td>
                                    <td>{{$u->resolution}}</td>
                                    <td>
                                    @if($u->item_image != null)
                                    <img src="{{url('assets/image/option/'.$u->item_image)}}"  height="50" />
                                    @endif</td>
                                    <td>

                                      <div class="btn-group flex-wrap">
                												<button type="button" class="mb-1 mt-1 mr-1 btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">จัดการ <span class="caret"></span></button>
                												<div class="dropdown-menu" role="menu">

                													<a class="dropdown-item text-1 modal-basic" href="#modalBasic-{{$u->id}}">แก้ไข</a>
                												<!--	<a class="dropdown-item text-1 text-danger" href="">ลบ</a> -->
                                        <form  action="{{url('admin/option_product_item_del/'.$u->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                            <input type="hidden" name="_method" value="POST">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                             <input type="hidden" class="form-control" name="option_id" value="{{ $objs->id }}">
                                            <button type="submit" title="ลบบทความ" class="dropdown-item text-1 text-danger"><i class="fa fa-times "></i> ลบ</button>
                                        </form>

                												</div>
                											</div>

                                    </td>
                                  </tr >


                                  <div id="modalBasic-{{$u->id}}" class="modal-block mfp-hide">
                										<section class="panel">

                											<header class="panel-heading">
                												<h2 class="panel-title">แก้ไข item option</h2>
                											</header>
                											<div class="panel-body">
                                        <form  method="POST" action="{{url('admin/option_product_item_edit/'.$u->id)}}" enctype="multipart/form-data">

                                                    {{ csrf_field() }}



                    											<fieldset>
                                            <div class="form-group">
                    													<label class="col-md-3 control-label" for="profileFirstName">item name*</label>
                    													<div class="col-md-8">
                    														<input type="text" class="form-control" name="item_name" value="{{$u->item_name}}">
                                                <input type="hidden" class="form-control" name="option_id" value="{{ $objs->id }}">
                    														</div>
                    												</div>

                                            <div class="form-group">
                    													<label class="col-md-3 control-label" for="profileFirstName">item price*</label>
                    													<div class="col-md-8">
                    														<input type="text" class="form-control" name="item_price" value="{{$u->item_price}}">
                    														</div>
                    												</div>

                                            <div class="form-group">
                    													<label class="col-md-3 control-label" for="profileFirstName">item resolution*</label>
                    													<div class="col-md-8">
                    														<input type="text" class="form-control" name="resolution" value="{{ $u->resolution}}">
                    														</div>
                    												</div>

                                            @if($objs->option_type == 2)
                                            <div class="form-group">
                                              <label class="col-md-3 control-label" for="exampleInputEmail1">item image*</label>
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
                                            @endif





                    											</fieldset>


                											</div>
                											<footer class="panel-footer">
                												<div class="row">
                													<div class="col-md-12 text-right">
                														<button class="btn btn-primary " type="submit">แก้ไขข้อมูล</button>
                													<button class="btn btn-default modal-dismiss">ยกเลิก</button>
                													</div>
                												</div>
                											</footer>
                                      </form>

                										</section>
                									</div>



                               @endforeach
                            @endif

                                </tbody>
                              </table>

                            </div>
                          </div>
                        </div>



                        <div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">

                              <h4 class="mb-xlg">Add Option Item</h4>

                              <form  method="POST" action="{{url('admin/option_product_item/')}}" enctype="multipart/form-data">

                                          {{ csrf_field() }}



          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">item name*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="item_name" value="{{ old('item_name')}}">
                                      <input type="hidden" class="form-control" name="option_id" value="{{ $objs->id }}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">item price*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="item_price" value="{{ old('item_price')}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">item resolution*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="resolution" value="{{ old('resolution')}}">
          														</div>
          												</div>

                                  @if($objs->option_type == 2)
                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1">item image*</label>
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
                                  @endif





          											</fieldset>

          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
          														<button type="reset" class="btn btn-default">ยกเลิก</button>
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

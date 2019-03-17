@extends('admin.layouts.template')


@section('admin.stylesheet')
<link href="{{URL::asset('assets/upload_image/css/fileinput.css')}}" rel="stylesheet">
@stop('admin.stylesheet')


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

          											<h4 class="mb-xlg">แก้ไข {{ $objs->pro_name }}</h4>

          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อสินค้า*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="pro_name" value="{{ $objs->pro_name }}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">หมวดหมู่*</label>
          													<div class="col-md-8">
          														<select name="pro_category" class="form-control mb-md" required>

                                        <option value="">-- เลือกหมวดหมู่ --</option>
  								                        @foreach($category as $categorys)
  													                 <option value="{{$categorys->id}}"
                                               @if( $objs->pro_category == $categorys->id)
                                               selected='selected'
                                               @endif
                                               >{{$categorys->sub_name}}</option>
  													              @endforeach
  								                    </select>
          								            </select>
          													</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">ประเภทสินค้า*</label>
          													<div class="col-md-8">
          														<select name="pro_status_show" class="form-control mb-md" required>

                                        <option value="1"
                                        @if( $objs->pro_status_show == 1)
                                        selected='selected'
                                        @endif
                                        >สินค้าทั่วไป</option>
                                        <option value="2"
                                        @if( $objs->pro_status_show == 2)
                                        selected='selected'
                                        @endif
                                        >NEW ARRIVALS!</option>
                                        <option value="3"
                                        @if( $objs->pro_status_show == 3)
                                        selected='selected'
                                        @endif
                                        >WHAT'S HOT</option>
                                        <option value="4"
                                        @if( $objs->pro_status_show == 4)
                                        selected='selected'
                                        @endif
                                        >WHAT'S NEW</option>
                                        <option value="5"
                                        @if( $objs->pro_status_show == 5)
                                        selected='selected'
                                        @endif
                                        >PROMOTION</option>

  								                    </select>
          								            </select>
          													</div>
          												</div>



                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">คำอธิบาย*</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="pro_title" rows="5">{{ $objs->pro_title }}</textarea>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รายละเอียดสินค้า*</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="pro_name_detail" rows="6">{{ $objs->pro_name_detail }}</textarea>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รูปภาพหลัก*</label>
          													<div class="col-md-8">
          														<img src="{{url('assets/image/product/'.$objs->pro_image)}}" style="width:350px;" />
          														</div>
          												</div>


                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1">รูปหลักสินค้า*</label>
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

                                  <hr />
                                  <div class="col-md-12">
                                    <p>
                                      เลือก option ได้มากกว่า 1 ทางเลือก
                                      <br />
                                    </p>
                                  </div>



                                  @foreach($option_product as $option_products)
                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1"></label>
                                      <div class="col-md-8">
                                  <div class="checkbox-custom checkbox-primary">
                                   <input type="checkbox" name="option[]" id="checkboxExample2" @if($option_products->options == 1) checked="" @endif value="{{$option_products->id}}">
                                   <label for="checkboxExample2">{{$option_products->option_name}} </label>
                                 </div>
                                 </div>
                                   </div>
                                  @endforeach
                                  <br />


                                  <hr />
                                  <h4 class="mb-xlg">กำหนดราคา ค่าจัดส่ง</h4>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ยอดตัดสินค้า จัดส่ง*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="set_limit" value="{{ $objs->set_limit }}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ราคาค่าจัดส่ง*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="a_price_o" value="{{ $objs->a_price_o }}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ราคาค่าจัดส่ง (ราคาสอง กรณีไม่คิดราคาแรก)*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="b_price_o" value="{{ $objs->b_price_o }}">
          														</div>
          												</div>



          											</fieldset>







          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">อัพเดทข้อมูล</button>
          														<a href="{{url('admin/product')}}" class="btn btn-default">ยกเลิก</a>
          													</div>
          												</div>
          											</div>

          										</form>

          									</div>
          								</div>
          							</div>
          						</div>





            <style>
						.btn-file {
							width: 130px;
						}
						</style>


            <div class="col-md-8 col-md-offset-2">
                  <section class="panel">
                    <div class="panel-body">
											<form  method="POST" action="{{url('admin/add_gallery')}}" enctype="multipart/form-data">

		                                          {{ csrf_field() }}

		                                          <div class="row">
		                                              <div class="col-md-12" style="padding-right: 15px;">


		                            <div class="form-group">


		                <label for="exampleInputFile">เพิ่มรูปภาพประกอบ อย่างน้อย 4 รูปขึ้นไป</label>


		                <input id="file-0a" class="file " type="file" name="product_image[]" accept="image/*" multiple>
		                <input type="hidden" name="pro_id" class="form-control" value="{{ $objs->id_q }}" required>



		                </div>

		                <div class="">
		                    <button type="submit" class="btn btn-info btn-fill btn-wd">อัพโหลดรูปภาพ</button>
		                </div>



		                </div>
		                </div>

		              </form>
                  </div>
                </section>
                <br><br>


                </div>





                <div class="col-md-8 col-md-offset-2">
                      <section class="panel">
                        <div class="panel-body">


                          <form  action="{{url('property_image_del')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                      <input type="hidden" name="_method" value="POST">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
											 <input type="hidden" name="pro_id" class="form-control" value="{{ $objs->id_q }}" required>

                  <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">

                  @if($img_all)
                  @foreach($img_all as $img_u)
                    <div class="isotope-item  col-sm-6 col-md-4 col-lg-3" style="min-height: 180px; max-height: 240px;">
                      <div class="thumbnail">
                        <div class="">
                          <a class="thumb-image" >
                            <img src="{{url('assets/image/gallery/'.$img_u->image)}}" class="img-responsive" >
                          </a>
                          <br>
                          <div class="mg-thumb-options">
                            <div class="checkbox-custom checkbox-default">
                              <input type="checkbox" name="product_image[]" value="{{$img_u->id}}"  >
                              <label>เลือกรูปภาพประกอบ</label>
                            </div>
                          </div>
                        </div>

                        <div class="mg-description">

                          <small class="pull-right text-muted"></small>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  @endif




                  </div>
                  <button type="submit" class="btn btn-danger pull-right" style="margin-top:15px;">ลบรูปภาพที่เลือกไว้</button>
                  </form>

                      </div>
                    </section>
                    <br><br>


                    </div>









          						</div>




</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>
<script src="{{URL::asset('assets/upload_image/js/fileinput.js')}}"></script>

@if ($message = Session::get('add_success_img'))
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


@if ($message = Session::get('del_success_img'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการลบรูปประกอบ สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif

@stop('scripts')

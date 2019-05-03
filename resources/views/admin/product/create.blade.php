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

                          <div class="wizard-progress wizard-progress-lg">
      											<div class="steps-progress">
      												<div class="progress-indicator">

                            </div>
      											</div>
      											<ul class="nav wizard-steps">
      												<li class="nav-item active ">
      													<a class="nav-link"  data-toggle="tab"><span>1</span>ข้อมูลสินค้า</a>
      												</li>
      												<li class="nav-item ">
      													<a class="nav-link"  data-toggle="tab"><span>2</span>รูปประกอบ</a>
      												</li>
      												<li class="nav-item">
      													<a class="nav-link" data-toggle="tab"><span>3</span>ออฟชั่นสินค้า</a>
      												</li>
      												<li class="nav-item">
      													<a class="nav-link" data-toggle="tab"><span>4</span>ราคาจัดส่ง</a>
      												</li>
      											</ul>
      										</div>



          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">

                              @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

          											<h4 >เพิ่ม สินค้าใหม่</h4>
                                <p class="text-muted">
                                  ช่องกรอกข้อมูลที่มี (<span class="text-danger"> * </span>) จำเป็นต้องกรอกข้อมูลลงไป
                                </p>
                                <hr />

          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อสินค้า<span class="text-danger">*</span></label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="pro_name" value="{{ old('pro_name')}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">โปรโมชั่น ( promotion )</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="pro_promotion" rows="6">{{ old('pro_promotion') }}</textarea>
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">หมวดหมู่<span class="text-danger">*</span></label>
          													<div class="col-md-8">
          														<select name="pro_category" class="form-control mb-md" required>

                                        <option value="">-- เลือกหมวดหมู่ --</option>
  								                        @foreach($category as $categorys)
  													                 <option value="{{$categorys->id}}">{{$categorys->sub_name}}</option>
  													              @endforeach
  								                    </select>
          								            </select>
          													</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">ประเภทสินค้า<span class="text-danger">*</span></label>
          													<div class="col-md-8">
          														<select name="pro_status_show" class="form-control mb-md" required>

                                        <option value="1">สินค้าทั่วไป</option>
                                        <option value="2">NEW ARRIVALS!</option>
                                        <option value="3">WHAT'S HOT</option>
                                        <option value="4">WHAT'S NEW</option>
                                        <option value="5">PROMOTION</option>
                                        <option value="6">NEW ARRIVALS! (บนซ้าย)</option>
                                        <option value="7">NEW ARRIVALS! (บนขวา)</option>

  								                    </select>
          								            </select>
          													</div>
          												</div>



                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">คำอธิบาย</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="pro_title" rows="5">{{ old('pro_title') }}</textarea>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รายละเอียดสินค้า</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="pro_name_detail" rows="6">{{ old('pro_name_detail') }}</textarea>
          														</div>
          												</div>


                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1">รูปหลักสินค้า<span class="text-danger">*</span></label>
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


<!--
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
                                   <input type="checkbox" name="option[]" id="checkboxExample2" value="{{$option_products->id}}">
                                   <label for="checkboxExample2">{{$option_products->option_name}}</label>
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
          														<input type="text" class="form-control" name="set_limit" value="{{ old('set_limit')}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ราคาค่าจัดส่ง*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="a_price_o" value="{{ old('a_price_o')}}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ราคาค่าจัดส่ง (ราคาสอง กรณีไม่คิดราคาแรก)*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="b_price_o" value="{{ old('b_price_o')}}">
          														</div>
          												</div>

 -->


          											</fieldset>


          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
          														<a href="{{url('admin/product')}}" class="btn btn-default">ยกเลิก</a>
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

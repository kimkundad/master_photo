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








                        <div class="col-md-10 col-md-offset-1">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

          											<h4>เพิ่มช่องทางการส่งสินค้า</h4>
                                <p class="text-muted">
                                  ช่องกรอกข้อมูลที่มี (<span class="text-danger"> * </span>) จำเป็นต้องกรอกข้อมูลลงไป
                                </p>
                                <hr />
          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ตั้งชื่อบริการ<span class="text-danger"> * </span></label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name" placeholder="SCG EXPRESS, Kerry Express, Grab Express">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">รูปแบบกำหนดราคา<span class="text-danger">*</span></label>
          													<div class="col-md-8">
          														<select name="de_type" onchange="getComboA(this)" class="form-control mb-md" required>
                                        <option> -- เลือกกำหนดราคา -- </option>
                                        <option value="1">กำหนดราคาตายตัว</option>
                                        <option value="2">แบ่งย่อยสถานี</option>
                                        <option value="3">กำหนด Rank สินค้า</option>

  								                    </select>
          								            </select>
          													</div>
          												</div>


                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileFirstName">ราคาที่ส่งฟรี</label>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="de_status" value="0">
                                      </div>
                                  </div>

                                  <div class="" id="option_select_op2" style="Display:none">
                                    <div class="form-group">
            													<label class="col-md-3 control-label" for="profileFirstName">ราคาค่าขนส่ง </label>
            													<div class="col-md-8">
            														<input type="text" class="form-control" name="de_price" value="0">
            														</div>
            												</div>


                                  </div>





                                  <br />

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รายละเอียด</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="de_detail" rows="6">{{ old('de_detail') }}</textarea>
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





          											</fieldset>







          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                                      <a href="{{url('admin/delivery')}}" class="btn btn-default">ยกเลิก</a>
          													</div>
          												</div>
          											</div>

          										</form>

          									</div>
          								</div>
          							</div>
          						</div>















          						</div>

                      <style>
                      .img-rounded{
                        margin-top: 15px;
                      }
                      </style>

                     <div class="row">
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/256x256bb.jpg')}}" class="img-rounded img-responsive" title="">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/246x0w.jpg')}}" class="img-rounded img-responsive" title="SCG EXPRESS">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/512x512bb.jpg')}}" class="img-rounded img-responsive" title="ไปรษณีย์ไทย">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/820427deea2ddb737ad3c564a311b222.png')}}" class="img-rounded img-responsive" title="">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/14262687041829.jpg')}}" class="img-rounded img-responsive" title="">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/CJ-Logistics.jpg')}}" class="img-rounded img-responsive" title="">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/Grab_Express.png')}}" class="img-rounded img-responsive" title="">
                       </div>

                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/images.png')}}" class="img-rounded img-responsive" title="">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/kerry.png')}}" class="img-rounded img-responsive" title="">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/lineman.png')}}" class="img-rounded img-responsive" title="">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/nim.jpg')}}" class="img-rounded img-responsive" title="">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/ninja.png')}}" class="img-rounded img-responsive" title="">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/tnt.png')}}" class="img-rounded img-responsive" title="">
                       </div>
                       <div class="col-md-1">
                         <img src="{{url('assets/image/app_ship/itgooglemybusiness.png')}}" class="img-rounded img-responsive" title="">
                       </div>
                     </div>




</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>

<script type="text/javascript">

//  $("#option_select_op2").show()

function getComboA(selectObject) {


    var value1 = selectObject.value;


    if(value1 == 1){
      $("#option_select_op2").show()
    }else{
      $("#option_select_op2").hide()
    }





}
</script>


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

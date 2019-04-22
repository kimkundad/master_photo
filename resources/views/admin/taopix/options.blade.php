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
                            <div class="progress-indicator" style="width: 66%;"></div>
                          </div>
                            <ul class="nav wizard-steps">
                              <li class="nav-item active completed">
                                <a class="nav-link"  data-toggle="tab"><span>1</span>สินค้า</a>
                              </li>
                              <li class="nav-item active completed">
                                <a class="nav-link"  data-toggle="tab"><span>2</span>ธีม</a>
                              </li>
                              <li class="nav-item active">
                                <a class="nav-link" data-toggle="tab"><span>3</span>ออฟชั่น</a>
                              </li>
                              <li class="nav-item ">
                                <a class="nav-link" data-toggle="tab"><span>4</span>สำเร็จ</a>
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


                              <form  method="POST" action="{{url('admin/add_taopix_option/')}}" enctype="multipart/form-data">
                                          {{ csrf_field() }}

          											<h4 >เลือก option ของสินค้า</h4>
                                <p class="text-muted">
                                  ช่องกรอกข้อมูลที่มี (<span class="text-danger"> * </span>) จำเป็นต้องกรอกข้อมูลลงไป
                                </p>
                                <hr />

          											<fieldset>



                                  <input type="hidden" class="form-control" name="taopix_id" value="{{$get_data->id}}">
                                  <input type="hidden" class="form-control" name="pro_id" value="{{$get_data->pro_id}}">


                                  @if($option_product)
                                  @foreach($option_product as $item)

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">{{$item->options_detail->option_name}}<span class="text-danger">*</span></label>

                                    <div class="col-md-8">

          													  <select name="option_id[]" class="form-control populate" required>
                                        <option value="">-- เลือก Option สินค้า --</option>
                                        @foreach($item->options_detail->opt as $item_2)
                                        <option value="{{$item_2->id_d}}">{{$item_2->item_name}}</option>
                                        @endforeach
                                      </select>
                                      </select>
                                    </div>
          												</div>

                                  @endforeach
                                  @endif




          											</fieldset>


          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
          														<a href="{{url('admin/taopix')}}" class="btn btn-default">ยกเลิก</a>
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

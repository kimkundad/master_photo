@extends('admin.layouts.template')


@section('admin.stylesheet')
<link href="{{URL::asset('assets/upload_image/css/fileinput.css')}}" rel="stylesheet">
@stop('admin.stylesheet')

            <style>
						.btn-file{
							width: 130px;
						}
						</style>

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

                    <section class="panel">
                      <div class="panel-body">
  											<form  method="POST" action="{{url('admin/add_gallery')}}" enctype="multipart/form-data">

  		                                          {{ csrf_field() }}

  		                                          <div class="row">
  		                                              <div class="col-md-12" style="padding-right: 15px;">


  		                            <div class="form-group">


  		                <label for="exampleInputFile">เพิ่มรูปภาพประกอบ อย่างน้อย 4 รูปขึ้นไป</label>


  		                <input id="file-0a" class="file " type="file" name="product_image[]" accept="image/*" multiple>
  		                <input type="hidden" name="pro_id" class="form-control" value="{{ $id }}" required>



  		                </div>

  		                <div class="">
  		                    <button type="submit" class="btn btn-info btn-fill btn-wd">อัพโหลดรูปภาพ</button>
  		                </div>



  		                </div>
  		                </div>

  		              </form>
                    </div>
                  </section>
          						</div>









          						</div>




</section>
@stop



@section('scripts')
<script src="{{URL::asset('assets/upload_image/js/fileinput.js')}}"></script>
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>


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

@stop('scripts')

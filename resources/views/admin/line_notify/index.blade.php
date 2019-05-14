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


                                <h4 >Line Notify</h4>


                                  <br />



                                <fieldset>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Token Line Notify</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="token_line" value="{{ old('token_line') }}" >
          													</div>
          												</div>






          											</fieldset>







          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-10 col-md-offset-4">
          														<button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
          														<a href="{{url('admin/sub_category')}}" class="btn btn-default">ยกเลิก</a>
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



@stop('scripts')

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








                        <div class="col-md-10 col-md-offset-1" style="margin-bottom:120px;">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">




          											<h4 class="mb-xlg">ข้อมูล Order ที่ #{{$objs->id}}</h4>

          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ นามสกุล*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->firstname_order}} {{$objs->lastname_order}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">อีเมล*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->email_order}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เบอร์โทร*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->phone_order}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ที่อยู่*</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="pro_name_detail" rows="6">{{ $objs->address }}</textarea>
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">จังหวัด*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->province}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รหัสไปรษณีย์*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->zipcode}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ยอดชำระ*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->order_price}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ส่วนลด*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->discount}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Note*</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="pro_name_detail" rows="6">{{ $objs->note }}</textarea>
          														</div>
          												</div>
          											</fieldset>










          									</div>
          								</div>
          							</div>








                        @if($order_detail)
                        @foreach($order_detail as $u)
                        <div class="col-md-6">
                          <section class="card">

                              <div class="panel-body">
                              <h4 class="mb-xlg">{{$u->product_name}}</h4>

                              <div class="table-responsive">
            										<table class="table table-striped mb-none">

            											<tbody>
            												<tr>
            													<td>จำนวนรูป</td>
            													<td>{{$u->sum_image}}</td>
            												</tr>

                                    <tr>
            													<td>ราคา</td>
            													<td>{{$u->sum_price}}</td>
            												</tr>
                                    <tr>
            													<td>size_photo</td>
            													<td>
                                        @if($u->order_option)
                                        {{$u->order_option->item_name}}
                                        @endif
                                      </td>
            												</tr>
                                    <tr>
            													<td>type photo print</td>
            													<td>@if($u->order_option2)
                                        {{$u->order_option2->item_name}}
                                        @endif
                                      </td>
            												</tr>
                                    @foreach($u->image_option as $j)
                                    <tr>
            													<td><img src="{{url('assets/image/all_image/'.$j->order_image)}}" class="img-responsive" style="height:100px;"/></td>
            													<td>{{$j->order_image_sum}} pcs.</td>
            												</tr>
                                    @endforeach

            											</tbody>
            										</table>
            									</div>

                              </div>


                          </section>
                        </div>
                        @endforeach
                        @endif


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

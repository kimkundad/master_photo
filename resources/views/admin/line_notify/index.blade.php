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


                              <form  method="POST" action="{{url('admin/line_update')}}" enctype="multipart/form-data">

                                          {{ csrf_field() }}


                                <h4 >Line Notify</h4>
                                <p>
                                  เป็นบริการของ LINE ที่ให้สามารถส่งข้อความ การแจ้งเตือนต่าง ๆ ไปยัง Chat ส่วนตัวหรือ Chat กลุ่มผ่านทาง API ที่ LINE ได้เตรียมไว้ให้
                                </p>
                                <p>
                                  ก่อนอื่นเลย ไปที่ <a target="_blank" href="https://notify-bot.line.me/th/">https://notify-bot.line.me/th/</a> แล้ว login ให้เรียบร้อยนะ
                                </p>
                                <p>
                                  <img src="{{url('assets/image/line1.jpg')}}" class="img-responsive" />
                                  เมนู มุมบนขวา เข้าไปยัง <b>หน้าของฉัน</b>
                                </p>
                                <p>
                                  <img src="{{url('assets/image/line2.jpg')}}" class="img-responsive" />
                                   <b>เลื่อนลงมาที่ด้านล่างจะพบกับปุ่มที่มีนามว่า “ออก Token” แล้วกดมันซะ</b>
                                </p>
                                <p>
                                  <img src="{{url('assets/image/1_pEZA9eBgGW17otWZskFzHA.png')}}" class="img-responsive" /><br />
                                   <b>จะมี ช่องให้เราใส่ชื่อ Notify สำหรับแสดงใน Chat และ list รายชื่อแชทต่างๆ ให้เราเลือกค้นหา Chat ที่ต้องการให้ Line Notify จากนั้น กดแรงๆ ที่ “ออก Token”</b><br />
                                    เมื่อได้ Token ออกมาแล้วให้ทำการเก็บไว้ดีๆนะ เพราะจะเป็นปัจจัยหลัก* ในการใช้งาน Line Notify กันเลยทีเดียว
                                    <img src="{{url('assets/image/line3.jpg')}}" class="img-responsive" />
                                    <br />
                                    หลังจากนั้นอย่าลืม ลากเจ้า Line Notify เข้ากลุ่ม หรือ Chat ที่ต้องการรับการแจ้งเตือนด้วยนะ
                                </p>
                                <p>
                                  เอา Code มาวางไว้ข้างล่าง Token Line Notify
                                </p>


                                  <br />



                                <fieldset>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Token Line Notify</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="token_line" value="{{ $objs->line_noti }}" >
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

@if ($message = Session::get('edit_success'))
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

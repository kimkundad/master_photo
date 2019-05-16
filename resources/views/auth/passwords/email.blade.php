@extends('layouts.template')

@section('title')
เปลี่ยนหรือรีเซ็ตรหัสผ่าน | MASTER PHOTO NETWORK
@stop

@section('stylesheet')

<style>
.panel-body {
    background: #eee;
}
.btn{
    padding: 8px 20px;
    font-size: 16px;
}
</style>


@stop('stylesheet')
@section('content')


<main class="white_bg" style="margin-top:120px;">




    <div class="container margin_60">

      <div class=" margin_30 text-center">
        <h2 class="major"><span style="background: #fff;">เปลี่ยนหรือรีเซ็ตรหัสผ่าน</span></h2>
        <p>
          คุณสามารถเปลี่ยนรหัสผ่านเพื่อความปลอดภัยหรือรีเซ็ตรหัสผ่านใหม่ได้หากลืมรหัสเก่าไปแล้ว
        </p>
      </div>

      <div class="row">

        <div class="col-md-6 col-md-offset-3 text-center">
          <div class="panel panel-default login_box">

            <div class="panel-body">



              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif


              <form class="form-horizontal" method="POST" id="my_form_login" action="{{ route('password.email') }}">
                  {{ csrf_field() }}

                <div class="form-group">
                  <div class="col-md-12 text-left">
                    <label for="exampleInputEmail1">อีเมลผู้ใช้ </label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>



                <div class="form-group">
                  <div class="col-md-12 ">
                    <a type="submit" class="btn btn-submit pull-right" href="javascript:{}" onclick="document.getElementById('my_form_login').submit();">
                          <i class="fa fa-btn "></i> เปลี่ยนรหัสผ่าน
                    </a>
                  </div>
                </div>





              </form>
            </div>






          </div>





        </div>










      </div>




    </div>
    <!-- End container -->
  </main>
  <!-- End main -->


@endsection

@section('scripts')

<script type="text/javascript">
$(document).ready(function() {

$('.submit_on_enter').keydown(function(event) {
  // enter has keyCode = 13, change it if you want to use another button
  if (event.keyCode == 13) {
    this.form.submit();
    return false;
  }
});

});
</script>

@stop('scripts')

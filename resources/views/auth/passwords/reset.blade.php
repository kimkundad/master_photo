
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


              <form class="form-horizontal" method="POST" id="my_form_login" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                    <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
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

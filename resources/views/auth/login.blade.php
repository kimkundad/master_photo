@extends('layouts.template')

@section('title')
เข้าสุ่ระบบ MASTER PHOTO NETWORK
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
        <h2 class="major"><span style="background: #fff;">SIGN IN</span></h2>
        <p>
          SIGN IN OR JOIN TO MAKE A BEAUTIFUL PHOTO GIFT.
        </p>
      </div>

      <div class="row">

        <div class="col-md-6 col-md-offset-3 text-center">
          <div class="panel panel-default login_box">

            <div class="panel-body">



              <div class="form-group">

                <br />

                <div style="margin-bottom: 16px;">
                  <a class="btn btn-block btn-social btn-facebook btn-lg " href="{{ route('social.oauth', 'facebook') }}" style="text-align: center;">
                      <i class="icon-facebook-1"></i> Sign in with Facebook
                    </a>
                    <br />
                    <a class="btn btn-block btn-social btn-google-plus btn-lg" href="{{ route('social.oauth', 'google') }}" style="text-align: center;">
                      <i class="icon-gmail"></i> Sign in with Google
                    </a>
                </div>

              </div>


              <div>
                <p class="t_mid">OR</p>
              </div>


              <form class="form-horizontal "  id="my_form_login" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                <div class="form-group">
                  <div class="col-md-12 text-left">
                    <label for="exampleInputEmail1">Your E-mail </label>
                    <input  type="email" class="form-control submit_on_enter" name="email" placeholder="Your Email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">


                  <div class="col-md-12 text-left">
                    <label for="exampleInputPassword1">Password</label>
                    <input  type="password" class="form-control submit_on_enter" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                           <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12 ">

                    <label style="padding-top:5px;  float: left;" >
                    <input type="checkbox" name="remember"> จดจำในระบบ
                    </label>

                    <a class="btn btn-link pull-right"  href="{{ url('/password/reset') }}">รีเซ็ตรหัสผ่าน</a>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12 ">
                    <a type="submit" class="btn btn-submit pull-right" href="javascript:{}" onclick="document.getElementById('my_form_login').submit();">
                          <i class="fa fa-btn "></i> Login
                    </a>
                  </div>
                </div>





              </form>
            </div>






          </div>

          <div style="margin: 20px 60px; font-size:15px;">
            <div class="col-md-7">
                Don't have an account yet?
              </div>
            <div class="col-md-5">
                <a href="{{url('register')}}" class="text-light" >
                Create new account
                </a>
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

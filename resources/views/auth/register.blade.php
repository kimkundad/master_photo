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
        <h2 class="major"><span style="background: #fff;">SIGN UP</span></h2>
        <p>
          SIGN UP JOIN TO MAKE A BEAUTIFUL PHOTO GIFT.
        </p>
      </div>

      <div class="row">

        <div class="col-md-6 col-md-offset-3 text-center">
          <div class="panel panel-default login_box">

            <div class="panel-body">



              <div class="form-group">

                <br />

                <div style="margin-bottom: 16px;">
                  <a class="btn btn-block btn-social btn-facebook btn-lg" href="redirect" style="text-align: center;">
                      <i class="icon-facebook-1"></i> Sign up with Facebook
                    </a>
                    <br />
                    <a class="btn btn-block btn-social btn-google-plus btn-lg" href="redirect" style="text-align: center;">
                      <i class="icon-gmail"></i> Sign up with Google
                    </a>
                </div>


              </div>


              <div>
                <p class="t_mid">OR</p>
              </div>


              <form class="form-horizontal" id="my_form_register" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}


                        <div class="form-group">
                          <div class="col-md-12 text-left">
                            <label for="exampleInputEmail1">Username</label>
                            <input  type="email" class="form-control" name="name" placeholder="Your name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>

                <div class="form-group">
                  <div class="col-md-12 text-left">
                    <label for="exampleInputEmail1">Your E-mail</label>
                    <input  type="email" class="form-control" name="email" placeholder="Your Email" value="{{ old('email') }}">

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
                    <input  type="password" class="form-control" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                           <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>


                <div class="form-group">


                  <div class="col-md-12 text-left">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input  type="password" class="form-control" name="password_confirmation" placeholder="confirm password">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                           <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>



                <div class="form-group">
                  <div class="col-md-12 ">
                    <a type="submit" href="javascript:{}" onclick="document.getElementById('my_form_register').submit();" class="btn btn-submit pull-right">
                          <i class="fa fa-btn "></i> Register
                    </a>
                  </div>
                </div>





              </form>
            </div>






          </div>

          <div style="margin: 20px 60px; font-size:15px;">
            <div class="col-md-7">
                Already have an account?
              </div>
            <div class="col-md-5">
                <a href="{{url('login')}}" class="text-light" >
                Sign In!
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

@stop('scripts')

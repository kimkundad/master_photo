@extends('layouts.template')

@section('title')
Shipping | MASTER PHOTO NETWORK
@stop

@section('stylesheet')

@stop('stylesheet')
@section('content')



<main class="slider-pro">


  <style>
  .f1-step {
  width: 25%;
  }
  .table {
  margin-bottom: 0px;
  }
  </style>

  <div class="container margin_60">

    <div class="f1-steps">
      <div class="f1-progress">
          <div class="f1-progress-line" data-now-value="13.66" data-number-of-steps="4" style="width: 38%;"></div>
      </div>
      <div class="f1-step active">
        <div class="f1-step-icon"><i class=" icon-basket-1"></i></div>
        <p>Cart</p>
      </div>
      <div class="f1-step active">
        <div class="f1-step-icon"><i class=" icon-truck"></i></div>
        <p>Shipping</p>
      </div>
        <div class="f1-step">
        <div class="f1-step-icon"><i class=" icon-dollar"></i></div>
        <p>Payment</p>
      </div>
      <div class="f1-step">
      <div class="f1-step-icon"><i class=" icon-check-3"></i></div>
      <p>Order Complete</p>
    </div>
    </div>
    <?php
      $total_pay = 0;
      $total_img = 0;
     ?>
@foreach(Session::get('cart') as $u)
<?php
 $total_pay += $u['data'][2]['sum_price'];
 $total_img += $u['data'][1]['sum_image'];
 ?>
@endforeach

    <div class="row margin_30">
      <form action="{{url('/add_order')}}" method="post" enctype="multipart/form-data" name="product">
        {{ csrf_field() }}
      <div class="col-md-8 box_style_1  add_bottom_15">


        <div class="box_style_1 visible-sm visible-xs">

          <table class="table table_summary" >
            <tbody>


              <tr>
                <td>
                  Point Order
                </td>
                <td class="text-right">
                  xxx
                </td>
              </tr>

              <tr>
                <td>
                  Total
                </td>
                <td class="text-right">
                  {{$total_img}}
                </td>
              </tr>
              <tr>
                <td>
                  Discount
                </td>
                <td class="text-right">
                  0
                </td>
              </tr>

              <tr class="total">
                <td>
                  Summary
                </td>
                <td class="text-right">
                  ฿ {{$total_pay}}
                </td>
              </tr>
            </tbody>
          </table>

        </div>

        <div class="form_title">
          <h3><strong>1</strong>Your Details</h3>
          <p>
            Mussum ipsum cacilds, vidis litro abertis.
          </p>
        </div>
        <div class="step">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control" value="{{Auth::user()->name}}" name="firstname_order" value="{{ old('firstname_order')}}">
                @if ($errors->has('firstname_order'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('firstname_order') }}
                </p>
                @endif

              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control" name="lastname_order" value="{{ old('lastname_order')}}">
                @if ($errors->has('lastname_order'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('lastname_order') }}
                </p>
                @endif

                <input type="hidden" class="form-control" name="order_price" value="{{$total_pay}}">
                <input type="hidden" class="form-control" name="total" value="{{$total_img}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email_order" value="{{Auth::user()->email}}" class="form-control">
                @if ($errors->has('email_order'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('email_order') }}
                </p>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>Telephone</label>
                <input type="text" name="phone_order" value="{{ old('phone_order')}}" class="form-control">
                @if ($errors->has('phone_order'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('phone_order') }}
                </p>
                @endif
              </div>
            </div>
          </div>

        </div>
        <!--End step -->


        <div class="form_title">
          <h3><strong>2</strong>Billing Address</h3>
          <p>
            Mussum ipsum cacilds, vidis litro abertis.
          </p>
        </div>
        <div class="step">

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <label>Address </label>
                <div id="autocomplete-container ">
								<input id="autocomplete-input" type="text" class="form-control" name="address" placeholder="บ้านเลขที่, ตำบล, อำเภอ" value="{{ old('address')}}">
                @if ($errors->has('address'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('address') }}
                </p>
                @endif
							</div>

              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>province</label>
                <input type="text" name="province" placeholder="จังหวัด" class="form-control" value="{{ old('province')}}">
                @if ($errors->has('province'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('province') }}
                </p>
                @endif
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Postal code</label>
                <input type="text" name="zipcode" placeholder="รหัสไปรษณีย์ " class="form-control" value="{{ old('zipcode')}}">
                @if ($errors->has('zipcode'))
                <p class="text-danger" style="margin-top:10px;">
                  {{ $errors->first('zipcode') }}
                </p>
                @endif
              </div>
            </div>
          </div>
          <!--End row -->
        </div>
        <!--End step -->

        <div id="policy">
          <h4>Cancellation policy</h4>
          <div class="form-group">
            <label>
              <div class="icheckbox_square-grey" style="position: relative; width: 23px;">
                <input type="checkbox" name="policy_terms" id="policy_terms" style="position: absolute; opacity: 0;">
                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
              </div>I accept terms and conditions and general policy.</label>
              @if ($errors->has('policy_terms'))
              <p class="text-danger" style="margin-top:10px;">
                {{ $errors->first('policy_terms') }}
              </p>
              @endif
          </div>
          <button type="submit" class="btn btn-next">PAYMENT NOW</button>
        </div>
      </div>
      </form>


      <div class="col-md-4 ">


        <div class="box_style_1 hidden-sm hidden-xs">

          <table class="table table_summary" >
            <tbody>


              <tr>
                <td>
                  Point Order
                </td>
                <td class="text-right">
                  xxx
                </td>
              </tr>

              <tr>
                <td>
                  Total
                </td>
                <td class="text-right">
                  {{$total_img}}
                </td>
              </tr>
              <tr>
                <td>
                  Discount
                </td>
                <td class="text-right">
                  0
                </td>
              </tr>

              <tr class="total">
                <td>
                  Summary
                </td>
                <td class="text-right">
                  ฿ {{$total_pay}}
                </td>
              </tr>
            </tbody>
          </table>

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

<!-- Google Autocomplete -->
<script>
  function initAutocomplete() {
    var input = document.getElementById('autocomplete-input');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }
    });

	if ($('.main-search-input-item')[0]) {
	    setTimeout(function(){
	        $(".pac-container").prependTo("#autocomplete-container");
	    }, 300);
	}
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpN7ALbslkRAqQEdaS1Bz0J-Tu7e8rzy8&libraries=places&callback=initAutocomplete"></script>


@stop('scripts')

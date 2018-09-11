@extends('layouts.template')

@section('title')
 | MASTER PHOTO NETWORK
@stop

@section('stylesheet')

<style>
figure {
	margin: 0;
	padding: 0;
	background: #fff;
	overflow: hidden;
}
figure:hover+span {
	bottom: -36px;
	opacity: 1;
}

.hover01 figure img {
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover01 figure:hover img {
	-webkit-transform: scale(1.3);
	transform: scale(1.1);
}
</style>

@stop('stylesheet')
@section('content')






<main class="white_bg slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">DIGITAL OFFSET PRINTS</span></h2>

    </div>

    <div class="row">

      <div class="col-md-6 col-sm-6 ">

        <div class="panel_2">




        <div class="slider-pro" id="my-slider" style="margin-top: 0px !important;">
          <div class="sp-slides">

            <div class="sp-slide">
              <img class="sp-image" src="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}" data-src="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}" data-src="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}"/>
            </div>

            <div class="sp-slide">
                <img class="sp-image" src="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}" data-src="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}" data-retina="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}"/>
            </div>

            <div class="sp-slide">
              <img class="sp-image" src="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}" data-src="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}" data-retina="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}"/>
            </div>

            <div class="sp-slide">
              <img class="sp-image" src="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}" data-src="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}" data-retina="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}"/>
            </div>

            <div class="sp-slide">
              <img class="sp-image" src="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}" data-src="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}" data-retina="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}"/>
            </div>

            <div class="sp-slide">
              <img class="sp-image" src="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}" data-src="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}" data-retina="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}"/>
            </div>

          </div>

          <div class="sp-thumbnails">
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}" data-src="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}" data-retina="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}"/>
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}" data-src="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}" data-retina="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}"/>
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}" data-src="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}" data-retina="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}"/>
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}" data-src="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}" data-retina="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}"/>
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}" data-src="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}" data-retina="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}"/>
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}" data-src="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}" data-retina="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}"/>
          </div>
        </div>
        <br />
          </div>

      </div>



      <div class="col-md-6 col-sm-6 ">
        <div class="single-ofset">
          <h3>OFFSET PRINT</h3>
          <p>A frame adds instant polish to any photo. Our beautiful Framed Prints come with an easel backing for easy tabletop display and a wall mount, if you’d prefer to hang your special photo. Makes a great gift!</p>
             <hr />

             <style>
             .f1-step {
             width: 25%;
             }
             .table {
             margin-bottom: 0px;
             }
             </style>

             <div id="step1" style="font-size: 14px; font-weight: 600;">

             </div>

             <div id="step2" style="font-size: 14px; font-weight: 600;">

             </div>

             <div id="step3" style="font-size: 14px; font-weight: 600;">

             </div>

             <div id="step4" style="font-size: 14px; font-weight: 600;">

             </div>


             <form role="form" action="" name="myForm" method="post" class="f1">


               <div class="f1-steps">
                 <div class="f1-progress">
                     <div class="f1-progress-line" data-now-value="13.66" data-number-of-steps="4" style="width: 13.66%;"></div>
                 </div>
                 <div class="f1-step active">
                   <div class="f1-step-icon">1</div>
                   <p>SIZE</p>
                 </div>
                 <div class="f1-step">
                   <div class="f1-step-icon">2</div>
                   <p>ORIENTATION</p>
                 </div>
                   <div class="f1-step">
                   <div class="f1-step-icon">3</div>
                   <p>FRAMES</p>
                 </div>

                 <div class="f1-step">
                 <div class="f1-step-icon">4</div>
                 <p>Finish</p>
               </div>
               </div>

               <fieldset class="masonry">



                     <div class="form-group">

                        <label class="step1">

                            <input type="radio" id="f1-last-name" name="step1" value="4x6">
                            <ins class="iCheck-helper" ></ins>

                          Size 4x6  <span class="jet-span">$24.99</span>
                        </label>

                     </div>

                       <div class="form-group">

                          <label class="item">

                              <input type="radio" id="f1-last-name" name="step1" value="5x7">
                              <ins class="iCheck-helper" ></ins>

                            Size 5x7  <span class="jet-span">$24.99</span>
                          </label>

                       </div>
                       <div class="form-group">

                          <label class="item">

                              <input type="radio" id="f1-last-name" name="step1" value="8x10">
                              <ins class="iCheck-helper" ></ins>

                            Size 8x10  <span class="jet-span">$24.99</span>
                          </label>

                       </div>


                       <div class="f1-buttons">
                           <button type="button" class="btn btn-next">Next</button>
                       </div>
                   </fieldset>

                   <fieldset>

                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step2" value="portrait">
                            <ins class="iCheck-helper" ></ins>

                          portrait
                        </label>

                     </div>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step2" value="landscape">
                            <ins class="iCheck-helper" ></ins>

                          landscape
                        </label>

                     </div>

                     <div class="f1-buttons">
                         <button type="button" class="btn btn-previous">Previous</button>
                         <button type="button" class="btn btn-next">Next</button>
                     </div>

                   </fieldset>

                   <fieldset>

                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step3" value="portrait">
                            <ins class="iCheck-helper" ></ins>

                          portrait
                        </label>

                     </div>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step3" value="landscape">
                            <ins class="iCheck-helper" ></ins>

                          landscape
                        </label>

                     </div>

                     <div class="f1-buttons">
                         <button type="button" class="btn btn-previous">Previous</button>
                         <button type="button" class="btn btn-next">Next</button>
                     </div>

                   </fieldset>

                   <fieldset>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step4" value="black wood">
                            <ins class="iCheck-helper" ></ins>

                          <img src="{{url('master/assets/images/138ec0b1bd0c12b962b376e8d8d7e56a-11127.png')}}" width="50" />
                          black wood
                        </label>

                     </div>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step4" value="natural wood">
                            <ins class="iCheck-helper" ></ins>

                          <img src="{{url('master/assets/images/ecd0a579f9cae01aeb12866d9e5800bc-11129.png')}}" width="50" />
                          natural  wood
                        </label>

                     </div>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step4" value="walnut wood">
                            <ins class="iCheck-helper" ></ins>

                          <img src="{{url('master/assets/images/6daa87d3921328958155c36af4751bb2-11128.png')}}" width="50" />
                          walnut   wood
                        </label>

                     </div>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step4" value="white wood">
                            <ins class="iCheck-helper" ></ins>

                          <img src="{{url('master/assets/images/187b5ce94e83199fc958e54931ee2652-11125.png')}}" width="50" />
                          white  wood
                        </label>

                     </div>
                     <br />
                     <div class="f1-buttons">
                     <button type="button" class="btn btn-previous">Previous</button>
                     </div>
                     <br />


                   </fieldset>


                   <table class="table table_summary" style="margin-top:20px;">
                      <tbody>
                        <tr>
                          <td>
                            Promotion xxxxxx
                          </td>

                        </tr>
                        <tr class="total">

                          <td >
                          Total Price  <span>$154</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>



                     <div class="f1-buttons">
                       <br />

                         <a href="#" class="btn btn-submit btn-block">MAKE ORDER</a>
                     </div>

             </form>











        </div>


      </div>


    </div>




  </div>
  <!-- End container -->
</main>
<!-- End main -->

@endsection

@section('scripts')



<script src="{{url('master/assets/js/jquery.backstretch.js')}}"></script>
<script src="{{url('master/assets/js/scripts.js')}}"></script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('#my-slider').sliderPro({
      width: '100%',
      height: '500',
      arrows: true,
      visibleSize: '100%',
      autoHeight: true,
    });
  });
</script>

<script type="text/javascript">

$('input[name=step1]').on('ifChecked', function(event){
  document.getElementById('step1').innerHTML = "Size : "+$(this).val();
  console.log($(this).val());
 });

 $('input[name=step2]').on('ifChecked', function(event){
   document.getElementById('step2').innerHTML = "ORIENTATION : "+$(this).val();
   console.log($(this).val());
  });

  $('input[name=step3]').on('ifChecked', function(event){
    document.getElementById('step3').innerHTML = "FRAMES : "+$(this).val();
    console.log($(this).val());
   });

   $('input[name=step4]').on('ifChecked', function(event){
     document.getElementById('step4').innerHTML = "Wood : "+$(this).val();
     console.log($(this).val());
    });

</script>

@stop('scripts')

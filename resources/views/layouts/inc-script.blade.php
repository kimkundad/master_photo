<script src="{{url('master/assets/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('master/assets/js/common_scripts_min.js')}}"></script>
<script src="{{url('master/assets/js/functions.js')}}?v2"></script>
<script src="{{url('master/assets/js/jquery.magnific-popup.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<!-- Specific scripts -->
<script src="{{url('master/assets/js/icheck.js')}}"></script>
<script>
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-grey',
    radioClass: 'iradio_square-grey'
  });
</script>

<script src="{{url('master/assets/js/jquery.ddslick.js')}}"></script>
<script>
  $("select.ddslick").each(function() {
    $(this).ddslick({
      showSelectedHTML: true
    });
  });

  $(".numbers-row").append('<div class="inc button_inc">+</div><div class="dec button_inc">-</div>');

</script>

<script src="{{url('master/assets/js/jquery.sliderPro.min.js')}}"></script>


<script type="text/javascript" src="{{url('master/assets/slick/slick.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".regular").slick({
      dots: true,
      infinite: true,
      arrows: false,
      slidesToShow: 6,
      autoplay: true,
      autoplaySpeed: 4000,
      slidesToScroll: 6,
      responsive: [
  {
    breakpoint: 1024,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      infinite: true,
      dots: false
    }
  },
  {
    breakpoint: 600,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3
    }
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3
    }
  }
  // You can unslick at a given breakpoint now by adding:
  // settings: "unslick"
  // instead of a settings object
]
    });
  });
</script>
<script src="{{url('master/assets/js/bootstrap-notify.js')}}"></script>



 <script src="{{url('master/assets/js/notify_func.js')}}"></script>

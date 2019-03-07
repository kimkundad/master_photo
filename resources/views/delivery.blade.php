@extends('layouts.template')

@section('title')
kerry express | MASTER PHOTO NETWORK
@stop

@section('stylesheet')
<style>
.p_16{
  font-size: 14px;
}
</style>
@stop('stylesheet')
@section('content')


<main class="white_bg slider-pro" >




  <div class="container margin_60">

    @if(trans('message.lang') == 'Thai')

    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">บริการจัดส่งเดลิเวอรี่</span></h2>

    </div>

    <div class="row">




        <div class="col-md-10 col-md-offset-1 ">


          <h3>บริการจัดส่งเดลิเวอรี่ ในพื้นที่กรุงเทพฯ</h3>

              <p class="text-warning">
                <strong>ค่าบริการจัดส่ง 50 บาท ต่อครั้ง ใช้บริการครบ 500 บาทขึ้นไป บริการจัดส่งฟรี! (เฉพาะเขตพื้นที่บริการเท่านั้น) ขยายพื้นที่จัดส่ง Delivery ในกรุงเทพฯ เพิ่มขึ้น</strong>
              </p>
              <br />

              <div id="map" class="map desk-three-forth"></div>



              <h5 class="text-center"> <strong> ติดต่อได้ที่เบอร์โทร 02-513-0105, Line ID : @masterphotonetwork, Fax. 02-939-3080 ทุกวัน เวลา 8.00-22.00น.</strong></h5>

				</div>
    </div>

    @else

    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">Delivery service</span></h2>

    </div>

    <div class="row">




        <div class="col-md-10 col-md-offset-1 ">


          <h3>Delivery service In Bangkok</h3>

              <p class="text-warning">
                <strong>Delivery fee 50 baht per time, use 500 baht or more, free delivery service! (Only service areas) Expand delivery areas in Bangkok.</strong>
              </p>
              <br />

              <div id="map" class="map desk-three-forth"></div>



              <h5 class="text-center"> <strong>Contact at 02-513-0105, Line ID: @masterphotonetwork, Fax. 02-939-3080. Daily 8:00 - 22:00 hrs</strong></h5>

				</div>
    </div>

    @endif









  </div>
  <!-- End container -->
</main>
<!-- End main -->

@endsection

@section('scripts')


<script type="text/javascript">
    var map;
    function initMap() {
      var myLatLng = {lat: 13.76751, lng: 100.5064158};
      map = new google.maps.Map(document.getElementById('map'), {
         zoom: 11,
         center: myLatLng
      });

      var infowindow = new google.maps.InfoWindow();

      var marker = new google.maps.Marker({
      	position: {lat: 13.7085005, lng: 100.3779119},
      	map: map,
      	title: 'สาขาปากซอยหมู่บ้านเศรษฐกิจ',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขาปากซอยหมู่บ้านเศรษฐกิจ');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.8178692, lng: 100.4489744},
      	map: map,
      	title: 'สาขา ราชพฤกษ์',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขา ราชพฤกษ์');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.7154553, lng: 100.4063138},
      	map: map,
      	title: 'สาขาบางแค',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขาบางแค');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.7188506, lng: 100.5387318},
      	map: map,
      	title: 'สาขา สวนพลู',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขา สวนพลู');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.7243693, lng: 100.5393755},
      	map: map,
      	title: 'สาขา สาทร',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขา สาทร');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.747118, lng: 100.573986},
      	map: map,
      	title: 'อาคารอิตไทย',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('อาคารอิตไทย');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.8158324, lng: 100.5617},
      	map: map,
      	title: 'สาขาตรงข้ามเซ็นทรัลลาดพร้าว',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขาตรงข้ามเซ็นทรัลลาดพร้าว');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.841726, lng: 100.5715835},
      	map: map,
      	title: 'สาขาเกษตร',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขาเกษตร');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.8573065, lng: 100.6275371},
      	map: map,
      	title: 'สาขารามอินทรา กม.4',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขารามอินทรา กม.4');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.8590233, lng: 100.6470837},
      	map: map,
      	title: 'สาขา วัชรพล',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขา วัชรพล');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.8395774, lng: 100.6610915},
      	map: map,
      	title: 'สาขา รามอินทรา กม. 8',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขา รามอินทรา กม. 8');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.7764839, lng: 100.6270302},
      	map: map,
      	title: 'สาขาลาดพร้าว 99',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขาลาดพร้าว 99');
          infowindow.open(map, marker);
        }
      })(marker));

      var marker = new google.maps.Marker({
      	position: {lat: 13.7673192, lng: 100.6496841},
      	map: map,
      	title: 'สาขาเสรีไทย',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขาเสรีไทย');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.7745145, lng: 100.6691784},
      	map: map,
      	title: 'สาขาสุขาภิบาล 3 (รามคำแหง)',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขาสุขาภิบาล 3 (รามคำแหง)');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.7873207, lng: 100.6930393},
      	map: map,
      	title: 'สาขา รามคำแหง 150',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขา รามคำแหง 150');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.7297707, lng: 100.6549841},
      	map: map,
      	title: 'สาขา พัฒนาการ',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขา พัฒนาการ');
          infowindow.open(map, marker);
        }
      })(marker));


      var marker = new google.maps.Marker({
      	position: {lat: 13.5931264, lng: 100.5973005},
      	map: map,
      	title: 'สาขา ปากน้ำ',
      	icon: {
      		url: "{{url('master/assets/image/Metro_3.png')}}",
      		scaledSize: new google.maps.Size(70, 70)
      	}
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('สาขา ปากน้ำ');
          infowindow.open(map, marker);
        }
      })(marker));




    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA89Rb8Kz1ArY3ks6sSvz2cNrn66CHKDiA&callback=initMap" async defer></script>



@stop('scripts')

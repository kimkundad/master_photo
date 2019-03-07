@extends('layouts.template')

@section('title')
Delivery Option | MASTER PHOTO NETWORK
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
      <h2 class="major"><span style="background: #fff;">ช่องทางการส่งสินค้า</span></h2>

    </div>

    <div class="row">




        <div class="col-md-10 col-md-offset-1 ">

          <div class="col-md-8">

            <h3> <span>ช่องทางการส่งสินค้า</span></h3>
  					<p>
  						<strong>ลูกค้าสามารถเลือกรับรูปได้ถึง 6 ช่องทาง ตามความสะดวกดังนี้ค่ะ</strong>
  					</p>
            <ol>
              <li>
                จัดส่งฟรี! แบบไปรษณีย์ลงทะเบียน เมื่อมียอด 300 บาทขึ้นไป (เฉพาะอัดรูปสี และสินค้าอื่นๆ ที่มีน้ำหนักเบา)
              </li>
              <li>
                จัดส่งแบบ Kerry Express <a href="{{url('kerry_express')}}">(รายละเอียดเพิ่มเติม)</a>
              </li>
              <li>
                ให้บริการจัดส่ง EMS ไปรษณีย์ไทย<a href="{{url('ems_thai')}}">(รายละเอียดเพิ่มเติม)</a>
              </li>
              <li>
                จัดส่งทางรถโดยสารที่วิ่งระหว่างจังหวัด รถบขส. รถตู้หรือรถไฟ อีกทางเลือกสำหรับลูกค้าที่อยู่ต่างจังหวัด สะดวก รวดเร็วและประหยัด
              </li>
              <li>
                จัดส่ง Delivery ถึงบ้านหรือที่ทำงาน เฉพาะกรุงเทพฯ ในเขตพื้นที่บริการ <a href="{{url('delivery')}}">(รายละเอียดเพิ่มเติม)</a>
              </li>
              <li>
                มารับด้วยตนเองที่สาขาของมาสเตอร์  <a href="{{url('contact_master')}}">(รายละเอียดเพิ่มเติม)</a>
              </li>
            </ol>

            <p class="text-success">
               สนใจติดต่อได้ที่เบอร์โทร 02-513-0105 Fax. 02-939-3080 ทุกวัน เวลา 8.00-22.00น.
            </p>

          </div>

          <div class="col-md-4">

            <br /><br /><br />
            <div class="box_style_cat">
						<ul id="cat_nav">
							<li><a href="{{url('kerry_express')}}" class=""><i class="icon-truck"></i>Kerry Express</a>
							</li>
							<li><a href="{{url('ems_thai')}}"><i class="icon-truck-1"></i>ไปรษณีย์ไทย EMS</a>
							</li>
							<li><a href="{{url('delivery')}}" ><i class="icon-home-4"></i>จัดส่งถึงบ้านหรือที่ทำงาน</a>
							</li>
							<li><a href="{{url('contact_master')}}"><i class="icon-male"></i>มารับด้วยตนเอง</a>
							</li>

						</ul>
					</div>

          </div>

				</div>

    </div>


    @else



    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">Delivery Option</span></h2>

    </div>

    <div class="row">




        <div class="col-md-10 col-md-offset-1 ">

          <div class="col-md-8">

            <h3> <span>Delivery Option</span></h3>
  					<p>
  						<strong>Customers can choose to receive up to 6 channels as follows:</strong>
  					</p>
            <ol>
              <li>
                Free shipping! Registered mail when having 300 baht or more (only for color printing And other products Lightweight)
              </li>
              <li>
                Kerry Express delivery <a href="{{url('kerry_express')}}">(More details)</a>
              </li>
              <li>
                Providing EMS postal service<a href="{{url('ems_thai')}}">(More details)</a>
              </li>
              <li>
              Delivered via buses that run between provinces, buses, vans or trains Another option for customers located in provinces, convenient, fast and economical.
              </li>
              <li>
                Delivery to your home or office Only Bangkok In the service area <a href="{{url('delivery')}}">(More details)</a>
              </li>
              <li>
                Come to pick up yourself at the Master's branch  <a href="{{url('contact_master')}}">(More details)</a>
              </li>
            </ol>

            <p class="text-success">
              Interested, please contact at 02-513-0105 Fax. 02-939-3080 every day at 8:00 am - 10:00 pm
            </p>

          </div>

          <div class="col-md-4">

            <br /><br /><br />
            <div class="box_style_cat">
						<ul id="cat_nav">
							<li><a href="{{url('kerry_express')}}" class=""><i class="icon-truck"></i>Kerry Express</a>
							</li>
							<li><a href="{{url('ems_thai')}}"><i class="icon-truck-1"></i>Thai post office EMS</a>
							</li>
							<li><a href="{{url('delivery')}}" ><i class="icon-home-4"></i>Delivery to home or office</a>
							</li>
							<li><a href="{{url('contact_master')}}"><i class="icon-male"></i>Come to pick up by yourself</a>
							</li>

						</ul>
					</div>

          </div>

				</div>

    </div>


    @endif









  </div>
  <!-- End container -->
</main>
<!-- End main -->

@endsection

@section('scripts')



@stop('scripts')

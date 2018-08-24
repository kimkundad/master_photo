@extends('layouts.template')

@section('title')
เกี่ยวกับเรา | MASTER PHOTO NETWORK
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

    <div class="row">



    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">ABOUT US </span></h2>

    </div>


      <div class="col-md-5 col-sm-6">
					<img src="{{url('assets/image/about/th_1134386378.jpg')}}" alt="Image" class="img-responsive styled">

				</div>


        <div class="col-md-7 col-sm-6">
					<h3><span>" มาสเตอร์ "</span> Master Photo Network</h3>
					<p class="p_16">
            เรามีประสบการณ์ด้านการอัดภาพมายาวนานกว่า <strong>40 ปี (ตั้งแต่ปี พ.ศ. 2510)</strong>
            โดยเราเป็นรายแรกในประเทศไทยที่ลงเครื่องอัดภาพระบบต่อเนื่อง สามารถอัดรูปเสร็จภายใน 45 นาที
            (ทดแทนการอัดภาพที่ต้องรอ 1-2 วัน) ซึ่งเป็นจุดกำเนิดของคำว่า <a>"รอรับได้ทันที"</a> ที่ใช้กันแพร่หลายในปัจจุบัน
					</p>

					<p class="p_16">
            เมื่อเทคโนโลยีเปลี่ยนแปลง <strong>"มาสเตอร์"</strong> ก็เป็นรายแรกที่บุกเบิกการอัดภาพระบบดิจิตอลอย่างเป็นระบบและครบวงจรที่สุด
            โดยการลงทุนเครื่องอัดภาพที่รองรับงานดิจิตอลตั้งแต่ปี พ.ศ. 2545 นอกจากนี้ <strong>"มาสเตอร์"</strong> ยังเป็นผู้สร้างมาตรฐานรูปแบบการอัดต่างๆ
            ในการสั่งอัดรูปดิจิตอลที่มีต้นกำเนิดมาจากบริเวณปากทางลาดพร้าว
					</p>

					<p class="p_16">
            "มาสเตอร์" เล็งเห็นถึงความสำคัญของการใช้อินเตอร์เน็ตและประโยชน์ที่ลูกค้าได้รับ เว็ปไซต์ <a href="{{url('/')}}" target="_blank"><b>www.MasterPhotoNetwork.com</b></a>
            จึงถูกก่อตั้งขี้นมาตั้งแต่ปี พ.ศ. 2548 และเปิดให้ลูกค้าสามารถอัพโหลดและสั่งอัดภาพผ่านทางหน้าเวปไซต์ในปี พ.ศ.2551 เป็นต้นมา
					</p>

          <p class="p_16">
            ปัจจุบันมีลูกค้าใช้บริการผ่านระบบออนไลน์ของเราจากทุกภาคทั่วประเทศ เรามีระบบการจัดส่งที่หลากหลายเพื่อความสะดวกสบายของลูกค้า
            และด้วยพนักงานที่จะคอยดูแลท่านพร้อมเครื่องอัดภาพที่ทันสมัยที่สุด เราสามารถรองรับงานได้ทุกรูปแบบ ลูกค้าจึงมั่นใจได้ว่างานที่ออกไปจากเราจะมีคุณภาพที่เป็นมาตราฐานและส่งตรงถึงมือลูกค้าอย่างแน่นอน
          </p>

          <div class="general_icons">
						<ul>
							<li><i class="icon_set_1_icon-34"></i>Camera</li>
							<li><i class="icon_set_1_icon-31"></i>Video camera</li>

							<li><i class="icon_set_1_icon-63"></i>Mobile</li>
              <li><i class="icon_set_1_icon-35"></i>Credit cards</li>
						</ul>
					</div>



				</div>

        <div class="col-md-12">
          <hr style="border-top: 2px solid #ddd;"/>

          <h4>Master Photo Network เวลาทำการ: 8:00 - 22:00</h4>
          <p>
            ผู้นำด้านการอัดรูปสี, Digital Offset Print (นามบัตร การ์ด โบร์ชัวร์ แผ่นพับ ใบปลิว ฯลฯ), กรอบ, อัลบั้ม, Photobook และ Photo Gift)
          </p>
        </div>

        <div class="col-md-3">
            <img src="{{url('assets/image/about/n1.JPG')}}" alt="Image" class="img-responsive styled">
        </div>
        <div class="col-md-3">
            <img src="{{url('assets/image/about/n2.JPG')}}" alt="Image" class="img-responsive styled">
        </div>
        <div class="col-md-3">
            <img src="{{url('assets/image/about/n3.JPG')}}" alt="Image" class="img-responsive styled">
        </div>

        <div class="col-md-3">
            <img src="{{url('assets/image/about/20106628_1548914058505765_7634972826482356699_n.jpg')}}" alt="Image" class="img-responsive styled">
        </div>





    </div>












  </div>
  <!-- End container -->
</main>
<!-- End main -->

@endsection

@section('scripts')



@stop('scripts')

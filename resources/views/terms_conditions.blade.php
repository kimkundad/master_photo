@extends('layouts.template')

@section('title')
kerry express | MASTER PHOTO NETWORK
@stop

@section('stylesheet')
<style>
#map {
  width: 100%;
  height: 450px;
}
.p_top{
      padding-top: 15px !important;
}
</style>
@stop('stylesheet')
@section('content')


<main class="white_bg slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">Terms of Service and Privacy Policy</span></h2>

    </div>


@if(trans('message.lang') == 'Thai')

<div class="row">



    <div class="col-md-10 col-md-offset-1 ">
      <h3><span>Terms of Service and Privacy Policy</span></h3>
      <p>
      เอกสารเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวนี้อธิบายข้อมูลที่บริษัทมาสเตอร์ โฟโต้ เน็ตเวิร์ค จำกัด (ต่อไปนี้จะเรียกว่า “บริษัท” “เรา” หรือ “ของเรา”) จะใช้ จะเก็บไว้ จะส่งต่อ หรือจะปกป้องไว้ซึ่งข้อมูลของผู้ใช้งานอย่างไร
      </p>
      <p>
        เอกสารเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวนี้มีผลเฉพาะต่อการใช้งานทางเวปไซด์และการให้บริการทางออนไลน์ของบริษัทเท่านั้น ทางบริษัทขอให้ผู้ใช้งานได้อ่านและทำความเข้าใจในเนื้อหาทั้งหมดของเอกสารเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวนี้ก่อนการใช้งานเวปไซด์หรือการบริการทางออนไลน์ เมื่อได้อ่านและทำความเข้าใจแล้ว หากมีส่วนหนึ่งส่วนใดที่ผู้ใช้งานไม่ยินยอม หรือ มีความเห็นต่างจากเงื่อนไขหรือรายละเอียดที่ได้ระบุไว้ ทางบริษัทขอแนะนำให้ผู้ใช้งานหยุดใช้เวปไซด์หรือบริการทางออนไลน์นี้
      </p>
      <h3>Terms of Services </h3>
      <h4>ลิขสิทธิ์และความเป็นเจ้าของซอฟแวร์ </h4>

      <p>
 ซอฟแวร์ ข้อมูล และเนื้อหาต่างๆที่ปรากฎในเวปไซด์ ได้รับการคุ้มครองตามกฎหมายลิขสิทธิ์และกฎหมายที่ใช้บังคับ ผู้ใช้งานจะไม่นำเนื้อหาทั้งหมดหรือส่วนหนึ่งส่วนใดไปทำการดัดแปลงหรือนำไปใช้โดยที่ไม่ได้รับความยินยอมจากทางบริษัทเป็นหนังสือลายลักษณ์อักษรเสียก่อน ทางบริษัทไม่รับประกันว่าเว็บไซด์และซอฟแวร์จะปลอดจากไวรัส ข้อผิดพลาด หรือภัยคุกคามเช่น ไวรัส เวิร์ม สปายแวร์ หรือโทรจันต่างๆ      </p>
      <h4>เกี่ยวกับอายุผู้ใช้งาน </h4>
      <p>
บริษัทไม่ได้กำหนดอายุผู้จะใช้งานเวปไซด์หรือการบริการทางออนไลน์ แต่เราแนะนำให้ผู้ใช้งานที่มีอายุต่ำกว่า18 ปีได้รับความยินยอมจากผู้ปกครองก่อนการใช้งาน โดยเฉพาะการให้ข้อมูลบัตรเครดิตเพื่อการสั่งงาน      </p>
      <h4>เนื้อหาของผู้ใช้งาน  </h4>
      <p>
        ผู้ใช้งานจะไม่ใช้บริการของเราเพื่อการกระทำอันไม่ชอบด้วยกฎหมาย ผู้ใช้งานจะไม่อัพโหลดข้อมูลต่อไปนี้ในการใช้บริการของเรา
      </p>
      <ol>
        <li>
          เนื้อหาหรือข้อมูลที่ละเมิดลิขสิทธิ์ หรือ ไม่ได้รับความยินยิมจากผู้ที่เป็นเจ้าของลิขสิทธิ์ในเนื้อหาหรือข้อมูลนั้นๆ
        </li>
        <li>
          เนื้อหาหรือข้อมูลที่ผิดกฎหมาย ลามกอนาจาร หมิ่นประมาท น่ารังเกียจ ข่มขู่ คุกคามหรือไม่เหมาะสมและเป็นอันตรายต่อเด็กในทางใดทางหนึ่งหรืออาจก่อให้เกิดความผิดทางแพ่งหรือทางอาญาใดๆ
        </li>
        <li>
          เนื้อหาหรือข้อมูลใดๆที่มีไวรัส เวิร์ม สปายแวร์ โทรจันหรือประเภทอื่นๆ ที่ทำให้ระบบเสียหาย
        </li>
        <li>
          เนื้อหาหรือข้อมูลใดๆที่เป็นที่น่ารังเกียจ หรือส่งเสริมการเหยียดสีผิว หรือความเกลียดชังต่อกลุ่มหรือบุคคลใดๆ
        </li>
      </ol>
      <p>
        ทางบริษัทขอสงานสิทธิในการลบทิ้งหรือทำลายข้อมูลอันได้กล่าวมาแล้วโดยไม่ต้องแจ้งหรืออธิบายให้ทราบล่วงหน้า และอาจดำเนินการส่งต่อข้อมูลดังกล่าวต่อหน่วยงานที่เกี่ยวข้องต่อไป
      </p>

      <h3>ค่าบริการและการชำระเงิน </h3>
      <p>
        ราคาที่ปรากฎทั้งหมดใช้สกุลเงินบาท และเป็นราคาที่รวมภาษีมูลค่าเพิ่มแล้ว ยกเว้นที่ได้มีการระบุไว้เป็นอย่างอื่น ราคาของการให้บริการหรือสินค้าต่างๆอาจมีการเปลี่ยนแปลงได้โดยไม่ต้องแจ้งให้ทราบล่วงหน้า
      </p>
      <p>
         ผู้ใช้งานตกลงและยินยอมที่จะชำระค่าบริการต่างๆที่เกิดขึ้นจากการสั่งงานของผู้ใช้งาน โดยผ่านทางบัตรเครดิต/บัตรเดบิต วีซ่า มาสเตอร์การ์ด ระบบเพย์พาวว์ หรือชำระผ่านช่องทางการโอนเงินผ่านธนาคารได้ ทางบริษัทได้ใช้ช่องทางการชำระเงินออนไลน์ของผู้ให้บริการรายอื่น ซึ่งได้รับการยอมรับและทางบริษัทได้ตรวจสอบแล้วว่ามีความปลอดภัยและมีความก้าวหน้าที่สุดในประเทศไทย อย่างไรก็ตามทางบริษัทไม่สามารถรับผิดชอบต่อความสูญเสีย หรือความเสียหายที่อาจเกิดขึ้นจากการใช้บริการดังกล่าวได้
      </p>
      <p>
บริษัทจะเริ่มขั้นตอนการทำงานหลังจากที่คำสั่งนั้นได้รับการชำระเงินเป็นที่เรียบร้อบแล้วเท่านั้น เราจะเก็บข้อมูลการสั่งงานที่ยังไม่ชำระเงินไว้เป็นเวลา15วันเท่านั้น หลังจากนั้นงานชิ้นนั้นจะถูกลบออกจากระบบ      </p>

      <h4>การรับประกันความพึงพอใจและนโยบายการคืนสินค้า </h4>
      <p>
        ทางบริษัทจะผลิตงานที่มีคุณภาพและตรงตามความคำสั่งของให้ลูกค้าให้มากที่สุด แต่การยกเลิกงานหรือเปลี่ยนแปลงคำสั่งไม่สามารถทำได้เมื่อการผลิตได้เริ่มต้นขึ้นแล้ว เรายินดีจะรับคืนหรือแก้ไขงานที่ผลิตออกมาไม่ได้มาตราฐาน หรือ เกิดความเสียหายอันเกิดขึ้นจากขั้นตอนการผลิต ทางบริษัทขอสงวนสิทธิ์ในการเปลี่ยนวัตถุดิบที่ใช้หรือขั้นตอนต่างๆในการผลิตแล้วแต่เห็นสมควร  เนื่องจากลูกค้าเป็นผู้ออกแบบงานต่างๆได้เองและสามารถดูรูปแบบได้ก่อนการสั่งงานจริง ดังนั้นทางบริษัทจะไม่รับผิดชอบต่อความผิดพลาดที่เกิดขึ้นจากผู้ใช้งานเองเช่น คำสะกดผิด การวางตำแหน่งผิด การเรียงรูปผิด ความละเอียดที่น้อยไปของรูปที่ใช้ หรือจำนวนของงานที่สั่งเข้ามาในระบบ
      </p>

      <h3>นโยบายความเป็นส่วนตัว. </h3>
      <h4> เมื่อเข้ามาใช้งานระบบของเรา บริษัทจะเก็บข้อมูลเกี่ยวกับผู้ใช้งานไว้ ซึ่งข้อมูลที่จะเก็บจะขึ้นอยู่กับบริการหรือสินค้าที่ผู้ใช้งานได้เลือกไว้ เช่น </h4>
      <p>
        ข้อมูลเกี่ยวกับผู้ใช้งานและบัญชีของผู้ใช้งาน เมื่อผู้ใช้งานอัพโหลดรูปภาพขึ้นในระบบ บริษัทจะเก็บข้อมูลดังนี้
      </p>


      <ul>
        <li>
          ชื่อและนามสกุล
        </li>
        <li>
          อีเมล์
        </li>
        <li>
          พาสเวิร์ด
        </li>
      </ul>
      <p>
ข้อมูลเหล่านี้มีความจำเป็นในการสร้างบัญชีผู้ใช้งานสำหรับจัดเก็บและดูแลการใช้งานต่างๆให้อยู่ในที่เดียว เราใช้ข้อมูลเหล่านี้ในการยืนยันตัวตนของผู้ใช้งานเพื่อให้เกิดความปลอดภัยต่อการเข้าใช้งาน ถ้าผู้ใช้งานมีการสั่งซื้อสินค้าหรือบริการทางบริษัทจะเก็บข้อมูลและทำการวิเคราะห์เพื่อเราจะได้ให้บริการผู้ใช้งานได้อย่างตรงความต้องการมากขึ้น      </p>

      <p>
        ข้อมูลการติดต่อ  บริษัทจะเก็บข้อมูลดังนี้:
      </p>
      <ul>
        <li>
          ที่อยู่จัดส่ง
        </li>
        <li>
          อีเมล์
        </li>
        <li>
          เบอร์โทรศัพท์
        </li>

      </ul>
      <p>
      เราใช้ข้อมูลเหล่านี้ในการยืนยันและติดต่อผู้ใช้งานกรณีมีคำถามหรือข้อสงสัยต่างๆ เราเก็บที่อยู่จัดส่งของผู้ใช้ง่ายไว้เพื่อความสะดวกของผู้ใช้งานในการที่ไม่ต้องกรอกข้อมูลเหล่านี้อีกรอบเมื่อมีการสั่งสินค้าหรือบริการอีก
      </p>
      <br />
      <p>
        ข้อมูลจากสื่อสังคมออนไลน์ : ถ้าผู้ใช้งานอัพโหลดรูปภาพผ่านสื่อสังคมออนไลน์ ทางบริษัทจะเก็บข้อมูลดังนี้
      </p>
      <ul>
        <li>
          ข้อมูลที่เปิดเผยสาธารณะ ซึ่งอาจรวมถึง:
        </li>
        <li>
          ชื่อและนามสกุล
        </li>
        <li>
          อีเมล์
        </li>
        <li>
          เพศ
        </li>
        <li>
          อายุ
        </li>
        <li>
          ตำแหน่ง
        </li>
        <li>
          ข้อมูลอื่นๆที่ผู้ใช้งานยินยอมให้เปิดเผยเป็นสาธารณะ
        </li>
        <li>
          รูปภาพจากบัญชีสื่อสังคมออนไลน์ที่ผู้ใช้งานอัพโหลดเข้ามาในระบบของเรา
        </li>
      </ul>
      <p>
        ข้อมูลเหล่านี้มีความจำเป็นต่อการยืนยันตัวตนต่อบัญชีสื่อสังคมออนไลน์ของผู้ใช้งานเพื่ออัพโหลดรูปภาพเข้าสู่ระบบของเรา เราเก็บข้อมูลเหล่านี้รวมถึงข้อมูลอื่นๆที่ผู้ใช้งานมีปฎิสัมพันธ์กับเราผ่านสื่อออนไลน์เช่น เมื่อผู้ใช้งานกดชอบในหน้าเฟซบุ๊คของเรา ข้อมูลต่างๆที่เราได้รับจะขึ้นอยู่กับการตั้งค่าความเป็นส่วนตัวของผู้ใช้งานเอง โปรดตรวจสอบและปรับการตั้งค่าต่างๆเหล่านี้ในสื่อสังคมออนไลน์ของผู้ใช้งาน</p>
      <br />
      <p>
        รูปของผู้ใช้งาน :  เมื่อผู้ใช้งานตัดสินใจอัพโหลดรูปภาพเขามาในระบบของเรา ไม่ว่าจะเข้าสู่บัญชีผู้ใช้งานที่มีอยู่กับทางบริษัทหรือไม่ เราจะเก็บข้อมูลดังนี้

      </p>
      <ul>
        <li>
          รูปภาพที่ผู้ใช้งานอัพโหลด
        </li>
      </ul>

      <h4>การป้องกันข้อมูลของผู้ใช้งาน </h4>
      <p>
        ทางบริษัทได้ใช้และติดตั้งระบบความปลอดภัยที่มีมาตราฐาน และพยายามเป็นยิ่งเพื่อป้องกันการเข้าถึงข้อมูลจากบุคคลภายนอกโดยใช้เทคโนโลยีที่มีอยู่ในปัจจุบัน อย่างไรก็ดีในทางปฎิบัติเราไม่สามารถรับประกันได้100% หากผู้ใช้งานมีข้อสงสัยเกี่ยวกับมาตราฐานความปลอดภัยของข้อมูลและการปฎิบัติของเรา
        ผู้ใช้งานสามารถติดต่อเราได้ตามที่อยู่ข้างล่าง อย่างไรก็ดีผู้ใช้งานจำเป็นที่จะต้องรักษาข้อมูลความเป็นส่วนตัวของตัวเองไว้ด้วยและแจ้งทางบริษัททันทีถ้าสงสัยว่ามีการเข้าถึงข้อมูลส่วนตัวของผู้ใช้งานจากบุคคลอื่น</p>
      <p>
 ถ้าผู้ใช้งานใช้คอมพิวเตอร์จากสถานที่สารธารณะเช่น ห้องสมุด, โรงเรียน หรือ คอมพิวเตอร์ที่ใช้ง่านร่วมกันเช่นที่บ้านหรือของเพื่อน เราแนะนำให้ผู้ใช้งานออกจากระบบทุกครั้งเมื่อใช้งานเสร็จและปิดบราวเซอร์ทุกครั้งก่อนลุกออกจากที่นั่งเพื่อป้องกันการเข้าถึงข้อมูลจากบุคคลอื่น      </p>
      <h4>การเก็บไว้ซึ่งข้อมูล </h4>
      <p>
        ทางบริษัทจะเก็บข้อมูลของผู้ใช้งานไว้นานเท่าที่ผู้ใช้งานยังคงใช้บริการของเราอยู่ ในส่วนของรูปภาพที่ผู้ใช้งานได้อัพโหลดเข้ามาในระบบ หรือ งานที่ผู้ใช้งานได้สร้างขึ้นมา ไม่ว่าจะได้ทำการเข้าสู่ระบบบัญชีของทางบริษัทหรือไม่  รวมถึงงานที่มีการสั่งทำแล้ว เราจะจัดเก็บเป็นระยะเวลาดังต่อไปนี้
งานที่สร้างโดยไม่ได้เข้าสู้ระบบบัญชีของบริษัท : ลบหลังจาก 3 วัน <br />
งานที่สร้างในระบบแต่ไม่ได้บันทึก : ลบหลักจาก 14 วัน โดยจะมีอีเมล์แจ้ง7 วันก่อนจะทำการลบ<br />
งานที่สร้างในระบบแต่ไม่ได้สั่งซื้อ : ลบหลักจาก 60 วัน โดยจะมีอีเมล์แจ้ง7 วันก่อนจะทำการลบ<br />
งานที่สร้างในระบบและได้มีการสั่งซื้อ : ลบหลักจาก 90 วัน โดยจะมีอีเมล์แจ้ง7 วันก่อนจะทำการลบ
      </p>

      <h4>การแจ้งการเปลี่ยนแปลงของเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัว </h4>
      <p>
        เรามีการปรับเปลี่ยน แก้ไข เพิ่มเติม เงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวตามข้อกฎหมายหรือเมื่อมีสินค้าและบริการใหม่ๆที่เราได้มีการนำเสนอ เราแนะนำให้ผู้ใช้งานเข้ามาอ่านเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวนี้ก่อนการใช้งานทุกครั้ง
        หากมีการเปลี่ยนแปลงทางบริษัทจะมีการประกาศและแจ้งให้ทราบในหน้าเวปของเรา หากผู้ใช้งานไม่เห็นด้วยในเนื้อหาการเปลี่ยนแปลงในเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวของบริษัท เราแนะนำให้ผู้ใช้งานหยุดใช้ระบบและบริการของเรา
      </p>
      <h4>ติดต่อเรา </h4>
      <p>
      หากผู้ใช้งานมีข้อสงสัยหรือคำถามเกี่ยวกับเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัว สามารถติดต่อเราได้ที่<br />
        บริษัท มาสเตอร์ โฟโต้ เน็ตเวิร์ค จำกัด.<br />
        206/1 ถนนพหลโยธิน แขวงลาดยาว<br />
        เขตจตุจักร กรุงเทพมหานคร ประเทศไทย 10900<br />
        โทร: +(66) 02-513 0105
      </p>
      <hr />
    </div>


</div>

@else

<div class="row">



    <div class="col-md-10 col-md-offset-1 ">
      <h3><span>Terms of Service and Privacy Policy</span></h3>
      <p>
      This Terms of Service and Privacy Policy explains what information Master Photo Network Co.,Ltd.
      (“Master,” “we,” “us,” or “our”) provides, collects, uses, shares, retains, and protects. These terms and policies apply only to the websites and online services.
      </p>
      <p>
        WE ENCOURAGE YOU TO READ THIS terms of service and privacy policy IN FULL TO UNDERSTAND OUR PRIVACY PRACTICES AND
        SERVICES PROVIDED BEFORE USING OUR WEBSITE, PRODUCTS, AND SERVICES. BY USING OUR WEBSITE, PRODUCTS, AND SERVICES, YOU ACKNOWLEDGE
        YOU HAVE READ AND UNDERSTOOD THE PRACTICES DESCRIBED IN THIS TERMS OF SERVICE AND PRIVACY POLICY. IF IN ANY PARTS, YOU DISAGREED OR DO
        NOT COMPLY WITH THE TERMS OR POLICIES STATED, WE WOULD SUGGEST YOU TO STOP USING OUR WEBSITES, PRODUCTS AND SERVICES.
      </p>
      <h3>Terms of Services </h3>
      <h4>License and software asset ownership. </h4>

      <p>
      Software, data and content provided by Master are protected by copyright and other applicable laws and relevant. You agree that you will not distribute or copy any components of our website or any materials displayed on our website without the written permission. By using our website and software, you understand that we do not guarantee that the website and the software is free of errors or viruses from threats such as viruses, worms, Trojans and/or spyware files.
      </p>
      <h4>About the age of the users. </h4>
      <p>
        We have no minimum age requirements to access and use our website or services. However, we recommend that children under the age of 18 years should get consent from parents to use our services. And for the use of credit card information when ordering.
      </p>
      <h4>About Your Content  </h4>
      <p>
        You will not use any part of our services for the purpose of fraud and/or any illegal activities. You will not upload any materials listed below into our system.
      </p>
      <ol>
        <li>
          any materials that may violate privacy rights or rights without the approval and consent of the owner of those rights.
        </li>
        <li>
          any materials that are unlawful, obscene, pornographic, abusive, offensive, threatening, harassing or offensive and harmful to children in any way, or is likely to cause civil liability or criminal liability under any applicable law.
        </li>
        <li>
          any materials that contain viruses, worms, spyware, trojans or other types of file system corruption.
        </li>
        <li>
          any materials that are offensive or promote racism or hatred against any group or individual.
We reserved the right to remove or delete any of such materials without prior notice. We may also have to report any activities that we see inappropriate to the law enforcement.
        </li>
      </ol>

      <h3>Fee and payment terms. </h3>
      <p>
         All prices are in local currency, Thai Baht. Prices of our products and services are inclusive of VAT unless otherwise stated. Prices of products and services offered are subject to change without notice.
      </p>
      <p>
         You agree to pay all fees and expenses incurred in connection with your order. Payment can be made via credit / debit card online through Visa, MasterCard, Paypal or by bank transfer.
         We use third-party payment gateway system which we believed to be most secured and highly advanced in the Thailand. However, we are not responsible for any damage which you may suffer as a result of its use.
      </p>
      <p>
        We will proceed with the order only when the payment of the order has been made or the money has been successfully transfer. We will hold any unpaid orders for 15 days before we regard these orders to be failed and delete them.
      </p>

      <h4>Satisfaction guarantee and return policy. </h4>
      <p>
        We will do our best to produce high quality products for our customers. But we will not refund or accept any cancellation of orders once the production has been started. However we will make refund on products that do not meet our standards or damaged during our production process. We also reserve the right to change or modify any manufacturing methods or the raw materials used. Since customers can design and preview the result of the project created, any mistakes or errors made by customers including spelling, positioning of photos, mis-layer of photos, poor resolutions of images used and wrong quantity placed on order, we will not be responsible and cannot make refund for such circumstances.
      </p>

      <h3>Privacy Policy. </h3>
      <h4>What kind of information do WE collect and Why? </h4>
      <p>
        When you use our products and services, we collect certain information about you and your online habits. The type of information we collect depends on the type of products and services you use. For example:
      </p>

      <p>
        Information about you and your account: When you want to upload photos on our services, you may provide us with:
      </p>
      <ul>
        <li>
          Your first and last name
        </li>
        <li>
          Your email address
        </li>
        <li>
          A password
        </li>
      </ul>
      <p>
        This information is mandatory to create and use your account so that you can maintain all of your photos and other activities in one place. We use your information to help verify your identity, account, and account activities to ensure the safety and security of your transactions.
      </p>
      <p>
         If you choose to purchase our products and/or use our services, we will collect and analyze your information and information about your use of our products and services to develop and improve our products and services. We use the data we have about you to provide and personalize, including with the help of automated systems, our Services, so that they can be more relevant and useful to you.
      </p>
      <br />
      <p>
        Your Contact Information:  we may collect:
      </p>
      <ul>
        <li>
          Your shipping address
        </li>
        <li>
          Your e-mail
        </li>
        <li>
          Your phone number
        </li>

      </ul>
      <p>
        We use this information to verify your identity and respond to your questions or concerns. We also store your shipping address on our system so you do not need to fill in the form every time you place an order with us.
      </p>
      <br />
      <p>
        Your Social Media Information: If you choose to upload photos using your social media account, we will collect:
      </p>
      <ul>
        <li>
          Your social media public profile information, including, but not limited to:
        </li>
        <li>
          Your first and last name
        </li>
        <li>
          Your email
        </li>
        <li>
          Gender
        </li>
        <li>
          Age
        </li>
        <li>
          Location
        </li>
        <li>
          Other information you have voluntarily shared on your social media public profile
        </li>
        <li>
          Your social media photos you choose to transfer to your account
        </li>
      </ul>
      <p>
        This information is mandatory to verify your social media account and upload your photos from your social media pages directly to your account with us.
    We may also collect this and additional information about you and your social media account and activities when you interact with us through various social media, for example, by liking us on Facebook. The information we receive from your social network depends on your privacy settings. Please review, and, if you prefer, adjust your privacy settings on third-party social media websites before linking or connecting them to your account.
      </p>
      <br />
      <p>
        Your Photos: When you decide to upload photos to the our services and/or create projects, whether signed in to an account or not, we will collect:
      </p>
      <ul>
        <li>
          Photos that you upload
        </li>
      </ul>

      <h4>How Do WE Protect Your Information? </h4>
      <p>
        We use reasonable and appropriate physical, technical, and administrative industry safeguards to protect information from unauthorized access, use, loss, misuse or unauthorized alteration. We will make reasonable efforts to protect personal information stored on our servers from unauthorized access using commercially available computer security products (for example, firewalls), as well as carefully developed security procedures and practices. Notwithstanding our security safeguards, it is impossible to guarantee 100% security in all circumstances. If you have any questions about our security practices, you can contact us at the address listed below. Also, it is important that you protect and maintain the security of your account credentials and notify us immediately of any unauthorized use of your account.
      </p>
      <p>
        If you are using a public computer (public library, school computer, etc.) or a shared computer (family computer, roommate’s computer, etc.), we strongly recommend that you sign out of your account and close your browser before getting up and moving away from the computer. This will prevent others from accessing your account and information.
      </p>
      <h4>What is MASTER's data retention practices? </h4>
      <p>
        We store your information as long as it is necessary to provide our products and services and fulfill the transactions you requested. Typically, we keep your information as long as you maintain Active Participation in the Services. However, photos you have uploaded, projects you have created while signed in to an account and projects you have purchased while signed in to an account will remain on our servers for a period of time as follow:<br />
        Guest projects : 3 days to deletion<br />
        Unsaved projects : 14 days with 7 days email notice prior to deletion<br />
        Unordered projects : 60 days with 7 days email notice prior to deletion<br />
        Ordered projects : 90 days with 7 days email notice prior to deletion
      </p>

      <h4>How will WE Notify You of Changes to this Terms of Service and Privacy Policy? </h4>
      <p>
        We periodically update this Terms of Service and Privacy Policy for changed legal and operational circumstances and to describe new features, products, or services, and how those changes affect our use of your information. We encourage you to review this Terms of Service and Privacy Policy each time you visit the services. If we are to make any changes in our Terms of Service and Privacy Policy, we will notify you. We will post those changes through a prominent notice on our services. If you do not agree to the changes made to this, we recommend that you stop using our services.
      </p>
      <h4>How can you contact MASTER? </h4>
      <p>
        If you have any questions or concerns about our Terms of Service and Privacy Policy, please contact us at :<br />
        Master Photo Network Co.,Ltd.<br />
        206/1 Phaholyothin Rd Ladyao<br />
        Chatujak Bangkok, Thailand 10900<br />
        +(66) 02-513 0105
      </p>
      <hr />
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

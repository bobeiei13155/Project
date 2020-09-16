<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>STMINI</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/eef6ce42e7.js" crossorigin="anonymous"></script>
<link href="{{asset('/css/sidebar.css')}}" rel="stylesheet">

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left  bg-sidebar-green" style="display:none" id="leftMenu">

  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large btn-secondary" style="color:white">Close &times;</button>
  <button class="dropdown-btn">ข้อมูลพนักงาน
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container dropdown-btn ">
    <a href="/Stminishow/showEmployee">ข้อมูลพนักงาน</a>
    <br>
    <a href="/Stminishow/createPosition">ข้อมูลตำแหน่ง</a>
  </div>
  <button class="dropdown-btn">ข้อมูลสินค้า
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container dropdown-btn">
    <a href="/Stminishow/ShowProduct">ข้อมูลสินค้า</a>
    <br>
    <a href="/Stminishow/createCategory">ข้อมูลประเภทสินค้า</a>
    <br>
    <a href="/Stminishow/createBrand">ข้อมูลยี่ห้อ</a>
    <br>
    <a href="/Stminishow/createPattern">ข้อมูลลาย</a>
    <br>
    <a href="/Stminishow/createColor">ข้อมูลสี</a>
    <br>
    <a href="/Stminishow/createCarmodel">ข้อมูลรุ่นรถ</a>
    <br>
    <a href="/Stminishow/createGen">ข้อมูลGen</a>
  </div>
  <button class="dropdown-btn">ข้อมูลบริษัทคู่ค้า
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container dropdown-btn">
    <a href="/Stminishow/showPartner">ข้อมูลบริษัทคู่ค้า</a>

  </div>
  <button class="dropdown-btn">ข้อมูลลูกค้า
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container dropdown-btn">
    <a href="#">ข้อมูลลูกค้า</a>
    <br>
    <a href="#">ข้อมูลประเภทลูกค้า</a>
  </div>
  <button class="dropdown-btn">โปรโมชั่น
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container dropdown-btn">
    <a href="#">โปรโมชั่นของแถม</a>
    <br>
    <a href="#">โปรโมชั่นยอดชำระ</a>

  </div>
  <button class="dropdown-btn">ของแถม
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container dropdown-btn">
    <a href="/Stminishow/ShowPremiumPro">ข้อมูลของแถม</a>

  </div>
  <button class="dropdown-btn">สั่งซื้อสินค้า
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container dropdown-btn">
    <a href="#">เสนอสั่งซื้อสินค้า</a>
    <br>
    <a href="#">อนุมัติสั่งซื้อสินค้า</a>
    <br>
    <a href="#">สั่งซื้อสินค้า</a>
  </div>
  <button class="dropdown-btn">รับสินค้า
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container dropdown-btn">
    <a href="#">รับสินค้า</a>

  </div>
  <button class="dropdown-btn">ขายสินค้า
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container dropdown-btn">
    <a href="#">การขาย</a>
    <br>
    <a href="#">ประวัติการขาย</a>
  </div>
  <button class="dropdown-btn">เคลมสินค้า
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container dropdown-btn">
    <a href="#">เคลมสินค้า</a>

  </div>
  <button class="dropdown-btn">ออกรายงาน
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container dropdown-btn">
    <a href="#">ปริมาณยอดขายประจำปี</a>
    <br>
    <a href="#">รายได้และกำไรตามช่วง</a>
    <br>
    <a href="#">จำนวนสินค้าที่ขายได้</a>
    <br>
    <a href="#">ยอดการใช้โปรโมชั่น</a>
    <br>
    <a href="#">การเคลมสินค้าแต่ละประเภท</a>
  </div>
</div>




<div class=" bg-navbar-green">
<button class="w3-button w3-xlarge w3-left btn-green" onclick="openLeftMenu()">&#9776;</button>
<img src="https://www.img.in.th/images/05d33c376067f5b6a6332816da091819.png" width="100px" height="80px"></img>

</div>
</div>

<div class="w3-container">
  @yield('body')
</div>

<script>
  function openLeftMenu() {
    document.getElementById("leftMenu").style.display = "block";
  }

  function closeLeftMenu() {
    document.getElementById("leftMenu").style.display = "none";
  }

  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
</script>



</html>
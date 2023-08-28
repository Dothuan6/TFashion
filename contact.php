<?php
  include_once("./includes/connect.php");
  include_once('./functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TFashion</title>
    <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">
    
    <!-- font aware cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous"
     referrerpolicy="no-referrer" />

     <!-- css style link -->
     <link rel="stylesheet" href="/style.css">
     <link rel="stylesheet" href="./startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css">
     <link rel="stylesheet" href="./style.css">

  <style>
    body{
    background-color: white;
}
  .dark_mode{
    background-color: black !important;
    color: white !important;
}
  .logo{
    width: 6%;  
    height:7%;
    border-radius: 20px;
}
.carousel-inner{
  height: 700px !important;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}.sticky + .content {
  padding-top: 60px;
}
  </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary-subtle navbar-sticky" id="navbar">
      
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="homepage.php">
    <i class="fa-solid fa-house"></i>
        <span>Trang Chủ</span></a>
</li>
      </ul>
    </div>
  </div>
</nav>
<!-- content -->
<div class="container-fluid"  style="height: 500px;">
<div class="row mt-5 pb-5 justify-content-center align-items-center bg-light" style="height: 500px;">
    <div class="col-lg-3 col-md">
        <h4 class="text-dark">Địa chỉ</h4>
        <p>Đường 30/4, Phường Hưng Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ.</p>
    </div>
    <div class="col-lg-3 col-md">
        <h4 class="text-dark">Gọi điện</h4>
        <p>Hãy gọi cho chúng tôi để nhận được phục vụ tốt nhất.</p>
        <a class="text-decoration-none" href="#">0776562237</a>
    </div>
    <div class="col-lg-3 col-md">
        <h4 class="text-dark">Email</h4>
        <p>Gửi email cho chúng tôi để nhận được chi tiết về dịch vụ.</p>
    </div>
</div>
</div>
<div class="container bg-secondary-subtle align-items-center" style="height: 700px; margin-top: 50px; margin-bottom: 20px;">
<header class="mb-5" style="margin-top: 20px;">
<h2 class="text-uppercase h5">Gửi Phản Hồi</h2>
</header>
<div class="row">
<div class="col-md-7 mb-5 mb-md-0">
<form id="contact-form" method="post" action="https://t004.gokisoft.com/feedback" class="form">
<input type="hidden" name="_token" value="zI58qJqH6CBUeUUQpZU1Hm9bvtR7oQxN3jF6dovz">
<div class="controls">
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="firstname" class="form-label">Tên *</label>
<input type="text" name="firstname" id="firstname" placeholder="Nhập tên" required="required" class="form-control">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="lastname" class="form-label">Họ *</label>
<input type="text" name="lastname" id="lastname" placeholder="Nhập họ" required="required" class="form-control">
</div>
</div>
</div>
<div class="form-group">
<label for="email" class="form-label">Địa Chỉ Email *</label>
<input type="email" name="email" id="email" placeholder="Nhập địa chỉ email" required="required" class="form-control">
</div>
<div class="form-group">
<label for="phone_number" class="form-label">Số Điện Thoại *</label>
<input type="telno" name="phone_number" id="phone_number" placeholder="Nhập số điện thoại" required="required" class="form-control">
</div>
<div class="form-group">
<label for="subject" class="form-label">Tiêu Đề *</label>
<input type="text" name="subject" id="subject" placeholder="Nhập tiêu đề" required="required" class="form-control">
</div>
<div class="form-group">
<label for="message" class="form-label">Nội Dung Tin Nhắn *</label>
<textarea rows="4" name="message" id="message" placeholder="Nhập nội dung" required="required" class="form-control"></textarea>
</div>

<button type="submit" class="btn btn-outline-dark">Gửi</button>
</div>
</form>
</div>
<div class="col-md-5">
<font color="#212529" face="Roboto, Helvetica, Arial, sans-serif"><span style="font-size: 18px; letter-spacing: 1.8px; text-transform: uppercase;"><b>Liên hệ công ty cổ phần TFashion</b></span></font>&nbsp;<br><br><b>Trụ sở chính :&nbsp;</b>Hẻm 391, Đường 30/4 Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam<div><b>Số điện thoại </b>: 077.656.2237</div><div><br>
<div>Chúng tôi luôn tiên phong trong lĩnh vực buôn bán các mặt hàng thời trang phù hợp với giới trẻ hiện nay.</div></div><div><br>
</div><div>TFashion - 24/7 luôn sẵn sàng phục vụ quý khách.</div>
</div>
</div>
</div>
<!-- js link bstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
    <?php
    include_once('./includes/footer.php'); 
    ?>
<!-- script -->
<script>
    function dark_mode(){
      var element = document.body;
      element.classList.toggle("dark_mode");
    }
</script>
    <script src="startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/js/custom.js">
    </script>
        <script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</body>
</html> 
<?php
  include_once("./includes/connect.php");
  include_once('./functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- font aware cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css style link -->
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet"
        href="./startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="./style.css">
    <script src="startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js">
    </script>
    <!-- hover mouse -->
    <script>
    $(document).ready(function() {
        $('#contactHelp').mouseover(function() {
            $('#divHelp').fadeIn(100);
        }).mouseout(function() {
            $('#divHelp').fadeOut(100);
        });
    });
    $(document).ready(function() {
        $('#contactHelp2').mouseover(function() {
            $('#divHelp2').fadeIn(100);
        }).mouseout(function() {
            $('#divHelp2').fadeOut(100);
        });
    });
    $(document).ready(function() {
        $('#contactHelp3').mouseover(function() {
            $('#divHelp3').fadeIn(100);
        }).mouseout(function() {
            $('#divHelp3').fadeOut(100);
        });
    });
    $(document).ready(function() {
        $('#contactHelp0').mouseover(function() {
            $('#divHelp0').fadeIn(100);
        }).mouseout(function() {
            $('#divHelp0').fadeOut(100);
        });
    });
    </script>
    <style>
    body {
        background-color: white;
    }

    .dark_mode {
        background-color: black !important;
        color: white !important;
    }

    .logo {
        width: 6%;
        height: 7%;
        border-radius: 20px;
    }

    .carousel-inner {
        height: 100% !important;
    }

    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
    }

    .sticky+.content {
        padding-top: 60px;
    }

    body {
        box-sizing: border-box;
    }

    /* Nút Để Mở Chatbox */
    .nut-mo-chatbox {
        background-color: green;
        color: white;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 6%;
        height: 6%;
    }

    /* Ẩn chatbox mặc định */
    .Chatbox {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Thêm style cho form */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /* thiết lập style textarea */
    .form-container textarea {
        width: 100%;
        padding: 5px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        resize: none;
        min-height: 100px;
    }

    /*thiết lập style cho textarea khi được focus */
    .form-container textarea:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Sthiết lập style cho nút trong form*/
    .form-container .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Thiết lập màu nền cho nút đóng chatbox */
    .form-container .nut-dong-chatbox {
        background-color: orange !important;

    }

    /* Thêm hiệu ứng hover cho nút*/
    .form-container .btn:hover,
    .nut-mo-chatbox:hover {
        opacity: 1;
    }

    .nut-mo-chatbox {
        border-radius: 100% !important;
    }

    .btn {
        transition: transform 0.3s ease-in-out !important;
        transition-timing-function: ease !important;
        transition-delay: 0s !important;
    }

    .btn:hover {
        transform: translateY(-10px);
    }

    .nav-link {
        transition: transform 0.3s ease-in-out !important;
        transition-timing-function: ease !important;
        transition-delay: 0s !important;
    }

    .nav-link:hover {
        transform: translateY(-10px);
    }

    .marquee {
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        box-sizing: border-box;
        animation: marquee 10s linear infinite;
    }

    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    #navbar {
        background-color: black !important;
    }

    #navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary-subtle navbar-sticky" id="navbar">

        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active ">
                        <a class="nav-link text-light" href="homepage.php">
                            <i class="fa-solid fa-house"></i>
                            <span>Trang Chủ</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- content -->
    <div class="container-fluid" style="height: 500px;">
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
    <div class="container bg-secondary-subtle align-items-center"
        style="height: 700px; margin-top: 50px; margin-bottom: 20px;">
        <header class="mb-5" style="margin-top: 20px;">
            <h2 class="text-uppercase h5">Gửi Phản Hồi</h2>
        </header>
        <div class="row">
            <div class="col-md-7 mb-5 mb-md-0">
                <form id="contact-form" method="post" action="contact.php">
                    <input type="hidden" name="_token" value="zI58qJqH6CBUeUUQpZU1Hm9bvtR7oQxN3jF6dovz">
                    <div class="controls">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname" class="form-label">Tên *</label>
                                    <input type="text" name="firstname" id="firstname" placeholder="Nhập tên"
                                        required="required" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname" class="form-label">Họ *</label>
                                    <input type="text" name="lastname" id="lastname" placeholder="Nhập họ"
                                        required="required" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Địa Chỉ Email *</label>
                            <input type="email" name="email" id="email" placeholder="Nhập địa chỉ email"
                                required="required" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="form-label">Số Điện Thoại *</label>
                            <input type="telno" name="phone_number" id="phone_number" placeholder="Nhập số điện thoại"
                                required="required" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="form-label">Tiêu Đề *</label>
                            <input type="text" name="subject" id="subject" placeholder="Nhập tiêu đề"
                                required="required" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message" class="form-label">Nội Dung Tin Nhắn *</label>
                            <textarea rows="4" name="message" id="message" placeholder="Nhập nội dung"
                                required="required" class="form-control"></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-outline-dark">Gửi</button>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <font color="#212529" face="Roboto, Helvetica, Arial, sans-serif"><span
                        style="font-size: 18px; letter-spacing: 1.8px; text-transform: uppercase;"><b>Liên hệ Shop
                            TFashion</b></span></font>&nbsp;<br><br><b>Trụ sở chính :&nbsp;</b>Hẻm 391, Đường 30/4
                Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam<div><b>Số điện thoại </b>: 077.656.2237</div>
                <div><br>
                    <div>Chúng tôi luôn tiên phong trong lĩnh vực buôn bán các mặt hàng thời trang phù hợp với giới trẻ
                        hiện nay.</div>
                </div>
                <div><br>
                </div>
                <div>TFashion - 24/7 luôn sẵn sàng phục vụ quý khách.</div>
                <div class="mt-4"><i id="contactHelp0" class="fa-solid fa-circle-question"></i> Bạn có một vài câu hỏi?
                    <div id="divHelp0" class="px-2 text-primary" style="display: none;">
                        Chúng tôi sẽ giải đáp thắc mắc của bạn!
                    </div>
                    <div class="ps-2 fs-6">
                        Tôi có thể liên hệ trực tiếp với bạn không <i class="fa-solid fa-circle-question"
                            id="contactHelp"></i>
                    </div>
                    <div class="px-2 text-primary" id="divHelp" style="display:none;">
                        Có, bạn có thể liên hệ với tôi thông qua số: 0776562237
                    </div>
                    <div class="px-2">
                        Tôi có được hoàn lại tiền nếu sản phẩm bị lỗi không <i class="fa-solid fa-circle-question"
                            id="contactHelp2"></i>
                    </div>
                    <div class="px-2 text-primary" style="display: none;" id="divHelp2">
                        Có, bạn sẽ nhận được hoàn tiền nếu sản phẩm bị lỗi!
                    </div>
                    <div class="px-2">
                        Tôi có được hoàn lại tiền nếu sản phẩm bị lỗi không <i class="fa-solid fa-circle-question"
                            id="contactHelp3"></i>
                    </div>
                    <div class="px-2 text-primary" style="display: none;" id="divHelp3">
                        Có, bạn sẽ nhận được hoàn tiền nếu sản phẩm bị lỗi!
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- chat bot -->
    <button class="nut-mo-chatbox btn btn-outline btn-success" onclick="moForm()"><i
            class="fa-solid fa-comments"></i></button>
    <div class="Chatbox" id="myForm">
        <form action="" class="form-container">
            <h3><i class="fa-solid fa-headphones"></i> Tfashion</h3>
            <hr>

            <label for="msg"><b>Lời Nhắn</b></label>
            <textarea placeholder="Bạn hãy nhập lời nhắn.." name="msg" required></textarea>

            <button type="submit" class="btn"><i class="fa-solid fa-paper-plane"></i></button>
            <button type="button" class="btn nut-dong-chatbox" onclick="dongForm()"><i
                    class="fa-solid fa-circle-chevron-left"></i></button>
        </form>
    </div>

    <!-- js link bstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <?php
    include_once('./includes/footer.php'); 
    ?>

    <!-- script -->
    <script>
    function dark_mode() {
        var element = document.body;
        element.classList.toggle("dark_mode");
    }
    </script>
    <script src="startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/js/custom.js">
    </script>
    <script>
    window.onscroll = function() {
        myFunction()
    };

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

    <!-- js chat bot -->
    <script>
    /*Hàm Mở Form*/
    function moForm() {
        document.getElementById("myForm").style.display = "block";
    }
    /*Hàm Đóng Form*/
    function dongForm() {
        document.getElementById("myForm").style.display = "none";
    }
    </script>

</body>

</html>
<?php

ini_set("SMTP","smtp.gmail.com");
ini_set("smtp_port","587");
// ini_set('sendmail_from', "thuann6222@gmail.com");
// error_reporting( E_ALL );
$f_email = $_POST['email'];
$from = $f_email ;
$t_email= "thuann6222@gmail.com";
$to = $t_email;
$subject_fr = $_POST['subject'];
$subject = $subject_fr;
$message_fr  = $_POST['message'];
$message = $message_fr;
$headers = "From:" . $from;
$mail = mail($to,$subject,$message, $headers);
if($mail){
    echo "<script>alert('Tin nhắn đã được gửi!!')</script>";
}
 ?>
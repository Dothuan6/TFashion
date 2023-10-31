<?php
  include_once("./includes/connect.php");
  include_once('./functions/common_function.php');
  @session_start();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme=dark>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TFashion</title>
    <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- font aware cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css style link -->
    <!-- <link rel="stylesheet" href="/style.css"> -->
    <link rel="stylesheet"
        href="./startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="./style.scss">
    <style>
    body {
        background-color: whitesmoke;
    }


    .logo {

        width: 6%;
        height: 7%;
        border-radius: 20px;
    }


    .chat_bot {
        text-align: center;
        border-radius: 100%;

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

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        height: 40px;
        width: 40px;
        outline: black;
        border-radius: 100%;
        background-image: none;
    }

    .carousel-control-next-icon:after {
        font-size: 20px;
        color: black;
        align-items: center !important;
    }

    .carousel-control-prev-icon:after {
        font-size: 20px;
        color: black;
        align-items: center !important;
    }

    .container_1 {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 1000px;
        height: 600px;
        padding: 50px;
        background-color: #f5f5f5;
        box-shadow: 0 30px 50px #dbdbdb;
    }

    #slide {
        width: max-content;
        margin-top: 50px;
    }

    .item {
        width: 200px;
        height: 300px;
        background-position: 50% 50%;
        display: inline-block;
        transition: 0.5s;
        background-size: cover;
        position: absolute;
        z-index: 1;
        top: 50%;
        transform: translate(0, -50%);
        border-radius: 20px;
        box-shadow: 0 30px 50px #505050;
    }

    .item:nth-child(1),
    .item:nth-child(2) {
        left: 0;
        top: 0;
        transform: translate(0, 0);
        border-radius: 0;
        width: 100%;
        height: 100%;
        box-shadow: none;
    }

    .item:nth-child(3) {
        left: 50%;
    }

    .item:nth-child(4) {
        left: calc(50% + 220px);
    }

    .item:nth-child(5) {
        left: calc(50% + 440px);
    }

    .item:nth-child(n+6) {
        left: calc(50% + 660px);
        opacity: 0;
    }

    .item .content {
        position: absolute;
        top: 50%;
        left: 100px;
        width: 300px;
        text-align: left;
        padding: 0;
        color: #eee;
        transform: translate(0, -50%);
        display: none;
        font-family: system-ui;
    }

    .item:nth-child(2) .content {
        display: block;
        z-index: 11111;
    }

    .item .name {
        font-size: 40px;
        font-weight: bold;
        opacity: 0;
        animation: showcontent 1s ease-in-out 1 forwards
    }

    .item .des {
        margin: 20px 0;
        opacity: 0;
        animation: showcontent 1s ease-in-out 0.3s 1 forwards
    }

    .item button {
        padding: 10px 20px;
        border: none;
        opacity: 0;
        animation: showcontent 1s ease-in-out 0.6s 1 forwards
    }

    @keyframes showcontent {
        from {
            opacity: 0;
            transform: translate(0, 100px);
            filter: blur(33px);
        }

        to {
            opacity: 1;
            transform: translate(0, 0);
            filter: blur(0);
        }
    }

    .buttons {
        position: absolute;
        bottom: 30px;
        z-index: 222222;
        text-align: center;
        width: 100%;
    }

    .buttons button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 1px solid #555;
        transition: 0.5s;
    }

    /*  animation*/
    .buttons button:hover {
        background-color: #bac383;
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

    .img-marquee {
        width: 100%;
        height: 100px;
    }

    .navbar {
        padding: 10px 16px;
        background: black !important;
        /* color: #f1f1f1; */
    }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php
    include_once('./includes/navbar_first.php');
    ?>

    <!-- calling cart -->
    <?php
      add_cart(); 
  ?>
    <!--  -->
    <!-- second child -->

    <nav class="navbar-expand-lg navbar-dark text-dark px-3 fixeds" style="display: block;">
        <ul class="navbar-nav me-auto py-2">

            <?php 
    include_once('./includes/navbar_second.php');
            ?>
        </ul>

    </nav>

    <!-- third -->
    <div class="row content">
        <div class="py-2 m-0 w-50 col-lg-6 col-md-12 col-sm-12">
            <div class="container-fluid">
                <div id="slide">
                    <div class="item" style="background-image: url(./images/fashion1.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button class="btn"><a class="text-light" href="all_products.php">xem chi tiết</a></button>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(./images/fashion1.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button class="btn btn-outline"><a class="text-light" href="all_products.php">xem chi
                                    tiết</a></button>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(./images/fashion3.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button class="btn btn-outline"><a class="text-light" href="all_products.php">xem chi
                                    tiết</a></button>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(./images/fashion4.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button class="btn btn-outline"><a class="text-light" href="all_products.php">xem chi
                                    tiết</a></button>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(./images/fashion5.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button class="btn btn-outline"><a class="text-light" href="all_products.php">xem chi
                                    tiết</a></button>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(./images/fashion6.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button class="btn btn-outline"><a class="text-light" href="all_products.php">xem chi
                                    tiết</a></button>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
                    <button id="next"><i class="fa-solid fa-angle-right"></i></button>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="marquee">
                <span><img class="img-marquee" src="./images/sale5.jpg" alt=""></span>
            </div>
            <div class="row mt-2" style="height: 30 0px;">
                <?php getproducts_thirth(); 
          ?>
            </div>
        </div>

    </div>
    <!-- fourth -->
    <div class="row px-1 mt-2">
        <div class="col-md-10">
            <div class="row container">
                <!-- products -->
                <!-- product mu -->
                <?php if(isset($_GET['category']) or isset($_GET['brand'])){
                    
                    get_unique_categories();
                    get_unique_brands();
                    

                     }else{
        // echo "<div><h3 class='text-center text-dark py-3'>Sản Phẩm Bán Chạy Nhất</h3></div>";
        // getproducts_bestsaler();
        echo "<div><h3 class='text-center text-dark py-3'>Nón</h3></div>";
        getproducts_non();
        echo " <div><h3 class='text-center text-dark py-3'>Túi Xách</h3></div>";
        getproducts_tuixach(); 
        echo "<div><h3 class='text-center text-dark py-3'>Áo</h3></div>";
        getproducts_ao();
        echo "<div><h3 class='text-center text-dark py-3'>Quần</h3></div>";
        getproducts_quan(); 
        echo "<div><h3 class='text-center text-dark py-3'>Kính</h3></div>";
        getproducts_kinh();
        echo "<div><h3 class='text-center text-dark py-3'>Giày</h3></div>";
        getproducts_giay();
    }
     ?>
                <div class="text-right">
                    <a href="all_products.php">
                        <h7>xem thêm &raquo;</h7>
                    </a>

                </div>

            </div>
        </div>
        <div class="col-md-2">
            <!-- side nav -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item" style="background-color: black;">
                    <a href="#" class="nav-link text-light">
                        <h6>Danh mục</h6>
                    </a>
                </li>

                <!-- category -->
                <?php getcategories();
            
       ?>
            </ul>
            <!-- Brand -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item" style="background-color: black;">
                    <a href="#" class="nav-link text-light">
                        <h6>Nhãn hàng</h6>
                    </a>
                </li>
                <!-- Divider -->
                <?php 
 getbrands();
 ?>

            </ul>
        </div>
    </div>
    </div>
    </div>


    <!--  notification-->
    <div class="notification">
        <div class="notification-header">
            <?php if(isset($_SESSION['username'])){
            echo "
            <h3 class='notification-title'><i class='fa-regular fa-bell'></i> Chào {$_SESSION['username']}</h3>

              ";
            }else{
                echo "
                <h3 class='notification-title'>Xin Chao</h3>
    
                  ";
            }
             ?>
        </div>

        <!-- <i class="fa fa-times notification-close"></i> -->
        <div class="notification-container">
            <div class="notification-media">
            </div>
            <div class="notification-content">
                <p class="notification-text text-danger">
                    Bạn có <strong><?php cart_item() ?></strong> sản phẩm trong giỏ hàng!
                </p>
                <span class="notification-timer"></span>
            </div>
            <span class="notification-status"></span>
        </div>
    </div>


    <!-- Chat bot -->


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


    <!-- col end -->
    <!-- js link bstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>


    <?php
    include_once('./includes/footer.php'); 
    ?>

    <!-- script -->
    <script src="startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/js/custom.js">
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

    <script>
    document.getElementById('next').onclick = function() {
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').appendChild(lists[0]);
    }
    document.getElementById('prev').onclick = function() {
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').prepend(lists[lists.length - 1]);
    }
    </script>


</body>

</html>
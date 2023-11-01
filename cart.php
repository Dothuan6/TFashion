<?php
  include("./includes/connect.php");
  include_once('./functions/common_function.php');
  @session_start();
?>
<?php
// update query\
global $conn;
if(isset($_POST['update_product_qty'])){
    $update_value = htmlspecialchars($_POST['update_qty']);
    $update_id = htmlspecialchars($_POST['update_qty_id']);
    // echo $update_id;
    // echo $update_value;
    $update_qty_query="update `cart_details` set quantity = ? where product_id = ?";
    $stmt = $conn->prepare($update_qty_query);
    $result_update_qty_query=$stmt->execute([$update_value,$update_id]);
    if($result_update_qty_query){
        echo "<script>alert('Cập nhật thành công!')</script>" ;
    }

}
if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    $delete = "delete from `cart_details` where product_id = ?";
    $stmt = $conn->prepare($delete);
    $stmt ->execute([$remove_id]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết giỏ hàng</title>
    <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- font aware cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css style link -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
        href="./startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- face -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0"
        nonce="D3hjkbza"></script>

    <style>
    .cart_img {
        width: 80px;
        height: 80px;
        object-fit: contain;

    }

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
        height: 700px !important;
    }

    /* chat bot css */
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

    #navbar {
        background-color: black !important;
    }
    </style>
</head>

<body>

    <!-- navbar -->
    <?php
    include_once('./includes/navbar_first.php');
    ?>
    <!-- cart -->
    <?php
  add_cart();
    ?>
    <!--  -->
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <ul class="navbar-nav me-auto">

            <?php 
            include_once('./includes/navbar_second.php');
            ?>
        </ul>
    </nav>
    <!-- third child -->
    <!-- fourth child-table -->
    <h3 class="text-center py-3">Chi tiết giỏ hàng</h3>
    <div class="container-fluid">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered">
                    <?php
                    $cart_query_1="select *from `cart_details`";
                    $stmt = $conn->prepare($cart_query_1);
                    $stmt->execute();
                    if($stmt->rowCount()>0){
                    echo "<thead>
                        <tr class='text-center'>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá SP</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th colspan='2'>Hoạt động</th>
                        </tr>
                    </thead>";
                    ?>
                    <tbody>
                        <?php 
                   global $conn;
                   $total_price=0;
                   $get_ip_add = getIPAddress();
                   $total_price_format =0;  
                   $cart_query="select *from `cart_details`";
                    $stmt = $conn->prepare($cart_query);
                    $stmt->execute();
                   while($row=$stmt->fetchAll()){
                    foreach($row as $row){
                     $product_id = $row['product_id'];
                     $product_qty=$row['quantity'];
                    //  echo $product_qty;
                     $select_products="select *from `products` where product_id=?";
                     $stmt = $conn->prepare($select_products);
                     $stmt->execute([$product_id]);
                     while($row_product_price=$stmt->fetch()){
                       $product_price = array($row_product_price['product_price']);
                       $price_table = $row_product_price['product_price'];
                       $product_title = $row_product_price['product_title'];
                       $product_image1 = $row_product_price['product_image3'];
                       $subtotal = number_format((int)$product_qty*(int)$price_table,3);
                       $total_price =((int)$total_price + (int)$subtotal);
                       $total_price_format = number_format((int)$total_price,3);
                       $vat = number_format($total_price_format * (3/100),3);
                       $sub_price = number_format(($total_price_format + $vat),3);
                    //    echo $total_price; 
                         ?>
                        <tr class='text-center'>
                            <td><?php echo $product_title ?></td>
                            <td><?php echo "<img class='cart_img center-block' src='./admin_area/product_images/$product_image1'"?>
                            </td>
                            <td><?php echo "$price_table VND" ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" class="text-center" value="<?php echo $product_id ?>"
                                        name="update_qty_id">

                                    <div class="quantity_box">
                                        <input value="<?php echo $product_qty ?>" type="number" name="update_qty"
                                            min="1" style="width: 70px; height: 20px;margin-top: 10px;">
                                        <input class='mx-3 bg-warning py-2 px-2 border-0 btn' value='Cập nhật'
                                            type='submit' name='update_product_qty'>
                                    </div>
                                </form>
                            </td>
                            <td class="text-danger"><?php echo "$subtotal VND" ?></td>

                            <td>
                                <a href="cart.php?remove=<?php echo $product_id ?>"
                                    class="mx-3 text-dark bg-info py-2 px-2 border-0 btn"
                                    onclick="return confirm('Bạn chắn chắn muốn xóa sản phẩm này?')">Xóa</a>
                            </td>
                        </tr>
                        <?php 
                }   
          }
          
        }
    ?>
                    </tbody>
                </table>
                <!-- subtotal -->
                <?php
        if(isset($_SESSION['username'])){
        $get_ip_add=getIPAddress();         
        $cart_query="select * from `cart_details` where ip_address=?";
        $stmt = $conn->prepare($cart_query);
        $stmt ->execute([$get_ip_add]);
        $result_count=$stmt->rowCount();
        $get_username= $_SESSION['username'];
        $select_user_id="select * from `user_table` where username=?";
        $stmt = $conn->prepare($select_user_id);
        $stmt ->execute([$get_username]);
        $row_user_id = $stmt->fetch();
        $user_id = $row_user_id['user_id'];
        if($result_count>0){
             echo "<div>
             <div class='row'>
             <h7 class='px3'>Tổng tiền: <strong class='text-danger'> $total_price_format VND</strong></h7>
             </div>
             <div class='row py-2'>
             <h7 class='px3'>Thuế VAT(3%): <strong class='text-danger'> $vat VND</strong></h7>
             </div>
             <div class='row'>
             <h7 class='px3'>Thành tiền: <strong class='text-danger'>$sub_price VND</strong></h7>
             </div>
             <div class='py-2'>
             <button class='mx-0 bg-info py-2 px-3 border-0 btn btn-outline' name='continue_shopping'> <a 
             href='homepage.php' class='text-dark' style='text-decoration: none;'>Mua sắm</a></button>
            <button class='mx-2 bg-secondary py-2 px-3 border-0 btn btn-outline'> <a href='./user_area/checkout.php?user_id=$user_id' class='text-light' style='text-decoration: none;'>Thanh toán</a></button>
            </div></div>";
        }
      else{
              echo "<button name='continue_shopping' class='mx-2 mb-3 bg-info py-2 px-3 border-0 btn btn-outline'> <a href='homepage.php' class='text-dark' style='text-decoration: none;'>Mua sắm</a></button>";
          
        }if(isset($_POST['continue_shopping'])){
          echo "<script>window.open('homepage.php','self')</script>";
        }
      }else{
        $get_ip_add=getIPAddress();
        $cart_query="select * from `cart_details` where ip_address=?";
        $stmt = $conn->prepare($cart_query);
        $stmt ->execute([$get_ip_add]);
        $result_count=$stmt->rowCount();
        if($result_count>0){
             echo "<div class='d-flex mb-5'><h7 class='px-3'>Tổng tiền: <strong class='text-info'>$total_price_format
                VND</strong></h7>
                <button class='mx-2 bg-info py-2 px-3 border-0  
                bg-warning btn btn-outline' name='continue_shopping'> <a
                        href='homepage.php' class='text-dark' style='text-decoration: none;'>Mua sắm</a></button>
                <button class='mx-2 bg-secondary py-2 px-3 border-0 btn btn-outline'> <a href='./user_area/checkout.php'
                        class='text-light' style='text-decoration: none;'>Thanh toán</a></button>
        </div>";
        }
        else{
        echo "<button name='continue_shopping' class='mx-2 mb-3 bg-warning py-2 px-3 border-0 btn btn-outline'> <a
                href='homepage.php' class='text-dark' style='text-decoration: none;'>Mua sắm</a></button>";

        }if(isset($_POST['continue_shopping'])){
        echo "<script>
        window.open('homepage.php', 'self')
        </script>";
        }
        }
        }else{
        echo "<div class='alert alert-success w-50' role='alert'>
            Không có sản phẩm trong giỏ hàng!
        </div>";
        echo "<button name='continue_shopping' class='mx-2 mb-3 bg-info py-2 px-3 border-0 btn btn-outline'> <a
                href='homepage.php' class='text-dark' style='text-decoration: none;'>Mua sắm</a></button>";

        }

        ?>
        </div>
    </div>
    </form>
    </div>
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
    <?php
    include('./includes/footer.php');
     ?>
    <!-- js link bstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="./startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js">
    </script>
    <script src="./js/customs.js"></script>
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
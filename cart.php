<?php
  include("./includes/connect.php");
  include_once('./functions/common_function.php');
  @session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết giỏ hàng</title>
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
     <link rel="stylesheet" href="./style.css">
     <!-- js -->

     <style>
  .cart_img{
    width: 80px;
    height: 80px;
    object-fit: contain;
    
}
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

</style>
</head>
<body>
    <!-- navbar-->
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg bg-secondary-subtle">
      <div class="container-fluid">
        <img src="images/logo.png" alt="Lo Go" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="homepage.php">
        <i class="fa-solid fa-house"></i>
            <span>Trang Chủ</span></a>
    </li>
            <li class="nav-item">
              <a class="nav-link" href="all_products.php">Sản Phẩm</a>
            </li>
            <?php 
        if(isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <a class='nav-link' href='./user_area/user_profile.php'>Tài Khoản</a>
        </li>";
        }else{
          echo " <li class='nav-item'>
          <a class='nav-link' href='./user_area/user_reg.php'>Đăng Ký</a>
        </li>";
        }
         ?>
          <li class='nav-item'>
            <a class='nav-link' href='#'>Liên Hệ</a>
          </li>
          <li class='nav-item'>
              <a class='nav-link' href='cart.php'><i class='fa-solid fa-cart-shopping'></i><sup><?php cart_item() ?><sup></a>
            </li>
            <li class='nav-item'>
          <a class='nav-link' href='#'>Tổng Tiền: <?php total_price() ?> VND</a>
        </li>
          </ul>
          <form class="d-flex" role="search" action="search_products.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search" name="search_data">
            <button class="btn btn-outline-info" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div>
      </div>
    </nav>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">

  <?php 
  if(isset($_SESSION['username'])){
    echo "<li class='nav-item'>
          <a class='nav-link' href='homepage.php'>Xin chào {$_SESSION['username']}</a>
          </li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='homepage.php'><i class='fa-regular fa-user'></i></a>
    </li>";
  }
  if(isset($_SESSION['username'])){
    echo "
    <li class='nav-item'>
           <a class='nav-link' href='./user_area/user_logout.php'>Đăng xuất</a>
    </li>";
  }else{
    echo "
    <li class='nav-item'>
           <a class='nav-link' href='./user_area/user_log.php'>Đăng nhập</a>
    </li>";
  }
  ?>
  </ul>
</nav>
  </ul>
</nav> 

<!-- third child -->
<!-- fourth child-table -->
<h3 class="text-center py-3 text-info">Chi tiết giỏ hàng</h3>
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered">
            <thead>
                 <tr class="text-center">
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Chọn</th>
                    <th colspan="2">Hoạt động</th>
                 </tr>
                 <tbody>
     <?php 
                   global $con;
                   $total_price=0;
                   $get_ip_add = getIPAddress();
                   $cart_query="select *from `cart_details` where ip_address=
                   '$get_ip_add'";
                   $result=mysqli_query($con,$cart_query);
                   while($row=mysqli_fetch_array($result)){
                     $product_id = $row['product_id'];
                     $select_products="select *from `products` where product_id='$product_id'";
                     $result_products=mysqli_query($con,$select_products);
                     while($row_product_price=mysqli_fetch_array($result_products)){
                       $product_price = array($row_product_price['product_price']);
                       $price_table = $row_product_price['product_price'];
                       $product_title = $row_product_price['product_title'];
                       $product_image1 = $row_product_price['product_image3'];
                       $product_values = array_sum($product_price);
                       $total_price+=$product_values;  
    ?>

           <tr class='text-center'>
          <td><?php echo $product_title ?></td>
          <td><?php echo "<img class='cart_img center-block' src='./admin_area/product_images/$product_image1'"?></td>
          <td><div style='display: flex;'>
          <input type="number" name="qty" id="" style="width: 70px; height: 20px;margin-top: 10px;">
          <label class='mb-4 text-muted' style='margin-left: 20px; margin-top: 10px;'>Còn hàng</label>
          </div></td>

          <?php 
          $get_ip_add = getIPAddress();
          if(isset($_POST['update_cart'])){
            $quantities = $_POST['qty'];
             $update_cart="update `cart_details` set quantity='$quantities' where product_id='$product_id'";
             $result_products_quantity=mysqli_query($con,$update_cart);
             settype($quantities,'integer');
             if($quantities>0){
              $total_price= $total_price*$quantities;
             }else{
              $total_price = $total_price;
             }
            
          }
          ?>

          <td><?php echo "{$price_table} VND" ?></td>
          <td><input type='checkbox' name='removeitem[]' value='<?php echo $product_id ?>'></td>
          <td>
              <input class='mx-3 bg-info py-2 px-2 border-0' value='Update Cart' type='submit' name='update_cart'>
              <input class='mx-3 bg-info py-2 px-2 border-0' value='Remove Cart' type='submit' name='remove_cart'>
          </td>
          </tr>
    <?php 
                }
          }
    ?>
    <?php
    remove_cart_item();
    ?>
                     </tbody>
            </thead>
        </table>
        <!-- subtotal -->
        <?php  
        $get_ip_add=getIPAddress();
        $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
        $result=mysqli_query($con,$cart_query);
        $result_count=mysqli_num_rows($result);
        if($result_count>0){
             echo "<div class='d-flex mb-5'><h4 class='px3'>Tổng tiền: <strong class='text-info'> $total_price VND</strong></h4>
                  <button class='mx-2 bg-info py-2 px-3 border-0 btn btn-outline' name='continue_shopping'> <a href='homepage.php' class='text-dark' style='text-decoration: none;'>Mua sắm</a></button>
                 <button class='mx-2 bg-secondary py-2 px-3 border-0 btn btn-outline'> <a href='./user_area/checkout.php' class='text-light' style='text-decoration: none;'>Thanh toán</a></button>
                </div>";
        }else{
              echo "<button name='continue_shopping' class='mx-2 mb-3 bg-info py-2 px-3 border-0 btn btn-outline'> <a href='homepage.php' class='text-dark' style='text-decoration: none;'>Mua sắm</a></button>";
          
        }if(isset($_POST['continue_shopping'])){
          echo "<script>window.open('homepage.php','self')</script>";
        }
       
    ?>
    </div>
</div>
</form>

  <?php
  include('./includes/footer.php');
  ?>
</div>
<!-- js link bstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
   <script src="./startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script> 
   <script src="./js/customs.js"></script>
</body>
</html>
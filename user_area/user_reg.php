<?php
  include_once("../includes/connect.php");
  include_once('../functions/common_function.php');
  @session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
</head>
<body>

<form class="w-75 mt-3 border border-2 m-auto" action="" method="post"  enctype="multipart/form-data">
        <h1 class="text-center text-primary py-3">Đăng ký thành viên mới</h1>
        <div class="row px-3">
                <img class="col-lg-6 col-md-5" src="../images/reg_image.svg" alt="">
                <div class="col-lg-6 col-md-7 w-50">
                    <!-- username -->
                    <div class="input-group has-validation">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                     <div class="form-floating is-invalid">
                     <input autocomplete="off" name="user_username" type="text" class="form-control" id="user_username" placeholder="Username" required>
                    <label for="user_username">Username</label>
                    </div>
                    <div class="invalid-feedback">
                      Nhập vào username.
                    </div>
                 </div>
                 <!-- email -->
                 <div class="input-group has-validation"> 
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                     <div class="form-floating is-invalid">
                     <input name="user_email" type="text" class="form-control" id="floatingInputGroup2" placeholder="Email" required>
                    <label for="floatingInputGroup2">Email</label>
                    </div>
                    <div class="invalid-feedback">
                      Nhập vào email.
                    </div>
                 </div>
                    <!-- image -->
                 <div class="form-outline mb-4 mt-3">
                       
                        <input name="user_images" type="file" class="form-control" 
                        id="user_image" placeholder="Enter your Image"
                        autocomplete="off" required="required" name="user_image">
                        <label for="user_image" class="form-label text-danger fs-6">Hình ảnh</label>
                    </div>
                <!-- Pass -->
                 <div class="input-group has-validation">
                    <span class="input-group-text"><i class="fa-solid fa-eye"></i></span>
                     <div class="form-floating is-invalid">
                     <input name="user_password" type="password" class="form-control" id="floatingInputGroup2" placeholder="Password" required>
                    <label for="floatingInputGroup2">Password</label>
                    </div>
                    <div class="invalid-feedback">
                      Nhập vào mật khẩu.
                    </div>
                 </div>
                 <!-- confirm pass -->
                 <div class="input-group has-validation">
                    <span class="input-group-text"><i class="fa-regular fa-eye"></i></span>
                     <div class="form-floating is-invalid">
                     <input name="conf_user_password" type="password" class="form-control" id="floatingInputGroup2" placeholder="Password" required>
                    <label for="floatingInputGroup2">Confirm password</label>
                    </div>
                    <div class="invalid-feedback">
                      Xác nhận mật khẩu.
                    </div>
                 </div>
                 <!-- address -->
                 <div class="input-group has-validation">
                    <span class="input-group-text"><i class="fa-solid fa-location-pin"></i></span>
                     <div class="form-floating is-invalid">
                     <input name="user_address" type="text" class="form-control" id="floatingInputGroup2" placeholder="Address" required>
                    <label for="floatingInputGroup2">Address</label>
                    </div>
                    <div class="invalid-feedback">
                      Nhập vào địa chỉ.
                    </div>
                 </div>
                 <!-- mobile -->
                 <div class="input-group has-validation">
                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                     <div class="form-floating is-invalid">
                     <input name="user_contact" type="text" class="form-control" id="floatingInputGroup2" placeholder="Contact" required>
                    <label for="floatingInputGroup2">Contact</label>
                    </div>
                    <div class="invalid-feedback">
                      Nhập vào số điện thoại.
                    </div>
                 </div>
                    <!--  -->
                    <input class="btn btn-info px-3 mt-3" type="submit" name="Register" id="Register" value="Đăng ký">
                <p class="small fw-bold mt-2 pt-1 mb-0">Bạn đã có tài khoản ? <strong><a class="text-danger" href="checkout.php"> Đăng nhập</a></strong></p>
                 
                </div>
        </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
</body>
</html> 
<?php

    if(isset($_POST['Register'])){
        global $con;
        $user_username = $_POST['user_username'];
        $email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
        $conf_user_password= $_POST['conf_user_password'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_ip=getIPAddress();
        
        //accessing images
        $user_image = $_FILES['user_images']['name'];
    
        //accessing image tmp name
        $temp_image = $_FILES['user_images']['tmp_name'];
    //select_query
    $select_query = "select * from `user_table` where username='$user_username' or user_email='$email' ";
    $result = mysqli_query($con,$select_query);
    $row_count = mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Tên hoặc email đã tồn tại')</script>";
    }else{
     //checking empty
        if(empty($user_username) or empty($email) or empty($user_password) or 
        empty($conf_user_password) or empty($user_address) or empty($user_contact) or
        empty($user_image)){
            echo "<script>alert('Vui lòng điền đầy đủ thông tin!')</script>";
            exit();
        }else if($user_password != $conf_user_password){
            echo "<script>alert('Mật khẩu nhập lại cần phải trùng khớp với mật khẩu!')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image,"./user_images/$user_image");

         //insert query
            $insert_user = "insert into `user_table` (username,
            user_email,user_password,
            user_image,user_ip,
            user_address,user_mobile) values ('$user_username','$email',
            '$hash_password',
            '$user_image',
            '$user_ip',
            '$user_address',
            '$user_contact')";
             $result_query = mysqli_query($con,$insert_user);
            if($result_query){
                echo "<script>alert('Bạn đã đăng ký thành viên thành công!')</script>";
                echo "<script>window.open('user_log.php','_self')</script>";
            }
        }
        // Selecting cart items
        $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
        $result_cart = mysqli_query($con,$select_cart_items);
        $rows_count = mysqli_num_rows($result_cart);
        if($row_count>0){
            $_SESSION['username'] = $user_username;
            echo "<script>alert('Bạn có một vài hàng hóa trong giỏ hàng')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('../index.php','_self')</script>";
        }  
}
    }
    ?>
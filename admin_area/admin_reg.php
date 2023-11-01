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
</head>

<body>

    <form class="w-75 mt-3 border border-2 m-auto" action="" method="post" enctype="multipart/form-data">
        <h1 class="text-center text-primary py-3">Đăng ký Quản Lý</h1>
        <div class="row px-3">
            <img class="col-lg-6 col-md-5" src="../images/reg_image.svg" alt="">
            <div class="col-lg-6 col-md-7 w-50">
                <!-- username -->
                <div class="input-group has-validation">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <div class="form-floating is-invalid">
                        <input autocomplete="off" name="user_username" type="text" class="form-control"
                            id="user_username" placeholder="Username" required>
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
                        <input name="user_email" type="text" class="form-control" id="floatingInputGroup2"
                            placeholder="Email" required>
                        <label for="floatingInputGroup2">Email</label>
                    </div>
                    <div class="invalid-feedback">
                        Nhập vào email.
                    </div>
                </div>
                <!-- image -->
                <!-- Pass -->
                <div class="input-group has-validation">
                    <span class="input-group-text"><i class="fa-solid fa-eye"></i></span>
                    <div class="form-floating is-invalid">
                        <input name="user_password" type="password" class="form-control" id="floatingInputGroup2"
                            placeholder="Password" required>
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
                        <input name="conf_user_password" type="password" class="form-control" id="floatingInputGroup2"
                            placeholder="Password" required>
                        <label for="floatingInputGroup2">Confirm password</label>
                    </div>
                    <div class="invalid-feedback">
                        Xác nhận mật khẩu.
                    </div>
                </div>
                <!--  -->
                <input class="btn btn-info px-3 mt-3" type="submit" name="Register" id="Register" value="Đăng ký">
                <p class="small fw-bold mt-2 pt-1 mb-0">Bạn đã có tài khoản ? <strong><a class="text-danger"
                            href="admin_log.php"> Đăng nhập</a></strong></p>

            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php

    if(isset($_POST['Register'])){
        global $conn;
        $user_username = htmlspecialchars($_POST['user_username']);
        $email = htmlspecialchars($_POST['user_email']);
        $user_password = htmlspecialchars($_POST['user_password']);
        $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
        $conf_user_password= htmlspecialchars($_POST['conf_user_password']);
    $select_query = "select * from `admin_table` where admin_name=? or admin_email=? ";
    $stmt = $conn->prepare($select_query);
    $stmt->execute([$user_username,$email]);
    $row_count =$stmt->rowCount();
    if($row_count>0){
        echo "<script>alert('Tên hoặc email đã tồn tại')</script>";
    }else{
     //checking empty
        if(empty($user_username) or empty($email) or empty($user_password) or 
        empty($conf_user_password)){
            echo "<script>alert('Vui lòng điền đầy đủ thông tin!')</script>";
            exit();
        }else if($user_password != $conf_user_password){
            echo "<script>alert('Mật khẩu nhập lại cần phải trùng khớp với mật khẩu!')</script>";
            exit();
        }else{
          
         //insert query
            $insert_user = "insert into `admin_table` (admin_name,
            admin_email,admin_password) values (?,?,?)";
            $stmt = $conn->prepare($insert_user);
            $result_query = $stmt->execute([$user_username,$email,$hash_password]);
            if($result_query){
                echo "<script>alert('Bạn đã đăng ký quản lý thành công!')</script>";
                echo "<script>window.open('admin_log.php','_self')</script>";
            }
        }
}
    }
    ?>
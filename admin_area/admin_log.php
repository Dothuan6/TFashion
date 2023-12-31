<?php
include_once('../includes/connect.php');
include_once('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- font aware cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css style link -->
    <link rel="stylesheet" href="../style.css">
    <style>
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
    </style>
</head>

<body>
    <div class="container-fluid my-3 m-auto w-100">
        <h2 class="text-center py-3">Đăng nhập Quản Lý</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-4">
                        <!-- username field -->
                        <input type="text" class="form-control" id="admin_name" placeholder="Nhập vào tên"
                            autocomplete="off" required="required" name="admin_name">
                        <label for="admin_name" class="form-label">Tên</label>

                    </div>
                    <div class="form-floating mb-4">
                        <!-- password field -->

                        <input type="password" class="form-control" id="admin_password" placeholder="Nhập vào mật khẩu"
                            autocomplete="off" required="required" name="admin_password">
                        <label for="admin_password" class="form-label">Mật khẩu</label>
                    </div>
                    <a class="" href="#">Quên mật khẩu</a><br>
                    <input class="mt-4 btn btn-info mb-6 px-3" type="submit" name="admin_login" id="admin_login"
                        value="Đăng nhập">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Chưa có tài khoản?<a class="text-danger"
                            href="admin_reg.php">
                            Đăng ký</a></p>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
<?php
if(isset($_POST['admin_login'])){
    global $conn;
    $admin_name = htmlspecialchars($_POST['admin_name']);
    $admin_password = htmlspecialchars($_POST['admin_password']);
    $select_query="select * from `admin_table` where admin_name=?";
    $stmt = $conn->prepare($select_query);
    $stmt->execute([$admin_name]);
    $row_count = $stmt->rowCount();
    $row_data=$stmt->fetch(PDO::FETCH_ASSOC);    //cart items
    if($row_count>0){
        $_SESSION['admin_name'] = $admin_name;
        if(password_verify($admin_password,$row_data['admin_password'])){
            if($row_count==1){
                $_SESSION['admin_name'] = $admin_name;
                echo "<script>alert('Đăng nhập thành công!')</script>";
                echo "<script>window.open('./index.php','_self')</script>";
            }
        }else{
        echo "<script>alert('Mật khẩu hoặc tên không đúng!')</script>";
}
    }
}
?>
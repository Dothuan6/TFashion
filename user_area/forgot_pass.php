<?php
include_once('../includes/connect.php');
include_once('../functions/common_function.php');
@session_start();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<!-- font aware cdn -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="container-fluid my-3 m-auto w-100">
    <h3 class="text-center py-3">Quên mật khẩu</h3>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-floating mb-4">
                    <!-- username field -->
                    <input type="email" class="form-control" id="email" placeholder="Nhập vào email" autocomplete="off"
                        required="required" name="email">
                    <label for="email" class="form-label">Email</label>

                </div>
                <div class="form-floating mb-4">
                    <!-- username field -->
                    <input type="password" class="form-control" id="last_pass" placeholder="Nhập vào mật khẩu cũ"
                        autocomplete="off" required="required" name="last_pass">
                    <label for="last_pass" class="form-label">Mật khẩu cũ</label>

                </div>
                <div class="form-floating mb-4">
                    <!-- password field -->
                    <input type="password" class="form-control" id="new_pass" placeholder="Nhập vào mật khẩu mới"
                        autocomplete="off" required="required" name="new_pass">
                    <label for="new_pass" class="form-label">Mật khẩu mới</label>
                </div>
                <div class="form-floating mb-4">
                    <!-- password field -->
                    <input type="password" class="form-control" id="conf_new_pass" placeholder="Xac nhan mật khẩu mới"
                        autocomplete="off" required="required" name="conf_new_pass">
                    <label for="conf_new_pass" class="form-label">Xác nhận mật khẩu mới</label>
                </div>
                <input class="mt-4 btn btn-info mb-6 px-3" type="submit" name="forgot_pass" id="forgot_pass"
                    value="Đổi mật khẩu">
            </form>
        </div>

    </div>
</div>
<?php
if(isset($_POST['forgot_pass'])){
    global $conn;
    $email=$_POST['email'];
    $last_pass=htmlspecialchars($_POST['last_pass']);
    $new_pass=htmlspecialchars($_POST['new_pass']);
    $hash_password = password_hash($new_pass,PASSWORD_DEFAULT);
    $conf_new_pass=htmlspecialchars($_POST['conf_new_pass']);
    $select_query="select *from `user_table`";
    $stmt = $conn->prepare($select_query);
    $result_query=$stmt->execute();
    $row_fetch=$stmt->fetchALL();
    foreach($row_fetch as $row_fetch){
    $user_email = $row_fetch['user_email'];
    }
    if($email == $user_email){
        if(password_verify($last_pass,$row_fetch['user_password'])){
            if($new_pass != $conf_new_pass){
                echo "<script>alert('Mật khẩu không khớp!')</script>";
        }else{
            $update_data="update `user_table` set user_password=? where user_email=?";
            $stmt= $conn->prepare($update_data);
            $result_query_update=$stmt->execute([$hash_password,$user_email]);
            if($result_query_update){
                echo "<script>alert('Cập nhật mật khẩu thành công!')</script>";
                echo "<script>window.open('user_log.php','_self')</script>";
            }
        }
    }else{
    echo "<script>alert('Mật khẩu cũ bị sai!')</script>";

    }
}else{
    echo "<script>alert('email không tồn tại!')</script>";
}
}
?>
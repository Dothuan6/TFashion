<?php
include_once('../includes/connect.php');
include_once('../functions/common_function.php');
@session_start();
?>
<div class="container-fluid my-3 m-auto w-100">
    <h3 class="text-center py-3">Đổi mật khẩu</h3>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
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
                <input class="mt-4 btn btn-info mb-6 px-3" type="submit" name="change_pass" id="change_pass"
                    value="Đổi mật khẩu">
            </form>
        </div>

    </div>
</div>
<?php
if(isset($_GET['changepass'])){
    global $conn;
    $user_session_name=$_SESSION['username'];
    $select_query="select *from `user_table` where username =?";
    $stmt = $conn->prepare($select_query);
    $result_query=$stmt->execute([$user_session_name]);
    $row_fetch=$stmt->fetch();
    $user_id=$row_fetch['user_id'];
    $username_query=$row_fetch['username'];
}
    if(isset($_POST['change_pass'])){
        $update_id=$user_id;
        $last_pass=htmlspecialchars($_POST['last_pass']);
        $new_pass=htmlspecialchars($_POST['new_pass']);
        $hash_password = password_hash($new_pass,PASSWORD_DEFAULT);
        $conf_new_pass=htmlspecialchars($_POST['conf_new_pass']);
        if(password_verify($last_pass,$row_fetch['user_password'])){
            if($new_pass != $conf_new_pass){
                echo "<script>alert('Mật khẩu không khớp!')</script>";
        }else{
            $update_data="update `user_table` set user_password=? where user_id=?";
            $stmt= $conn->prepare($update_data);
            $result_query_update=$stmt->execute([$hash_password,$user_id]);
            if($result_query_update){
                echo "<script>alert('Cập nhật mật khẩu thành công!')</script>";
                echo "<script>window.open('user_logout.php','_self')</script>";
            }
        }
    }else{
        echo "<script>alert('Mật khẩu cũ bị sai!')</script>";
    
        }
}
?>
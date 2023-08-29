<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select *from `user_table` where username ='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_array($result_query);
    $user_id=$row_fetch['user_id'];
    $username_query=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
}
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        //update query
        if($username_query != $username ){
            echo "<script>alert('Tên đã tồn tại!')</script>";
            exit();
        }
        $update_data="update `user_table` set username='$username'
        , user_email='$user_email'
        ,user_image='$user_image'
        ,user_address='$user_address'
        ,user_mobile='$user_mobile' 
        where user_id='$user_id'";
        $result_query_update=mysqli_query($con,$update_data);
        if($result_query_update){
            echo "<script>alert('data updated successfully')</script>";
            echo "<script>window.open('user_logout.php','_self')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa tài khoản</title>
</head>
<body>
    <h3 class="text-center text-dark mt-4 mb-4">Chỉnh sửa tài khoản</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input value="<?php echo $username ?>" placeholder="Nhập vào tên của bạn" type="text" name="user_username" class="form-control w-50 m-auto">
        </div>
        <div class="form-outliine mb-4">
            <input value="<?php echo $user_email ?>" placeholder="Nhập vào email của bạn" type="text" name="user_email" class="form-control w-50 m-auto">
        </div>
        <div class="form-outliine mb-4 d-flex w-50 m-auto">
            <input type="file" name="user_image" class="form-control m-auto">
            <img class="edit_image" src="./user_images/<?php echo "$user_image" ?>" alt="">
        </div>
        <div class="form-outliine mb-4">
            <input value="<?php echo $user_address ?>" placeholder="Enter your address" type="text" name="user_address" class="form-control w-50 m-auto">
        </div>
        <div class="form-outliine mb-4">
            <input value="<?php echo $user_mobile ?>" placeholder="Enter your phone" type="text" name="user_mobile" class="form-control w-50 m-auto">
        </div>
        <div class="form-outliine mb-4">
            <input name="user_update" type="submit" value="Update" class="bg-info py-2 px-3 border-0">
        </div>
    </form>
</body>
</html>
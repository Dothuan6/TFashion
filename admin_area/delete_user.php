<?php
if(isset($_GET['delete_users'])){
    $user_id = $_GET['delete_users'];
    $delete_users = "delete from `user_table` where user_id='$user_id'";
    $result_users=mysqli_query($con,$delete_users);
    if($result_users){
        echo "<script>alert('Xóa thành công!')</script>";
        echo "<script>window.open('./index.php?view_users','_self')</script>";
    }
} 
?>
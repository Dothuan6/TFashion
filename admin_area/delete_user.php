<?php
global $conn;
if(isset($_GET['delete_users'])){
    $user_id = $_GET['delete_users'];
    $delete_users = "delete from `user_table` where user_id=?";
    $stmt = $conn->prepare($delete_users);
    $result_users= $stmt ->execute([$user_id]);

    if($result_users){
        echo "<script>alert('Xóa thành công!')</script>";
        echo "<script>window.open('./index.php?view_users','_self')</script>";
    }
} 
?>
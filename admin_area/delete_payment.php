<?php
global $conn;
if(isset($_GET['delete_payments'])){
    $payment_id = $_GET['delete_payments'];
    $delete_payments = "delete from `user_payments` where payment_id=?";
    $stmt = $conn->prepare($delete_payments);
   
    $result_payments= $stmt ->execute([$payment_id]);
    if($result_payments){
        echo "<script>alert('Xóa thành công!')</script>";
        echo "<script>window.open('./index.php?view_payments','_self')</script>";
    }
} 
?>
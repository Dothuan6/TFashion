<?php
if(isset($_GET['delete_payments'])){
    $payment_id = $_GET['delete_payments'];
    $delete_payments = "delete from `user_payments` where payment_id='$payment_id'";
    $result_payments=mysqli_query($con,$delete_payments);
    if($result_payments){
        echo "<script>alert('Xóa thành công!')</script>";
        echo "<script>window.open('./index.php?view_payments','_self')</script>";
    }
} 
?>
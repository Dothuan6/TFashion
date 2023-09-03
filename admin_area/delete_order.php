<?php
    if(isset($_GET['delete_orders'])){
        $invoice_number = $_GET['delete_orders'];
        $delete_orders="delete from `user_orders` where invoice_number='$invoice_number'";
        $result_orders=mysqli_query($con,$delete_orders);
        
        if($result_orders){
            echo "<script>alert('Xóa thành công!')</script>";
            echo "<script>window.open('./index.php?view_orders','_self')</script>";
        }
    }
?>
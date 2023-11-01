<?php
global $conn;
    if(isset($_GET['delete_orders'])){
        $invoice_number = $_GET['delete_orders'];
        $delete_orders="delete from `user_orders` where invoice_number=?";
        $stmt = $conn->prepare($delete_orders);

        $result_orders= $stmt->execute([$invoice_number]);
        
        if($result_orders){
            echo "<script>alert('Xóa thành công!')</script>";
            echo "<script>window.open('./index.php?view_orders','_self')</script>";
        }
    }
?>
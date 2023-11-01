<?php
global $conn;
if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
    $delete_product="delete from `products` where product_id=?";
    $stmt = $conn->prepare($delete_product);
    $result_product= $stmt ->execute([$delete_id]);
    if($result_product){
        echo "<script>alert('Xóa thành công!')</script>";
        echo "<script>window.open('./index.php?view_products','_self')</script>";
    }
} 
?>
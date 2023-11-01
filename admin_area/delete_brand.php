<?php
if(isset($_GET['delete_brand'])){
    global $conn;
    $get_brand_id=$_GET['delete_brand'];
    $delete_brand="delete from `brands` where brand_id = ?";
    $stmt = $conn->prepare($delete_brand);
    $result_delete_brand = $stmt->execute([$get_brand_id]);
    if($result_delete_brand){
        echo "<script>alert('Xóa thành công!')</script>";
        echo "<script>window.open('./index.php?insert_brands','_self')</script>";
    }
}
 ?>
<?php
if(isset($_GET['delete_brand'])){
    $get_brand_id=$_GET['delete_brand'];
    $delete_brand="delete from `brands` where brand_id = '$get_brand_id'";
    $result_delete_brand=mysqli_query($con,$delete_brand);
    if($result_delete_brand){
        echo "<script>alert('Xóa thành công!')</script>";
        echo "<script>window.open('./index.php?insert_brands','_self')</script>";
    }
}
 ?>
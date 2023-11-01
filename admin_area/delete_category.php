<?php
global $conn;
if(isset($_GET['delete_category'])){
    $get_category_id=$_GET['delete_category'];
    $delete_category="delete from `categories` where category_id = ?";
    $stmt = $conn->prepare($delete_category);
    $result_delete_category=$stmt->execute([$get_category_id]);
    if($result_delete_category){
        echo "<script>alert('Xóa thành công!')</script>";
        echo "<script>window.open('./index.php?insert_categories','_self')</script>";
    }
}
 ?>
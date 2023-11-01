<?php
global $conn;
if(isset($_GET['edit_brand'])){
    $brand_id=$_GET['edit_brand'];
    $select_brand="select * from `brands` where brand_id=?";
    $stmt = $conn->prepare($select_brand);
    $stmt ->execute([$brand_id]);
    $row_brand =$stmt->fetch(PDO::FETCH_ASSOC);
    $brand_title=$row_brand['brand_title'];
} 
?>

<div class="container mt-2">
    <h3 class="text-center text-dark py-2">Chỉnh Sửa Nhãn Hàng</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto py-2 text-center">
            <lable for="brand_title" class="form-label">Tên Nhãn Hàng</lable>
            <input value="<?php echo $brand_title ?>" type="text" id="brand_title" name="brand_title"
                class="form-control mt-2 w-50 m-auto" required="required">
        </div>
        <div class="w-50 m-auto text-center">
            <input type="submit" name="edit_brand" value="Cập nhật" class="btn btn-info mb-3 px-3 mt-3">
        </div>
    </form>
</div>
<?php
if(isset($_POST['edit_brand'])){
    $get_brand_tt=htmlspecialchars($_POST['brand_title']);
    $get_brand_id=$_GET['edit_brand'];
    $update_brand="update `brands` set 
    brand_title=? where brand_id = ?";
    $stmt = $conn->prepare($update_brand);
    $result_brand_tt = $stmt ->execute([$get_brand_tt,$get_brand_id]);
    if($result_brand_tt){
        echo "<script>alert('Cập nhật thành công!')</script>";
        echo "<script>window.open('./index.php?insert_brands','_self')</script>";
    }
}
?>
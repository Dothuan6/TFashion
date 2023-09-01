
<?php
if(isset($_GET['edit_brand'])){
    $brand_id=$_GET['edit_brand'];
    $select_brand="select * from `brands` where brand_id='$brand_id'";
    $result_brand = mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
} 
?>

<div class="container mt-2">
<h3 class="text-center text-success py-2">Edit brand</h3>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-outline w-50 m-auto py-2 text-center">
            <lable for="brand_title" class="form-label">brand Title</lable>
            <input value="<?php echo $brand_title ?>" type="text" id="brand_title" name="brand_title" class="form-control mt-2 w-50 m-auto" required="required">
        </div>
        <div class="w-50 m-auto text-center">
            <input type="submit" name="edit_brand" value="Update brand" class="btn btn-info mb-3 px-3 mt-3">
        </div>
</form>
</div>
<?php
if(isset($_POST['edit_brand'])){
    $get_brand_tt=$_POST['brand_title'];
    $get_brand_id=$_GET['edit_brand'];
    $update_brand="update `brands` set 
    brand_title='$get_brand_tt' where brand_id = '$get_brand_id'";
    $result_brand_tt=mysqli_query($con,$update_brand);
    if($result_brand_tt){
        echo "<script>alert('Successfully update!')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>

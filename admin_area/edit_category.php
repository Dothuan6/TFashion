<?php
global $conn;
if(isset($_GET['edit_category'])){
    $category_id=$_GET['edit_category'];
    $select_category="select * from `categories` where category_id=?"; 
    $stmt = $conn->prepare($select_category);
    $stmt ->execute([$category_id]);
    $row_category=$stmt->fetch(PDO::FETCH_ASSOC);
    $category_title=$row_category['category_title'];
}
?>

<div class="container mt-2">
    <h3 class="text-center text-dark py-2">Chỉnh Sửa Danh Mục</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto py-2 text-center">
            <lable for="category_title" class="form-label">Tên Danh Mục</lable>
            <input value="<?php echo $category_title ?>" type="text" id="category_title" name="category_title"
                class="form-control mt-2 w-50 m-auto" required="required">
        </div>
        <div class="w-50 m-auto text-center">
            <input type="submit" name="edit_category" value="Cập nhật danh mục" class="btn btn-info mb-3 px-3 mt-3">
        </div>
    </form>
</div>
<?php
if(isset($_POST['edit_category'])){
    $get_category_tt=htmlspecialchars($_POST['category_title']);
    $get_category_id=$_GET['edit_category'];
    $update_category="update `categories` set 
    category_title=? where category_id = ?";
    $stmt = $conn->prepare($update_category);
    $result_category_tt = $stmt ->execute([$get_category_tt, $get_category_id]);
    if($result_category_tt){
        echo "<script>alert('Cập nhật thành công!')</script>";
        echo "<script>window.open('./index.php?insert_categories','_self')</script>";
    }
}
?>
<?php
global $conn;
    if(isset($_GET['edit_products'])){
        $edit_id=$_GET['edit_products'];
        $get_data = "select * from `products` where product_id=?";
        $stmt = $conn->prepare($get_data);
        $stmt ->execute([$edit_id]);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_image3=$row['product_image3'];
        $product_price=$row['product_price'];

// fetching category 
        $select_category="select * from `categories` where category_id=?";
        $stmt = $conn->prepare($select_category);
        $stmt ->execute([$category_id]);
        $row_category=$stmt->fetch(PDO::FETCH_ASSOC);
        $category_title=$row_category['category_title'];
// fetch brand
    $select_brands="select * from `brands` where brand_id=?";
    $stmt= $conn->prepare($select_brands);
    $stmt ->execute([$brand_id]);
    $row_brands=$stmt->fetch(PDO::FETCH_ASSOC);
    $brand_title=$row_brands['brand_title'];
    }

?>




<div class="container mt-3">
    <h1 class="text-center text-dark">Chỉnh Sửa Sản Phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mt-3">
            <lable for="product_title" class="form-label">Tên SP</lable>
            <input value="<?php echo $product_title ?>" type="text" id="product_title" name="product_title"
                class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto">
            <lable for="product_description" class="form-label">Mô Tả</lable>
            <input value="<?php echo $product_description ?>" type="text" id="product_description"
                name="product_description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto  mt-4">
            <lable for="product_keywords" class="form-label">Từ Khóa</lable>
            <input value="<?php echo $product_keywords ?>" type="text" id="product_keywords" name="product_keywords"
                class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto mt-4">
            <label for="product_category" class="form-label">Danh Mục</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title ?>"> <?php echo $category_title ?></option>
                <?php
                        $select_category_all = " select * from `categories`";
                        $stmt = $conn->prepare($select_category_all);
                        $stmt ->execute();
                        while($row_category_all = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $category_title = $row_category_all['category_title'];
                            $category_id = $row_category_all['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto mt-4">
            <label for="product_category" class="form-label">Nhãn Hàng</label>
            <select name="product_brands" id="" class="form-select">
                <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
                <?php
                        $select_brand_all = " select * from `brands`";
                        $stmt = $conn->prepare($select_brand_all);
                        $stmt ->execute();
                        while($row_brand_all = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $brand_title = $row_brand_all['brand_title'];
                            $brand_id = $row_brand_all['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4 mt-4">
            <label for="product_image1" class="form-label">Ảnh 1</label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto"
                    required="required">
                <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="edit_image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Ảnh 2</label>
            <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto"
                    required="required">
                <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="edit_image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Ảnh 3</label>
            <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto"
                    required="required">
                <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="edit_image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto">
            <lable for="product_price" class="form-label">Giá</lable>
            <input value="<?php echo $product_price?>" type="text" id="product_price" name="product_price"
                class="form-control" required="required">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Cập nhật" class="btn btn-info mb-3 px-3 mt-4">
        </div>
    </form>
</div>
<!-- editing products -->
<?php
global $conn;
    if(isset($_POST['edit_product'])){

        $product_title = htmlspecialchars($_POST['product_title']);
        $description = htmlspecialchars($_POST['product_description']);
        $product_keywords = htmlspecialchars($_POST['product_keywords']);
        $product_category= htmlspecialchars($_POST['product_category']);
        $product_brands = htmlspecialchars($_POST['product_brands']);
        $product_price = htmlspecialchars(number_format($_POST['product_price']));
        
        //accessing images
        $product_image1 = htmlspecialchars($_FILES['product_image1']['name']);
        $product_image2 = htmlspecialchars($_FILES['product_image2']['name']);
        $product_image3 = htmlspecialchars($_FILES['product_image3']['name']);
    
        //accessing image tmp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];
    
        //checking empty
        if(empty($product_title) or empty($description) or empty($product_keywords) or 
        empty($product_category) or empty($product_brands) or empty($product_price) or
        empty($product_image1)  or empty($product_image2) or empty($product_image3)){
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");
    
            //update query
            $update_product="update `products` set
            product_title=?,
            product_description=?,
            product_keywords=?,
            category_id = ?,
            brand_id=?, 
            product_image1=?,
            product_image2=?,
            product_image3=?,
            product_price=?,date=NOW() where product_id=?";
            $stmt = $conn->prepare($update_product);
            $result_update = $stmt->execute([$product_title,$description,$product_keywords,$product_category,$product_brands,$product_image1,$product_image2,$product_image3,$product_price,$edit_id]);
            if($result_update){
                echo "<script>alert('Cập nhật thành công!')</script>";
                echo "<script>window.open('index.php?view_products','_self')</script>";
            }
        }
    }
    ?>
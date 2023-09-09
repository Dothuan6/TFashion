<div class="container mt-3">
    <h1 class="text-center text-dark">Thêm sản phẩm</h1>
    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data">
        <!--product title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Tên sản phẩm</label>
            <input type="text" name="product_title" id="product_title" class="form-control"
                placeholder="Nhập vào tên sản phẩm..." autocomplete="off" required="required">
        </div>

        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto mt-2">
            <label for="description" class="form-label mt-2">Mô tả sản phẩm</label>
            <input type="text" name="description" id="description" class="form-control"
                placeholder="Nhập vào mô tả sản phẩm..." autocomplete="off" required="required">
        </div>

        <!-- Keywords -->

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label mt-2">Từ khóa</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                placeholder="Nhập vào từ khóa..." autocomplete="off" required="required">
        </div>

        <!-- categories  -->
        <div class="py-2 mt-2">
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Chọn danh mục</option>
                    <?php
                        $select_query = " select *from `categories`";
                        $result_query = mysqli_query($con,$select_query);
                        while($row = mysqli_fetch_assoc($result_query)){
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <!-- brands  -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brand" id="" class="form-select">
                <option value="">Chọn nhãn hàng</option>
                <?php
                        $select_query = " select *from `brands`";
                        $result_query = mysqli_query($con,$select_query);
                        while($row = mysqli_fetch_assoc($result_query)){
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>

            </select>
        </div>

        <!-- image 1 -->
        <div class="py-2">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Ảnh 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" quired="required">
            </div>
        </div>
        <!-- image 2 -->
        <div class="py-2">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Ảnh 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" quired="required">
            </div>
        </div>
        <!-- image3 -->
        <div class="py-2">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-labe">Ảnh 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" quired="required">
            </div>
        </div>
        <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Giá tiền</label>
            <input type="text" name="product_price" id="product_price" class="form-control"
                placeholder="Nhập vào giá tiền..." autocomplete="off" required="required">
        </div>

        <!-- submit -->
        <div class="py-3">
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Thêm sản phẩm">
            </div>
        </div>
    </form>
</div>
<?php
    if(isset($_POST['insert_product'])){
        $product_title = $_POST['product_title'];
        $description = $_POST['description'];
        $product_keywords = $_POST['product_keywords'];
        $product_category= $_POST['product_category'];
        $product_brand = $_POST['product_brand'];
        $product_price = number_format($_POST['product_price']);
        $product_status = 'true';
        
        //accessing images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];
    
        //accessing image tmp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];
    
      // check product exist
      $select_products = "select * from `products` where product_title = '$product_title'";
      $result_products=mysqli_query($con,$select_products);
      $row_products=mysqli_num_rows($result_products);  
      if($row_products==0){
        //checking empty
        if(empty($product_title) or empty($description) or empty($product_keywords) or 
        empty($product_category) or empty($product_brand) or empty($product_price) or
        empty($product_image1)  or empty($product_image2) or empty($product_image3)){
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");
    
            //insert query
            $insert_products = "insert into `products` (product_title,product_description,
            product_keywords,category_id,
            brand_id,product_image1,
            product_image2,product_image3,
            product_price,date,status) values ('$product_title','$description',
            '$product_keywords',
            '$product_category',
            '$product_brand',
            '$product_image1',
            '$product_image2',
            '$product_image3',
            '$product_price',NOW(),'$product_status')";
             $result_query = mysqli_query($con,$insert_products);
            if($result_query){  
                echo "<script>alert('Thêm sản phẩm thành công!')</script>";
                echo "<script>window.open('./index.php?view_products','self')</script>";

            }
        }
    }else{
        echo "<script>alert('Sản phẩm đã tồn tại!!')</script>";
    }
}
    ?>
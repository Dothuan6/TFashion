<?php
    include("../includes/connect.php");
    global $conn;
    if(isset($_POST["insert_cat"])){
        $category_title=htmlspecialchars($_POST["cat_title"]);

        //select data from database
        $select_query = "select *from `categories` where category_title=?";
        $stmt = $conn->prepare($select_query);
        $stmt->execute([$category_title]);
        $numver = $stmt->rowCount();
        if($numver>0){
            echo "<script>alert('Danh mục này đã có trong kho')</script>";

        }else{
            $insert_query="insert into `categories` (category_title) value(?)";
            $stmt = $conn->prepare($insert_query);
            $result = $stmt->execute([$category_title]);
            if($result){
                echo"<script>alert('Danh mục đã được thêm thành công!')</script>";
        }

        }
    }
?>


<h2 class="text-center">Thêm Danh Mục</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Nhập vào tên danh mục"
            aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info p-2 my-3 border-0" name="insert_cat" value="Thêm vào kho">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Categories</button> -->
    </div>
</form>
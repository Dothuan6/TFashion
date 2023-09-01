<?php
    include("../includes/connect.php");
    if(isset($_POST["insert_brand"])){
        $brand_title=$_POST["brand_title"];

        //select data from database
        $select_query = "select *from `brands` where brand_title='{$brand_title}'";
        $result_select = mysqli_query($con,$select_query);
        $numver = mysqli_num_rows($result_select);
        if($numver>0){
            echo "<script>alert('Nhãn hàng đã có trong kho')</script>";

        }else{

            $insert_query="insert into `brands` (brand_title) value('$brand_title')";
            $result = mysqli_query($con,$insert_query);
            if($result){
                echo"<script>alert('Thêm thành công!')</script>";
        }

        }
    }
?>
<h2 class="text-center">Thêm Nhãn Hàng</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control"
  name="brand_title"
  placeholder="Nhập vào tên nhãn hàng" 
  aria-label="brands" 
  aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
         <input type="submit" class="p-2 my-3 border-0 bg-info" 
        name="insert_brand"
        value="Thêm vào kho">
        </div>
</form>
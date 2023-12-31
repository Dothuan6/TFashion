<h3 class="text-center text-dark mb-3">Tất cả sản phẩm</h3>
<div>
    <a href="index.php?insert_products"><button class="btn btn-outline btn-info py-2">Thêm <i
                class="fa fa-plus"></i></button></a>
</div>
<table class="table table-bordered mt-3 text-center">
    <thead>
        <tr>
            <th class="bg-info">STT</th>
            <th class="bg-info">Tên Sản Phẩm</th>
            <th class="bg-info">Hình Ảnh</th>
            <th class="bg-info">Giá</th>
            <th class="bg-info">Số Lượng Bán</th>
            <th class="bg-info">Trạng Thái</th>
            <th class="bg-info">Chỉnh Sửa</th>
            <th class="bg-info">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        global $conn;
        $get_products="select * from `products`";
        $stmt = $conn->prepare($get_products);
        $stmt->execute();
        $number=0;
        
        $row = $stmt->fetchAll();
            foreach($row as $row){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image2=$row['product_image2'];
            $product_price=$row['product_price'];
            $product_status=$row['status'];
            if($row['status']=='true'){
              $product_status ='Còn hàng';  
        $number++;
        $get_count="select * from `orders_pending` where product_id=?";
        $stmt = $conn->prepare($get_count);
        $stmt->execute([$product_id]);
        $row_count=$stmt->rowCount();
        ?>

        <tr>
            <td class='bg-secondary text-light'><?php echo $number ?></td>
            <td class='bg-secondary text-light'><?php echo $product_title ?></td>
            <td class='bg-secondary text-light img'><img src='./product_images/<?php echo $product_image2 ?>'
                    class='product_images shadow'></td>
            <td class='bg-secondary text-light'><?php echo "$product_price VND" ?></td>
            <td class='bg-secondary text-light'><?php echo $row_count ?></td>
            <td class='bg-secondary text-light'><?php echo $product_status ?></td>
            <td class='bg-secondary text-light text-center'><a class='text-light'
                    href='index.php?edit_products=<?php echo $product_id ?>'><i class='fa-solid
                     fa-pen-to-square'></i></a></td>
            <td class='bg-secondary text-light'><a onclick='return confirm("Bạn chắn chắn muốn xóa sản phẩm này?")'
                    type='button' class='btn text-light' class='text-light'
                    href='index.php?delete_products=<?php echo $product_id ?>'><i class='fa-solid
            fa-trash'></i></a></td>
        </tr>
    </tbody>
    <?php
     }        
    }
?>
</table>
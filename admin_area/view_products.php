<h3 class="text-center text-dark">Tất cả sản phẩm</h3>
<table class="table table-bordered mt-5 text-center">
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
        $get_products="select * from `products`";
        $result = mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image2=$row['product_image2'];
            $product_price=$row['product_price'];
            $product_status=$row['status'];
            if($row['status']=='true'){
              $product_status ='Còn hàng';
            }
            $number++;
            $get_count="select * from `orders_pending` where product_id=$product_id";
            $result_count=mysqli_query($con,$get_count);
            $row_count=mysqli_num_rows($result_count);
            echo "<tr><td class='bg-secondary text-light'>$number</td>
            <td  class='bg-secondary text-light'>$product_title</td>
            <td  class='bg-secondary text-light img'><img src='./product_images/$product_image2' class='product_images'></td>
            <td  class='bg-secondary text-light'>$product_price VND</td>
            <td  class='bg-secondary text-light'> $row_count</td>
            <td  class='bg-secondary text-light'>$product_status</td>
            <td  class='bg-secondary text-light text-center'><a class='text-light' 
            href='index.php?edit_products=$product_id'><i class='fa-solid
            fa-pen-to-square'></i></a></td>
            <td  class='bg-secondary text-light'><a type='button' class='btn text-light' 
            data-bs-toggle='modal' data-bs-target='#exampleModal' class='text-light'
             href='index.php?delete_products=$product_id'><i class='fa-solid
            fa-trash'></i></a></td></tr>";
        }
    ?>
    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Bạn chắc chắn muốn xóa sản phẩm này?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <a class="text-decoration-none text-light" href="./index.php?view_products">Không</a></button>
                <button type="button" class="btn btn-primary">
                    <a href="index.php?delete_products=<?php echo $product_id ?>"
                        class="text-light text-decoration-none">Có</a></button>
            </div>
        </div>
    </div>
</div>
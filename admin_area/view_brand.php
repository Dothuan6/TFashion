<h3 class="text-center text-dark">Tất Cả Nhãn Hàng</h3>
<table class="table table-bordered mt-5 text-center">
    <thead>
        <tr>
            <th class="bg-info">STT</th>
            <th class="bg-info">Tên Nhãn Hàng</th>
            <th class="bg-info">Chỉnh Sửa</th>
            <th class="bg-info">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_products="select * from `brands`";
        $result = mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $number++;      
            $brand_title=$row['brand_title'];
            $brand_id=$row['brand_id'];
            ?>
        <tr>
            <td class='bg-secondary text-light'><?php echo $number ?></td>
            <td class='bg-secondary text-light'><?php echo $brand_title ?></td>
            <td class='bg-secondary text-light text-center'><a class='text-light'
                    href='index.php?edit_brand=$brand_id'><i class='fa-solid
            fa-pen-to-square'></i></a></td>
            <td class='bg-secondary text-light'><a href='index.php?delete_brand=<?php echo $brand_id ?>' type='button'
                    class='btn text-light' onclick='return confirm("Bạn chắn chắn muốn xóa sản phẩm này?")'>
                    <i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
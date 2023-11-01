<h3 class="text-center text-dark py-2">Tất Cả Danh Mục</h3>
<table class="table table-bordered mt-5 text-center">
    <thead>
        <tr>
            <th class="bg-info">STT</th>
            <th class="bg-info">Tên Danh Mục</th>
            <th class="bg-info">Chỉnh Sửa</th>
            <th class="bg-info">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        global $conn;
        $get_products="select * from `categories`";
        $stmt = $conn->prepare($get_products);
        $stmt->execute();
        $number=0;
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $number++;      
            $category_title=$row['category_title'];
            $category_id=$row['category_id'];
            ?>

        <tr>
            <td class='bg-secondary text-light'><?php echo $number ?></td>
            <td class='bg-secondary text-light'><?php echo $category_title ?></td>
            <td class='bg-secondary text-light text-center'><a class='text-light'
                    href='index.php?edit_category=<?php echo $category_id ?>'><i class='fa-solid
            fa-pen-to-square'></i></a></td>
            <td class='bg-secondary text-light'><a onclick='return confirm("Bạn chắn chắn muốn xóa sản phẩm này?")'
                    class='text-light' href='index.php?delete_category=<?php echo $category_id ?> '><i class='fa-solid
            fa-trash'></i></a></td>
        </tr>
        <?php 
        }
        ?>
    </tbody>
</table>
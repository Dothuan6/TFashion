
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
        $get_products="select * from `categories`";
        $result = mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $number++;      
            $category_title=$row['category_title'];
            $category_id=$row['category_id'];
            echo "<tr><td class='bg-secondary text-light'>$number</td>
            <td  class='bg-secondary text-light'>$category_title</td>
            <td  class='bg-secondary text-light text-center'><a class='text-light' 
            href='index.php?edit_category=$category_id'><i class='fa-solid
            fa-pen-to-square'></i></a></td>
            <td  class='bg-secondary text-light'><a data-bs-toggle='modal' data-bs-target='#exampleModal' class='text-light'
             href='index.php?delete_category=$category_id'><i class='fa-solid
            fa-trash'></i></a></td>
            </tr>";
        }
    ?>
    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Bạn chắc chắn muốn xóa danh mục này chứ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <a class="text-decoration-none text-light" href="./index.php?view_category">Không</a></button>
        <button type="button" class="btn btn-primary">
            <a href="index.php?delete_category=<?php echo $category_id ?>"
             class="text-light text-decoration-none">Có</a></button>
      </div>
    </div>
  </div>
</div>
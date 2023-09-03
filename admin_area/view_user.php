<h3 class="text-center">Các Khách Hàng</h3>
<table class="table table-bordered mt-5">
    <?php
    $get_users="select * from `user_table`";
    $result_users=mysqli_query($con,$get_users);
    if(mysqli_num_rows($result_users)==0){
        echo "<div class='alert alert-success' role='alert'>
        Chưa có người dùng nào đăng ký!
      </div>";
    }else{
    echo"
    <thead>
        <tr>
            <th class='bg-info text-center'>STT</th>
            <th class='bg-info text-center'>Tên</th>
            <th class='bg-info text-center'>Địa Chỉ Email</th>
            <th class='bg-info text-center'>Hình Ảnh</th>
            <th class='bg-info text-center'>Địa Chỉ</th>
            <th class='bg-info text-center'>Số Điện Thoại</th>
            <th class='bg-info text-center'>Xóa</th>
        </tr>
    </thead>
    <tbody>";
        
         $get_users="select * from `user_table`";
         $result_users=mysqli_query($con,$get_users);
         $number=0;
        $row_count=mysqli_num_rows($result_users);
        if($row_count==0){
            echo "<script>alert('Không có người dùng nào')</script>";
           
        }else{
            while($row_data=mysqli_fetch_assoc($result_users)){
                $user_id = $row_data['user_id'];
                $usernamer=$row_data['username'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $number++;
            echo "<tr>
            <td class='text-center text-light bg-secondary'>$number</td>
            <td class='text-center text-light bg-secondary'>$usernamer</td>
            <td class='text-center text-light bg-secondary'>$user_email</td>
            <td  class='bg-secondary text-light'><img src='../user_area/user_images/$user_image' class='user_images'></td>
            <td class='text-center text-light bg-secondary'>$user_address</td>
            <td class='text-center text-light bg-secondary'>$user_mobile</td>
            <td  class='bg-secondary text-light text-center'><a data-bs-toggle='modal' data-bs-target='#exampleModal' 
            href='./index.php?delete_users=$user_id'>
            <i class='fa-solid fa-trash text-light'></i></a></td>
        </tr></tbody>";
               
        }
    }
}
?>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Bạn chắc chắn muốn xóa người dùng này?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <a class="text-decoration-none text-light" href="./index.php?view_users">Không</a></button>
                <button type="button" class="btn btn-primary">
                    <a href="./index.php?delete_users=<?php echo $user_id ?>"
                        class="text-light text-decoration-none">Có</a></button>
            </div>
        </div>
    </div>
</div>
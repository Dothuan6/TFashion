<h3 class="text-center">Các Khách Hàng</h3>
<table class="table table-bordered mt-5">
    <?php
    global $conn;
    $get_users="select * from `user_table`";
    $stmt = $conn->prepare($get_users);
    $stmt->execute();
    if($stmt->rowCount()==0){
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
         $stmt = $conn->prepare($get_users);
         $stmt->execute();
         $number=0;
        $row_count=$stmt->rowCount();
        if($row_count==0){
            echo "<script>alert('Không có người dùng nào')</script>";
           
        }else{
            while($row_data=$stmt->fetch(PDO::FETCH_ASSOC)){
                $user_id = $row_data['user_id'];
                $usernamer=$row_data['username'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $number++;
                ?>

    <tr>
        <td class='text-center text-light bg-secondary'><?php echo $number ?></td>
        <td class='text-center text-light bg-secondary'><?php echo $usernamer ?></td>
        <td class='text-center text-light bg-secondary'><?php echo $user_email ?></td>
        <td class='bg-secondary text-light text-center'><img src='../user_area/user_images/<?php echo $user_image ?>'
                class='user_images shadow'></td>
        <td class='text-center text-light bg-secondary'><?php echo $user_address ?></td>
        <td class='text-center text-light bg-secondary'><?php echo $user_mobile ?></td>
        <td class='bg-secondary text-light text-center'><a
                onclick='return confirm("Bạn chắn chắn muốn xóa người dùng này?")'
                href='./index.php?delete_users=<?php echo $user_id ?>'>
                <i class='fa-solid fa-trash text-light'></i></a></td>
    </tr>
    </tbody>
    <?php 
    }
    }
    }
    ?>
</table>
<h3 class="text-center">Các Thanh Toán</h3>
<table class="table table-bordered mt-5">
    <?php
echo"
    <thead>
        <tr>
            <th class='bg-info text-center'>STT</th>
            <th class='bg-info text-center'>Số Hóa Đơn</th>
            <th class='bg-info text-center'>Giá</th>
            <th class='bg-info text-center'>Chế Độ</th>
            <th class='bg-info text-center'>Ngày Đặt</th>
            <th class='bg-info text-center'>Xóa</th>
        </tr>
    </thead>
    <tbody>";
    ?>
    <?php
    $get_payments="select * from `user_payments`";
    $result_payments=mysqli_query($con,$get_payments);
    $number=0;
    $row_count=mysqli_num_rows($result_payments);
    if($row_count==0){
    echo "<script>
    alert('Không có thanh toán trước đó!')
    </script>";
    }else{
    while($row_data=mysqli_fetch_assoc($result_payments)){
    $payment_id = $row_data['payment_id'];
    $invoice_number=$row_data['invoice_number'];
    $amount=number_format($row_data['amount'],3);
    $payment_mode=$row_data['payment_mode'];
    $payment_date=$row_data['date'];
    $number++;
    ?>
    <tr>
        <td class='text-center text-light bg-secondary'><?php echo $number ?></td>
        <td class='text-center text-light bg-secondary'><?php echo $invoice_number ?></td>
        <td class='text-center text-light bg-secondary'><?php echo "$amount VND"?></td>
        <td class='text-center text-light bg-secondary'><?php echo $payment_mode ?></td>
        <td class='text-center text-light bg-secondary'><?php echo $payment_date ?></td>
        <td class='bg-secondary text-light text-center'><a
                onclick='return confirm("Bạn chắn chắn muốn xóa thanh toán này?")'
                href=' ./index.php?delete_payments=<?php echo $payment_id ?>'>
                <i class='fa-solid fa-trash text-light'></i></a></td>
    </tr>
    <?php 
    }
    }
    ?>
    </tbody>

</table>
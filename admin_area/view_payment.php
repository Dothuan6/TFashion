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
        
         $get_payments="select * from `user_payments`";
         $result_payments=mysqli_query($con,$get_payments);
         $number=0;
        $row_count=mysqli_num_rows($result_payments);
        if($row_count==0){
            echo "<script>alert('Không có thanh toán trước đó!')</script>";
        }else{
            while($row_data=mysqli_fetch_assoc($result_payments)){
                $payment_id = $row_data['payment_id'];
                $invoice_number=$row_data['invoice_number'];
                $amount=$row_data['amount'];
                $payment_mode=$row_data['payment_mode'];
                $payment_date=$row_data['date'];
                $number++;
            echo "<tr>
            <td class='text-center text-light bg-secondary'>$number</td>
            <td class='text-center text-light bg-secondary'>$invoice_number</td>
            <td class='text-center text-light bg-secondary'>$amount VND</td>
            <td class='text-center text-light bg-secondary'>$payment_mode</td>
            <td class='text-center text-light bg-secondary'>$payment_date</td>
            <td  class='bg-secondary text-light text-center'><a data-bs-toggle='modal' data-bs-target='#exampleModal' 
            href='./index.php?delete_payments=$payment_id'>
            <i class='fa-solid fa-trash text-light'></i></a></td>
        </tr></tbody>";
               
        }
    }
?>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Bạn chắc chắn muốn xóa thanh toán này?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <a class="text-decoration-none text-light" href="./index.php?view_payments">Không</a></button>
                <button type="button" class="btn btn-primary">
                    <a href="./index.php?delete_payments=<?php echo $payment_id ?>"
                        class="text-light text-decoration-none">Có</a></button>
            </div>
        </div>
    </div>
</div>
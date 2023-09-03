<h3 class="text-center">Các đơn hàng</h3>
<table class="table table-bordered mt-5 text-center">
    <thead>
        <?php
        $get_orders="select * from `user_orders`";
        $result_orders=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result_orders);
        if($row_count>0){
        echo " <tr>
        <th  class='bg-info'>STT</th>
        <th  class='bg-info'>Giá SP</th>
        <th  class='bg-info'>Số Hóa Đơn</th>
        <th  class='bg-info'>Số Lượng</th>
        <th  class='bg-info'>Ngày Đặt</th>
        <th  class='bg-info'>Trạng Thái</th>
        <th  class='bg-info'>Xóa</th>
        </tr>   </thead> <tbody>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_data['order_id'];
            $user_id=$row_data['user_id'];
            $amount_due=$row_data['amount_due'];
            $invoice_number=$row_data['invoice_number'];
            $total_products=$row_data['total_products'];
            $order_date=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            $number++;
            echo "
            <tr>
             <td class='text-light bg-secondary'>$number</td>
             <td class='text-light bg-secondary'>$amount_due VND</td>
             <td class='text-light bg-secondary'>$invoice_number</td>
             <td class='text-light bg-secondary'>$total_products</td>
             <td class='text-light bg-secondary'>$order_date</td>
             <td class='text-light bg-secondary'>$order_status</td>
             <td  class='bg-secondary text-light'><a data-bs-toggle='modal' data-bs-target='#exampleModal' href='./index.php?delete_orders=$invoice_number'>
            <i class='fa-solid fa-trash text-light'></i></a></td>
            </tr>";
        }
    }
        else{
            echo "<div class='alert alert-success' role='alert'>
            Không có đơn đặt hàng nào gần đây!
          </div>";
        }   
        ?>
        </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Bạn chắc chắn muốn xóa đơn hàng này?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <a class="text-decoration-none text-light" href="./index.php?view_orders">Không</a></button>
                <button type="button" class="btn btn-primary">
                    <a href="index.php?delete_orders=<?php echo $invoice_number ?>"
                        class="text-light text-decoration-none">Có</a></button>
            </div>
        </div>
    </div>
</div>
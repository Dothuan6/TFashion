<?php
  include_once("../includes/connect.php");
  include_once('../functions/common_function.php');
  @session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của tôi</title>
    <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- font aware cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css style link -->
    <link rel="stylesheet" href="./style.css">

</head>
<style>
.btn {
    transition: transform 0.3s ease-in-out !important;
    transition-timing-function: ease !important;
    transition-delay: 0s !important;
}

.btn:hover {
    transform: translateY(-10px);
}

.nav-link {
    transition: transform 0.3s ease-in-out !important;
    transition-timing-function: ease !important;
    transition-delay: 0s !important;
}

.nav-link:hover {
    transform: translateY(-10px);
}
</style>

<body>
    <?php
    global $conn;
    $username = $_SESSION['username'];
    $get_user="select * from `user_table` where username=?";
    $stmt = $conn->prepare($get_user);
    $stmt->execute([$username]);
    $row_fetch=$stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $row_fetch['user_id'];
    ?>
    <h3 class="text-dark mt-3">Các đơn hàng của tôi</h3>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th class="bg-dark text-light">STT</th>
                <th class="bg-dark text-light">Tổng tiền đơn hàng</th>
                <th class="bg-dark text-light">Số sản phẩm</th>
                <th class="bg-dark text-light">Mã hóa đơn</th>
                <th class="bg-dark text-light">Ngày đặt</th>
                <th class="bg-dark text-light">Hoàn thành/Chưa hoàn thành</th>
                <th class="bg-dark text-light">Trạng thái</th>
                <!-- <th class="bg-dark text-light">Đánh giá</th> -->

            </tr>
        </thead>
        <tbody>
            <?php
            global $conn;
            $number=0;
            $get_order_details = "select * from `user_orders` where user_id=?";
            $stmt = $conn->prepare($get_order_details);
            $stmt -> execute([$user_id]);
            while($row_orders= $stmt->fetch(PDO::FETCH_ASSOC)){
                
                $order_id = $row_orders['order_id'];
                $amount_due=number_format($row_orders['amount_due'],3);
                $total_products = $row_orders['total_products'];
                $invoice_number=$row_orders['invoice_number'];
                $order_status = $row_orders['order_status'];
                if($order_status=='Chờ xác nhận'){
                    $order_status='Chưa hoàn thành';
                }else{
                    $order_status='Hoàn thành';
                }
                $order_date = $row_orders['order_date'];
                $number += 1;
                echo "<tr>
                <td class='bg-light text-dark'>$number</td>
                <td class='bg-light text-dark'>$amount_due VND</td>
                <td class='bg-light text-dark'>$total_products</td>
                <td class='bg-light text-dark'>$invoice_number</td>
                <td class='bg-light text-dark'>$order_date</td>
                <td class='bg-light text-dark'>$order_status</td>";
                ?>
            <?php
                if($order_status=='Hoàn thành'){
                    echo "<td class='bg-secondary text-light'>Đã xác nhận</td>";
                }else{
                  echo "<td class='bg-secondary text-light'>
                    <a class='text-light' href='confirm_payment.php?order_id=$order_id'>xác nhận</a></td>
                    </tr>";
                }
            }
             ?>

        </tbody>
    </table>
</body>

</html>
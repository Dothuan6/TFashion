<?php
  include_once("../includes/connect.php");
  include_once('../functions/common_function.php');
  @session_start();
  if(isset($_GET['order_id'])){
    $order_id= $_GET['order_id'];
    $select_data="select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=number_format($row_fetch['amount_due'],3);
  }
  if(isset($_POST['confirm_payments'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `user_payments` (order_id,invoice_number,amount,payment_mode,date) values ($order_id,$invoice_number,$amount,'$payment_mode',NOW())";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<div class='alert alert-success' role='alert'>
        Xác nhận lại đơn hàng thành công!
      </div>";
        echo "<script>window.open('user_profile.php?my_orders','_self')</script>";
    }
    $update_orders="update `user_orders` set order_status='Hoàn thành' where order_id = $order_id";
    $result_query=mysqli_query($con,$update_orders);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Trả</title>
    <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    body {
        background-image: url(../images/payment5.png);
    }
    </style>
</head>

<body>
    <h1 class="text-center text-light py-3">Xác nhận thanh toán</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input value="<?php echo $invoice_number ?>" placeholder="Số hóa đơn" type="text"
                    class="form-control w-50 m-auto" name="invoice_number">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Số tiền</label>
                <input value="<?php echo $amount_due ?>" type="text" class="form-control w-50 m-auto" name="amount">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Chọn chế độ thanh toán</optione>
                    <option>Zalo Pay</option>
                    <option>VietinBank</option>
                    <option>MoMo</option>
                    <option>TFashionShop Pay</option>
                    <option>Thanh toán khi nhận hàng</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-warning py-2 px-3 border-2 shadow" style="border-radius: 7px;"
                    value="Xác nhận" name="confirm_payments">
            </div>
        </form>
    </div>

</body>

</html>
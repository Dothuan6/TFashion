<?php
   include("../includes/connect.php");
   include_once('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- css link bstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">
</head>
<style>
    img{
        width: 90%;
        margin: auto;
        display: block;
    }
</style>
<body>
     <!--php access user id  -->
     <?php
     global $con;
        $user_ip=getIPAddress();
        $get_user = "select * from `user_table` where user_ip='$user_ip'";
        $result=mysqli_query($con,$get_user);
        $run_query=mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];
    // if($user_id==''){
    //     echo "<script>alert('have not an account')</script>";
    //     echo "<script>window.open('user_reg.php'.'_self')</script>";
    // }
    ?>
    <div class="container w-50 m-auto">
        <h2 class="text-center">Phương thức thanh toán</h2>
        <div class="my-5 row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
            <a href="http://www.paypal.com" target="_plank">
            <img src="../images/payment.avif" alt="payment"></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>" target="_plank"><h2 class="text-center">Thanh toán khi nhận hàng</h2></a>
            </div>
        </div>
    </div>
</body>
</html>
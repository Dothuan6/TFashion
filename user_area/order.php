<?php 
include_once('../includes/connect.php');
include_once('../functions/common_function.php');
global $conn;
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}
    // getting total items and total price of all items
$get_ip_address=getIPAddress();
$total_price=0;
$cart_query_price="select * from `cart_details` where ip_address=?";
$stmt = $conn->prepare($cart_query_price);
$result_cart_price=$stmt->execute([$get_ip_address]);
$invoice_number=mt_rand();
$status='Chờ xác nhận';
$count_products=$stmt->rowCount();
while($row_price=$stmt->fetch()){
    $product_id=$row_price['product_id'];
    $select_product="select *from `products` where product_id=?";
    $stmt = $conn->prepare($select_product);
   $run_price= $stmt->execute([$product_id]);
   while($row_product_price=$stmt->fetch()){
    $product_price=array($row_product_price['product_price']);
    $product_values=array_sum($product_price);
    $total_price+=$product_values;
   }
}
//get quantity from cart
$get_cart="select * from `cart_details` ";
$stmt = $conn->prepare($get_cart);
$stmt->execute();
$get_item_quantity=$stmt->fetch();
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}else{
    
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}
$time =time();
$datetimeinfo = getdate($time);
$insert_order="insert into `user_orders` (user_id,amount_due,invoice_number,total_products,order_date,order_status) 
values (?,?,?,?,now(),?)";
$stmt = $conn->prepare($insert_order);
$result_query = $stmt->execute([$user_id,$subtotal,$invoice_number,$count_products,$status]);
if($result_query){
    echo "<script>alert('Bạn đã đặt hàng thành công!')</script>";
    echo "<script>window.open('user_profile.php','_self')</script>";
}
//order pending
$insert_pending_order="insert into `orders_pending` (user_id,invoice_number,product_id,quantity,order_status) 
values (?,?,?,?,?)";
$stmt = $conn->prepare($insert_pending_order);
$stmt ->execute([$user_id,$invoice_number,$product_id,$quantity,$status]);

//delete items from cart
$empty_cart = "delete from `cart_details` where ip_address = ?";
$stmt = $conn->prepare($empty_cart);
$stmt->execute([$get_ip_address]);
?>
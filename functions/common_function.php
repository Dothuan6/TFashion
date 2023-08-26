<?php
// displaying products
function getproducts(){
    global $con;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query = "select * from `products` order by rand() LIMIT 0,3";
    $result_query = mysqli_query($con,$select_query);
    // $row = mysqli_fetch_assoc($result_query);
    while($row = mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      // $product_keywords = $row['product_keywords'];
      $product_image2 = $row['product_image2'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
                <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text'>Giá: {$product_price}K</p>
                  <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
                  <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>Xem chi tiết</a>
                </div>
      </div>
  </div>";
    }
}
}
}

// getting unique categories

function get_unique_categories(){
    global $con;
    if(isset($_GET['category'])){
    $category_id = $_GET['category'];
    $select_query = "select * from `products` where category_id = $category_id";
    $result_query = mysqli_query($con,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "<div class='alert alert-warning' role='alert'>
      Không có nhãn hàng nào được tìm thấy!
    </div>";
    }
    while($row = mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image2 = $row['product_image2'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
                <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text'>Giá: {$product_price}K</p>
                  <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
                  <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>Xem chi tiết</a>
                </div>
      </div>
  </div>";
    }   
}
}

// displaying brands in sidenav
function getbrands(){
    global $con;
    $select_brands = "select * from `brands`";
        $result_brands = mysqli_query($con,$select_brands);
        while($row_data = mysqli_fetch_assoc($result_brands)){
          $brand_title = $row_data['brand_title'];
          $brand_id = $row_data['brand_id'];
          echo "<li>
          <a href='homepage.php?brand=$brand_id' class='nav-link text-seccondary'>$brand_title</a>
        </li><hr class='sidebar-divider'>";
        }
}
// getting unique brands

function get_unique_brands(){
    global $con;
    if(isset($_GET['brand'])){
    $brand_id = $_GET['brand'];
    $select_query = "select * from `products` where brand_id = $brand_id";
    $result_query = mysqli_query($con,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "<div class='alert alert-warning' role='alert'>
      Không có nhãn hàng nào được tìm thấy!
    </div>";
    }
    while($row = mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image2 = $row['product_image2'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
                <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text'>Giá: {$product_price}K</p>
                  <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
                  <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>Xem chi tiết</a>
                </div>
      </div>
  </div>";
    }   
}
}


//displaying categories in sidenav
function getcategories(){
    global $con;
    $select_categories = "select *from `categories`";
    $result_categories= mysqli_query($con,$select_categories);       
     // $row_data = mysqli_fetch_assoc($result_brands);
    while($row_data = mysqli_fetch_assoc($result_categories)){
      $category_title = $row_data['category_title'];
      $category_id = $row_data['category_id'];
      echo "<li class='nav-item'>
      <a href='homepage.php?category=$category_id' class='nav-link text-secondary'>$category_title</a>
    </li> <hr class='sidebar-divider'>";
    }
}


//searching product
function search_products(){
    global $con;
    $search_data_value = $_GET['search_data'];
    $search_query = "select *from `products` where product_keywords like '%$search_data_value%'";
    $result_query = mysqli_query($con,$search_query);
    $row_search = mysqli_num_rows($result_query);
    if($row_search == 0){
      echo "<div class='alert alert-warning' role='alert'>
      Không có sản phẩm nào được tìm thấy!
    </div>";
    }
    while($row = mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image2 = $row['product_image2'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
                <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text'>Giá: {$product_price}K</p>
                  <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
                  <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>Xem chi tiết</a>
                </div>
      </div>
  </div>";
    }
}

// get all products
function get_allproducts(){
  global $con;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query = "select * from `products` order by rand()";
    $result_query = mysqli_query($con,$select_query);
    // $row = mysqli_fetch_assoc($result_query);
    while($row = mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      // $product_keywords = $row['product_keywords'];
      $product_image2 = $row['product_image2'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
                <div class='card-body'> 
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text'>Giá: {$product_price}K</p>
                  <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
                  <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>Xem chi tiết</a>
                </div>
      </div>
  </div>";
    }
}
}
}

//view detail 
function view_details(){
  global $con;
  if(isset($_GET['product_id'])){
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
        $product_id = $_GET['product_id'];
  $select_query = "select * from `products` where product_id = $product_id";
  $result_query = mysqli_query($con,$select_query);
  while($row = mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
              <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
              <div class='card-body'>
               <h5 class='card-title'>$product_title</h5>
                <p class='card-text'> $product_description</p>
                <p class='card-text'>Giá: {$product_price}K</p>
                <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
                <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>Quay về</a>

              </div>
    </div>
</div>
<div class='col-md-8'>
<!-- related images -->
<div class='row'>
    <div class='col-md-12'>
        <h3 class='text-center text-info'>Thông tin chi tiết</h3>
    </div>
    <div class='col-md-4'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top img-fluid border border-2'
     alt='$product_title'>
     <img src='./admin_area/product_images/$product_image3' class='card-img-top img-fluid py-2 border border-2'
     alt='$product_title'>
    </div>
    <div class='col-md-6'>
      
    <div class='accordion' id='accordionPanelsStayOpenExample'>
    <div class='accordion-item'>
      <h2 class='accordion-header'>
        <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapseOne' aria-expanded='true' aria-controls='panelsStayOpen-collapseOne'>
          Sản phẩm có được bảo hành không?
        </button>
      </h2>
      <div id='panelsStayOpen-collapseOne' class='accordion-collapse collapse show'>
        <div class='accordion-body'>
          <code>Có</code>
        </div>
      </div>
    </div>
    <div class='accordion-item'>
      <h2 class='accordion-header'>
        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapseTwo' aria-expanded='false' aria-controls='panelsStayOpen-collapseTwo'>
          Thời gian bản hành
        </button>
      </h2>
      <div id='panelsStayOpen-collapseTwo' class='accordion-collapse collapse'>
        <div class='accordion-body'>
        <code>12 tháng</code>
        </div>
      </div>
    </div>
    <div class='accordion-item'>
      <h2 class='accordion-header'>
        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapseThree' aria-expanded='false' aria-controls='panelsStayOpen-collapseThree'>
          Thương hiệu
        </button>
      </h2>
      <div id='panelsStayOpen-collapseThree' class='accordion-collapse collapse'>
        <div class='accordion-body'>
       <code>$product_title</code>
        </div>
      </div>
    </div>
    <div class='accordion-item'>
    <h2 class='accordion-header'>
      <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapsefourth' aria-expanded='false' aria-controls='panelsStayOpen-collapseThree'>
        Xuất xứ
      </button>
    </h2>
    <div id='panelsStayOpen-collapsefourth' class='accordion-collapse collapse'>
      <div class='accordion-body'>
     <code>Việt Nam</code>
      </div>
    </div>
  </div>
  <div class='accordion-item'>
  <h2 class='accordion-header'>
    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapsefive' aria-expanded='false' aria-controls='panelsStayOpen-collapseThree'>
      Giá cả
    </button>
  </h2>
  <div id='panelsStayOpen-collapsefive' class='accordion-collapse collapse'>
    <div class='accordion-body'>
   <code>{$product_price}K</code>
    </div>
  </div>
</div>
  </div>

    </div>
</div>
</div>";
  }
}
}
}
}
// get ip function 
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// CART Function
function add_cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query = "select *from `cart_details` where ip_address = '$get_ip_add' and product_id=$get_product_id";
    $result_query = mysqli_query($con,$select_query);
    $num_of_rows= mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('Sản phẩm đã có trong giỏ hàng!!')</script>";
      echo "<script>window.open('homepage.php','_self')</script>";

    }else{
      $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values(
        $get_product_id,'$get_ip_add',0)";
        $result_query = mysqli_query($con,$insert_query);
      echo "<script>alert('Đã thêm thành công vào giỏ hàng!')</script>";
      echo "<script>window.open('homepage.php','_self')</script>";

    }

  }
}
//cart item numbers
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $select_query = "select *from `cart_details` where ip_address = '$get_ip_add'";
    $result_query = mysqli_query($con,$select_query);
    $count_cart_items= mysqli_num_rows($result_query);
  }else{
    global $con;
    $get_ip_add = getIPAddress();
    $select_query = "select *from `cart_details` where ip_address = '$get_ip_add'";
    $result_query = mysqli_query($con,$select_query);
    $count_cart_items= mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
  }
  
  // total price
  function total_price(){
    global $con;
    $total_price=0;
    $get_ip_add = getIPAddress();
    $cart_query="select *from `cart_details` where ip_address=
    '$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id = $row['product_id'];
      $select_products="select *from `products` where product_id='$product_id'";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price+=$product_values;

      }

    }
    echo $total_price;

    }

    // displaying the cart 
    function show_cart(){
      global $con;
      $total_price=0;
      $get_ip_add = getIPAddress();
      $cart_query="select *from `cart_details` where ip_address=
      '$get_ip_add'";
      $result=mysqli_query($con,$cart_query);
      while($row=mysqli_fetch_array($result)){
        $product_id = $row['product_id'];
        $select_products="select *from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
          $product_price = array($row_product_price['product_price']);
          $price_table = $row_product_price['product_price'];
          $product_title = $row_product_price['product_title'];
          $product_image1 = $row_product_price['product_image2'];
          $product_values = array_sum($product_price);
          $total_price+=$product_values;
          echo "<tr class='text-center'>
          <td>$product_title</td>
          <td><img class='cart_img center-block' src='./admin_area/product_images/$product_image1' alt=''></td>
          <td><div class='input-group mb-3' style='width:130px'>
          <button class='input-group-text decrement-btn input-qty'>-</button>
          <input type='text' class='form-control bg-white text-center' value='1' disabled>
          <button class='input-group-text increment-btn'>+</button>
        </div></td>
          <td>$price_table$</td>
          <td><input type='checkbox' name='removeitem[]' value='$product_id'</td>
          <td>
              <input class='mx-3 bg-info py-2 px-2 border-0' value='Update Cart' type='submit' name='update_cart'>
              <input class='mx-3 bg-info py-2 px-2 border-0' value='Remove Cart' type='submit' name='remove_cart'>
          </td>
      </tr>
                    ";  
        }
        }
      }


      // subtotal
      function subtotal(){
        global $con;
        $total_price=0;
        $get_ip_add = getIPAddress();
        $cart_query="select *from `cart_details` where ip_address=
        '$get_ip_add'";
        $result=mysqli_query($con,$cart_query);
        while($row=mysqli_fetch_array($result)){
          $product_id = $row['product_id'];
          $select_products="select *from `products` where product_id='$product_id'";
          $result_products=mysqli_query($con,$select_products);
          while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price = array($row_product_price['product_price']);
            $price_table = $row_product_price['product_price'];
            $product_title = $row_product_price['product_title'];
            $product_image1 = $row_product_price['product_image2'];
            $product_values = array_sum($product_price);
            $total_price+=$product_values;
            if(isset($_POST['update_cart'])){
              $quantities=$_POST['qty'];
              $update_cart="update `cart_details`
              set quantity='$quantities' where ip_address='$get_ip_add'";
              $result_products_quantity=mysqli_query($con,$update_cart);
              $total_price = $total_price*$quantities;
             
            }
        }
        }
        echo "{$total_price}K";
      }
      // remove the cart

      function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
          if(!empty($_POST['removeitem'])){
          foreach($_POST['removeitem'] as $remove_id){
            $delete_query = "delete from `cart_details` where product_id='$remove_id'";
            $run_delete = mysqli_query($con,$delete_query);
            if($run_delete){
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }
        }
        else{
          echo "<script>alert('Sản phẩm bạn chọn là?')</script>";
        }
      }
    }

    // get user order details
    function get_user_oder_details(){
      global $con;
      $username = $_SESSION['username'];
      $get_details = "select * from `user_table` where username='$username'";
      $result_query = mysqli_query($con,$get_details);
      while($row_query=mysqli_fetch_array($result_query)){
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit_account'])){
          if(!isset($_GET['my_orders'])){
            if(!isset($_GET['delete_account'])){
              $get_orders="select * from `user_orders` 
              where user_id = '$user_id' and order_status='pending'";
              $result_order_query=mysqli_query($con,$get_orders);
              $row_count=mysqli_num_rows($result_order_query);
              if($row_count>0){
                echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span>
                 pending orders</h3>
                <p  class='text-center'><a class='text-dark text-decorate-none' href='profile.php?my_orders'>Order Details</a></p>";
              }else{
                echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero
                pending orders</h3>
               <p  class='text-center'><a class='text-dark text-decorate-none' 
               href='profile.php?my_orders'>Order Details</a></p>";
              }
            }
          }
        }
      }
    }
    // count products
?>

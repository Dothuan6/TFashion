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
      <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
      <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
      </a>
                <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text text-danger'>Giá: {$product_price}K</p>
                  <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
              
                </div>
      </div>
  </div>";
    }
}
}
}
// get product nón
function getproducts_non(){
  global $con;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  $select_query = "select * from `products`  where product_keywords like '%non%' order by rand() LIMIT 0,3";
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
    <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
    </a>
              <div class='card-body'>
               <h5 class='card-title'>$product_title</h5>
                <p class='card-text'> $product_description</p>
                <p class='card-text text-danger'>Giá: {$product_price}K</p>
                <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
            
              </div>
    </div>
</div>";
  }
}
}
}
// get product tui xach
function getproducts_tuixach(){
  global $con;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  $select_query = "select * from `products`  where product_keywords like '%tui%' order by rand() LIMIT 0,3";
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
    <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
    </a>
              <div class='card-body'>
               <h5 class='card-title'>$product_title</h5>
                <p class='card-text'> $product_description</p>
                <p class='card-text text-danger'>Giá: {$product_price}K</p>
                <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
            
              </div>
    </div>
</div>";
  }
}
}
}
// get product quan ao
function getproducts_quan_ao(){
  global $con;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  $select_query = "select * from `products`  where product_keywords like '%ao%' order by rand() LIMIT 0,3";
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
    <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
    </a>
              <div class='card-body'>
               <h5 class='card-title'>$product_title</h5>
                <p class='card-text'> $product_description</p>
                <p class='card-text text-danger'>Giá: {$product_price}K</p>
                <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
            
              </div>
    </div>
</div>";
  }
}
}
}

// getproduct mat kinh
function getproducts_kinh(){
  global $con;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  $select_query = "select * from `products`  where product_keywords like '%Kinh%' order by rand() LIMIT 0,3";
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
    <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
    </a>
              <div class='card-body'>
               <h5 class='card-title'>$product_title</h5>
                <p class='card-text'> $product_description</p>
                <p class='card-text text-danger'>Giá: {$product_price}K</p>
                <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
            
              </div>
    </div>
</div>";
  }
}
}
}
// get product_thirth
function getproducts_thirth(){
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
    echo "<div class='col-md-4' style='height:400px;'>
    <div class='card' style='height:350px;'>
    <a href='product_details.php?product_id= $product_id' class='btn btn-light bg-warning'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top_sale' style='height:250px;'>
    </a>
              <div class='card-body'>
               <h5 class='card-title'>$product_title</h5>
                <p class='card-text text-danger'>Giá: {$product_price}K</p>
                <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
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
              <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
              <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
              </a>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'> $product_description</p>
              <p class='card-text text-danger'>Giá: {$product_price}K</p>
              <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
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
                <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
                </a>
                <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text text-danger'>Giá: {$product_price}K</p>
                  <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
                  
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
                  <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
                   <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
                  </a>
                <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text'>Giá: {$product_price}K</p>
                  <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
                 
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
      <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
      <img src='./admin_area/product_images/$product_image2' class='card-img-top'>
      </a>
                <div class='card-body'> 
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text'>Giá: {$product_price}K</p>
                  <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
                 
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
</div>
<div class='col-md-8'>
<div class='row py-4'>
    <div class='col-md-6'>
    
    <div id='carouselExampleFade' class='carousel slide carousel-fade'>
  <div class='carousel-inner'>
    <div class='carousel-item active'>
      <img src='./admin_area/product_images/$product_image3' class='d-block' style='width:100%;' alt='...'>
    </div>
    <div class='carousel-item'>
      <img src='./admin_area/product_images/$product_image1' class='d-block' style='width:100%;' alt='...'>
    </div>
    <div class='carousel-item'>
      <img src='./admin_area/product_images/$product_image2' class='d-block' style='width:100%;' alt='...'>
    </div>
  </div>
  <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleFade' data-bs-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Previous</span>
  </button>
  <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleFade' data-bs-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Next</span>
  </button>
</div>

    </div>
    <div class='col-md-6 col-lg-6 col-sm-12 px-2'>

    <h3 class='text-dark mt-2'>$product_title</h3>
    <i class='fa-regular fa-star text-warning'></i>
    <i class='fa-regular fa-star text-warning'></i>
    <i class='fa-regular fa-star text-warning'></i>
    <i class='fa-regular fa-star text-warning'></i>
    <i class='fa-regular fa-star text-warning'></i>
    <div class='py-1'><h6 class='text-danger'>Giá: $product_price VND</h6></div>
    <div class='row fw-bold text-dark m-2 mt-4'>
    Mô tả:
    </div>
    <p class='card-text text-secondary-bundle px-4'> $product_description</p>
    <div class='m-2'>
    <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
    </div>
    <div class='mt-5 m-2'>
    <a href='homepage.php?product_id= $product_id' class='m-2'><i class='fa-solid fa-backward'></i> Quay về</a>
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
          $product_image1 = $row_product_price['product_image3'];
          $product_values = array_sum($product_price);
          $total_price+=$product_values;  
          echo "<tr class='text-center'>
          <td>$product_title</td>
          <td><img class='cart_img center-block' src='./admin_area/product_images/$product_image1' alt=''></td>
          <td><div style='display: flex;'>
          <button class='form-control detail-quantity' type='button' onclick='$('#num').val(parseInt($('#num').val()) - 1)' style='width: 35px !important; cursor: pointer;'>-</button>
          <input name='qty' id='num' type='number' value='1' class='form-control detail-quantity'>
          <button class='form-control detail-quantity' type='button' onclick='$('#num').val(parseInt($('#num').val()) + 1)' style='width: 35px !important; cursor: pointer;'>+</button>
          <label class='mb-4 text-muted' style='margin-left: 20px; margin-top: 10px;'>Còn hàng</label>
          </div></td>
          <td>$price_table$</td>
          <td><input type='checkbox' name='removeitem[]' value='$product_id'</td>
          <td>
              <input class='mx-3 bg-info py-2 px-2 border-0' value='Update Cart' type='submit' name='update_cart'>
              <input class='mx-3 bg-info py-2 px-2 border-0' value='Remove Cart' type='submit' name='remove_cart'>
          </td>
      </tr>";  
        }
        }
      }
      
      // subtotal
      function subtotal(){
        global $con;
        $total_price=0;
        $get_ip_add = getIPAddress();
        $cart_query="select *from `cart_details` where ip_address='$get_ip_add'";
        $result=mysqli_query($con,$cart_query);
        while($row=mysqli_fetch_array($result)){
          $get_ip_add = getIPAddress();
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
            $get_ip_add = getIPAddress();
            if(isset($_POST['update_cart'])){
              $get_ip_add = getIPAddress(); 
              $quantities=$_POST['qty'];
              settype($quantities,"integer");
              settype($price_table,"integer");
              $update_cart="update `cart_details` set quantity='$quantities' where product_id='$product_id'";
              $result_products_quantity=mysqli_query($con,$update_cart);
              if($result_products_quantity){
                $total_price=$total_price*$quantities;
            }
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
                echo "<h3 class='text-center text-success mt-5 mb-2'>Bạn có <span class='text-danger'>$row_count</span>
                 đơn hàng đang xử lý</h3>
                <p  class='text-center'><a class='text-dark text-decorate-none' href='user_profile.php?my_orders'>Chi tiết đơn hàng</a></p>";
              }else{
                echo "<h3 class='text-center text-success mt-5 mb-2'>Không có đơn hàng nào đang xử lý</h3>
               <p  class='text-center'><a class='text-dark text-decorate-none' 
               href='user_profile.php?my_orders'>Order Details</a></p>";
              }
            }
          }
        }
      }
    }
    // count products
?>
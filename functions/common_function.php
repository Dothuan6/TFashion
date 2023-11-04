<?php
// displaying products
global $conn;
function getproducts(){
    global $conn;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query = "select * from `products` order by rand() LIMIT 0,3";
    $stmt = $conn->prepare($select_query);
    $stmt->execute();
    // $row = mysqli_fetch_assoc($result_query);
    while($row = $stmt->fetch((PDO::FETCH_ASSOC))){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      // $product_keywords = $row['product_keywords'];
      $product_image2 = $row['product_image2'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card shadow rounded'>
      <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
      <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
      </a>
                <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text text-danger'>Giá: {$product_price} VND</p>
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
  global $conn;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  $select_query = "select * from `products`  where product_keywords like '%non%' order by rand() LIMIT 0,3";
  $stmt = $conn->prepare($select_query);
  $stmt->execute();
  // $row = mysqli_fetch_assoc($result_query);
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    // $product_keywords = $row['product_keywords'];
    $product_image2 = $row['product_image2'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-3 mb-2'>
    <div class='card shadow rounded'>
    <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
    </a>
              <div class='card-body fs-6'>
               <h5 class='card-title fs-6'>$product_title</h5>
                <p class='card-text fs-6 text-danger'>Giá: {$product_price} VND</p>
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
  global $conn;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  $select_query = "select * from `products`  where product_keywords like '%tui%' order by rand() LIMIT 0,3";
  $stmt = $conn->prepare($select_query);
  $stmt->execute();
  // $row = mysqli_fetch_assoc($result_query);
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    // $product_keywords = $row['product_keywords'];
    $product_image2 = $row['product_image2'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-3 mb-2'>
    <div class='shadow rounded card'>
    <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
    </a>
              <div class='card-body fs-6'>
               <h5 class='card-title fs-6'>$product_title</h5>
                <p class='card-text text-danger fs-6'>Giá: {$product_price} VND</p>
                <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
            
              </div>
    </div>
</div>";
  }
}
}
}
// get product quan ao
function getproducts_quan(){
  global $conn;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  $select_query = "select * from `products`  where product_keywords like '%quan%' order by rand() LIMIT 0,3";
  $stmt = $conn->prepare($select_query);
  $stmt->execute();
  // $row = mysqli_fetch_assoc($result_query);
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    // $product_keywords = $row['product_keywords'];
    $product_image2 = $row['product_image2'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-3 mb-2'>
    <div class='card shadow rounded'>
    <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
    </a>
              <div class='card-body fs-6'>
               <h5 class='card-title fs-6'>$product_title</h5>
                <p class='card-text text-danger fs-6'>Giá: {$product_price} VND</p>
                <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
            
              </div>
    </div>
</div>";
  }
}
}
}
// get product ao
function getproducts_ao(){
  global $conn;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  $select_query = "select * from `products`  where product_keywords like '%ao%' order by rand() LIMIT 0,6";
  $stmt = $conn->prepare($select_query);
  $stmt->execute();
  // $row = mysqli_fetch_assoc($result_query);
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    // $product_keywords = $row['product_keywords'];
    $product_image2 = $row['product_image2'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-3 mb-2'>
    <div class='card shadow rounded'>
    <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
    </a>
              <div class='card-body fs-6'>
               <h5 class='card-title fs-6'>$product_title</h5>
                <p class='card-text text-danger fs-6'>Giá: {$product_price} VND</p>
                <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info fs-6'>Thêm vào <i class='fa-solid fa-cart-shopping fs-6'></i></a>
            
              </div>
    </div>
</div>";
  }
}
}
}

// getproduct mat kinh
function getproducts_kinh(){
  global $conn;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  $select_query = "select * from `products`  where product_keywords like '%Kinh%' order by rand() LIMIT 0,3";
  $stmt = $conn->prepare($select_query);
  $stmt->execute();
  // $row = mysqli_fetch_assoc($result_query);
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    // $product_keywords = $row['product_keywords'];
    $product_image2 = $row['product_image2'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-3 mb-2'>
    <div class='card shadow rounded'>
    <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
    </a>
              <div class='card-body fs-6'>
               <h5 class='card-title fs-6'>$product_title</h5>
                <p class='card-text text-danger fs-6'>Giá: {$product_price} VND</p>
                <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
            
              </div>
    </div>
</div>";
  }
}
}
}
// getproduct giay
function getproducts_giay(){
  global $conn;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  $select_query = "select * from `products`  where product_keywords like '%giay%' order by rand() LIMIT 0,3";
  $stmt = $conn->prepare($select_query);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image2 = $row['product_image2'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-3 mb-2'>
    <div class='card shadow rounded'>
    <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
    </a>
              <div class='card-body fs-6'>
               <h5 class='card-title fs-6'>$product_title</h5>
                <p class='card-text text-danger fs-6'>Giá: {$product_price} VND</p>
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
  global $conn;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  $select_query = "select * from `products` order by rand() LIMIT 0,3";
  $stmt = $conn->prepare($select_query);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image2 = $row['product_image2'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $sale_price = 0;
    $sale_price = number_format((float)$product_price*(80/100),3);
    echo "<div class='col-md-4' style='height:100%;'>
    <div class='card shadow rounded' style='height:500px;'>
    <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top_sale' style='height:250px !important; border-radius:5px;'>
    </a>
              <div class='card-body'>
               <h5 class='card-title fs-5'>$product_title</h5>
               <p class='card-text text text-decoration-line-through fs-6' style='margin-bottom:0px;'>Giá: $product_price VND</p><sub>-20%</sub>
                <p class='card-text text-danger fs-6'>Còn: {$sale_price} VND</p>
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
    global $conn;
    if(isset($_GET['category'])){
    $category_id = $_GET['category'];
    $select_query = "select * from `products` where category_id = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->execute([$category_id]);
    $num_of_rows = $stmt->rowCount();
    if($num_of_rows==0){
      echo "<div class='alert alert-warning' role='alert'>
      Không có nhãn hàng nào được tìm thấy!
    </div>";
    }
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image2 = $row['product_image2'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
              <div class='card   shadow rounded'>
              <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
              <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
              </a>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'> $product_description</p>
              <p class='card-text text-danger'>Giá: {$product_price} VND</p>
              <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
              </div>
      </div>
  </div>";
    }   
}
}

// displaying brands in sidenav
function getbrands(){
    global $conn;
    $select_brands = "select * from `brands`";
    $stmt = $conn->prepare($select_brands);
    $stmt->execute();
        while($row_data = $stmt->fetch(PDO::FETCH_ASSOC)){
          $brand_title = $row_data['brand_title'];
          $brand_id = $row_data['brand_id'];
          echo "<li>
          <a href='homepage.php?brand=$brand_id' class='nav-link text-seccondary'>$brand_title</a>
        </li><hr class='sidebar-divider'>";
        }
}
// getting unique brands

function get_unique_brands(){
    global $conn;
    if(isset($_GET['brand'])){
    $brand_id = $_GET['brand'];
    $select_query = "select * from `products` where brand_id = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->execute([$brand_id]);
    $num_of_rows = $stmt->rowCount();
    if($num_of_rows==0){
      echo "<div class='alert alert-warning' role='alert'>
      Không có nhãn hàng nào được tìm thấy!
    </div>";
    }
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image2 = $row['product_image2'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card   shadow rounded'>
                <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
                </a>
                <div class='card-body'> 
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text text-danger'>Giá: {$product_price} VND</p>
                  <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
                  
                </div>
      </div>
  </div>";
    }   
}
}


//displaying categories in sidenav
function getcategories(){
    global $conn;
    $select_categories = "select *from `categories`";
    $stmt = $conn->prepare($select_categories);
    $stmt->execute();
     // $row_data = mysqli_fetch_assoc($result_brands);
    while($row_data = $stmt->fetch(PDO::FETCH_ASSOC)){
      $category_title = $row_data['category_title'];
      $category_id = $row_data['category_id'];
      echo "<li class='nav-item'>
      <a href='homepage.php?category=$category_id' class='nav-link text-secondary'>$category_title</a>
    </li> <hr class='sidebar-divider'>";
    }
}


//searching product
function search_products(){
    global $conn;
    $search_data_value = $_GET['search_data'];
    $search_query = "select *from `products` where product_keywords  like '%$search_data_value%'";
    $stmt = $conn->prepare($search_query);
    $stmt->execute();
    $row_search = $stmt->rowCount();
    if($row_search == 0){
      echo "<div class='alert alert-warning' role='alert'>
      Không có sản phẩm nào được tìm thấy!
    </div>";
    }
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image2 = $row['product_image2'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card  shadow rounded'>
                  <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
                   <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
                  </a>
                <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text text-danger'>Giá: {$product_price} VND</p>
                  <a href='homepage.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào <i class='fa-solid fa-cart-shopping'></i></a>
                 
                </div>
      </div>
  </div>";
    }
}

// get all products
function get_allproducts(){
  global $conn;
  $pageSize = 8;
    $startRow =0;
    if(isset($_GET['startRow']) == true) $startRow = $_GET['startRow'];
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query = "select * from `products` order by rand() limit $startRow,$pageSize";
    $stmt = $conn->prepare($select_query);
    $stmt->execute();
    // $row = mysqli_fetch_assoc($result_query);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      // $product_keywords = $row['product_keywords'];
      $product_image2 = $row['product_image2'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-3 mb-2'>
      <div class='card py-1 shadow rounded'>
      <a href='product_details.php?product_id= $product_id' class='btn btn-light'>
      <img src='./admin_area/product_images/$product_image2' class='card-img-top'>
      </a>
                <div class='card-body fs-6'> 
                 <h5 class='card-title fs-6'>$product_title</h5>
                  <p class='card-text text-danger fs-6'>Giá: {$product_price} VND</p>
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
  global $conn;
  if(isset($_GET['product_id'])){
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
        $product_id = $_GET['product_id'];
  $select_query = "select * from `products` where product_id =?";
  $stmt = $conn->prepare($select_query);
  $stmt->execute([$product_id]);
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_keywords=$row['product_keywords'];
    echo "<div class='col-md-4 mb-2'>
</div>
<div class='col-md-8'>
<div class='row py-4'>
    <div class='col-md-6'>
    <div id='carouselExampleFade' class='carousel slide carousel-fade'>
  <div class='carousel-inner'>
    <div class='carousel-item active zoom'>
      <img src='./admin_area/product_images/$product_image3' class='d-block' style='width:100%;' alt='...'>
      <img src='./admin_area/product_images/$product_image3' class='d-block' style='width:100%;' alt='...'>
    </div>
    <div class='carousel-item zoom'>
      <img src='./admin_area/product_images/$product_image1' class='d-block' style='width:100%;' alt='...'>
      <img src='./admin_area/product_images/$product_image1' class='d-block' style='width:100%;' alt='...'>
    </div>
    <div class='carousel-item zoom'>
      <img src='./admin_area/product_images/$product_image2' class='d-block' style='width:100%;' alt='...'>
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
    <a href='homepage.php?product_id= $product_id' class='m-2'>&laquo; Quay về</a>
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
    global $conn;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query = "select *from `cart_details` where ip_address = ? and product_id=?";
    $stmt = $conn->prepare($select_query);
    $stmt->execute([$get_ip_add, $get_product_id]);
    $num_of_rows= $stmt->rowCount();
    if($num_of_rows>0){
      echo "<script>alert('Sản phẩm đã có trong giỏ hàng!!')</script>";
      echo "<script>window.open('homepage.php','_self')</script>";

    }else{
      $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values(
        ?,?,1)";
        $stmt = $conn->prepare($insert_query);
        $stmt->execute([$get_product_id,$get_ip_add]);
      echo "<script>alert('Đã thêm thành công vào giỏ hàng!')</script>";
      echo "<script>window.open('homepage.php','_self')</script>";

    }

  }
}
//cart item numbers
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $conn;
    $get_ip_add = getIPAddress();
    $select_query = "select *from `cart_details` where ip_address = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->execute([$get_ip_add]);
    $count_cart_items= $stmt->rowCount();
  }else{
    global $conn;
    $get_ip_add = getIPAddress();
    $select_query = "select *from `cart_details` where ip_address = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->execute([$get_ip_add]);
    $count_cart_items= $stmt->rowCount();
    }
    echo $count_cart_items;
  }
  
  // total price
  function total_price(){
    global $conn;
    $total_price=0;
    $get_ip_add = getIPAddress();
    $cart_query="select *from `cart_details` where ip_address=
    ?";
    $stmt = $conn->prepare($cart_query);
    $stmt->execute([$get_ip_add]);
    while($row=$stmt->fetch()){
      $product_id = $row['product_id'];
      $select_products="select *from `products` where product_id=?";
      $stmt = $conn->prepare($select_products);
      $stmt->execute([$product_id]);
      while($row_product_price=$stmt->fetch()){
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price+=$product_values;
        $total_price_end = number_format($total_price,3);

      } if(isset($total_price_end)){
        echo "$total_price_end VND";
      }else{
        echo "0 VNĐ";
      }
    }

    }

    // displaying the cart 
    function show_cart(){
      global $conn;
      $total_price=0;
      $get_ip_add = getIPAddress();
      $cart_query="select *from `cart_details` where ip_address=?";
      $stmt = $conn->prepare($cart_query);
      $stmt->execute([$get_ip_add]);
      while($row=$stmt->fetch()){
        $product_id = $row['product_id'];
        $select_products="select *from `products` where product_id=?";
        $stmt = $conn->prepare($select_products);
        $stmt->execute([$product_id]);
        while($row_product_price=$stmt->fetch()){
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
        global $conn;
        $total_price=0;
        $get_ip_add = getIPAddress();
        $cart_query="select *from `cart_details`";
        $stmt = $conn->prepare($cart_query);
        $stmt->execute();
        while($row=$stmt->fetch()){
          $product_id = $row['product_id'];
          $product_qty=$row['quantity'];
         //  echo $product_qty;
          $select_products="select *from `products` where product_id=?";
          $stmt = $conn->prepare($select_products);
          $stmt->execute([$product_id]);
          while($row_product_price=$stmt->fetch()){
            $product_price = array($row_product_price['product_price']);
            $price_table = $row_product_price['product_price'];
            $product_title = $row_product_price['product_title'];
            $product_image1 = $row_product_price['product_image3'];
            $subtotal = number_format((int)$product_qty*(int)$price_table,3);
            $total_price =((int)$total_price + (int)$subtotal);
            $total_price_format = number_format((int)$total_price,3);
          }
        }
        if(isset($total_price_format)){
          echo "$total_price_format VND";
        }else{
          echo "0 VND";
        }
      }
      // remove the cart

      function remove_cart_item(){
        global $conn;
        if(isset($_GET['remove'])){
          $remove_id = $_GET['remove'];
          $sql = "delete from `cart_details` where product_id = ?";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$remove_id]);
          
    }
  }
    // get user order details
    function get_user_oder_details(){
      global $conn;
      $status = 'Chờ xác nhận';
      $username = $_SESSION['username'];
      $get_details = "select * from `user_table` where username=?";
      $stmt = $conn->prepare($get_details);
      $stmt->execute([$username]);
      while($row_query=$stmt->fetch()){
        $user_id = $row_query['user_id'];
      }
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['delete_account'])){
          if(!isset($_GET['delete_account'])){
            if(!isset($_GET['changepass'])){
            $get_orders="select * from `user_orders` 
            where user_id = ? and order_status= ? ";
            $stmt = $conn->prepare($get_orders);
            $stmt->execute([$user_id,$status]); 
            $row_count=$stmt->rowCount();
            if($row_count > 0){
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
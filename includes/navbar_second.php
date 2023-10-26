<?php
  if(isset($_SESSION['username'])){
    echo "<li class='nav-item p-0'>
          <a class='nav-link text-dark p-1' href='homepage.php'>Xin chào {$_SESSION['username']} &rang;</a>
          </li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link text-dark' href='homepage.php'><i class='fa-regular fa-user'></i></a>
    </li>";
  }
  if(isset($_SESSION['username'])){
    echo "
    <li class='nav-item'>
           <a class='nav-link text-dark p-1' href='./user_area/user_logout.php'>Đăng xuất</a>
    </li>";
  }else{
    echo "
    <li class='nav-item'>
           <a class='nav-link text-dark' href='./user_area/user_log.php'>Đăng nhập</a>
    </li>";
  }
?>
<?php 

# server name
$host = "localhost";
# user name
$username = "root";
# password
$password= "123456789";

# database name
$db_name = "fashionstore";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", 
                    $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}
<h3 class="text-dark mb-4 mt-5">Xóa tài khoản</h3>
<form action="" method="post" class="mt-5">
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" class="form-control btn btn-outline-danger" name="delete" value="Xóa tài khoản">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" class="form-control btn btn-outline-success mt-2" name="dont_delete"
            value="Không xóa tài khoản">
    </div>
</form>
<?php
if(isset($_POST['delete'])){
    global $conn;
       $username=$_SESSION['username'];
        $delete_query = "Delete from `user_table` where username=?";
        $stmt = $conn->prepare($delete_query);
        $result=$stmt->execute([$username]);
        if($result){
            session_destroy();
            echo "<script>alert('Tài khoản đã được xóa!')</script>";
            echo "<script>window.open('../homepage.php','_self')</script>";
        }
    }  
    if(isset($_POST['dont_delete'])){
            echo "<script>window.open('user_profile.php','_self')</script>";
      }
?>
<?php 
// // header('Content-Type: application/json');
    // require_once("../includes/connect.php");
    
    // $conn =  mysqli_connect("localhost:3306","root","123456789","fashionstore");
    // $user = "root";
    // $pass = "123456789";
    // $conn = new PDO('mysql:host=localhost:3306;dbname=fashionstore', $user, $pass);
    // global $conn;
    // $data = array();
    // $query = "SELECT product_id,COUNT(product_id) AS size_status FROM orders_pending GROUP BY product_id";
    // $stmt = $conn -> prepare($query);
    // if($stmt->execute()){
    //     if($stmt->rowCount()>0){
    //         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     }
    // }
    // foreach($result as $row){
    //     $data[] = $row;
    // }
    // $result_query_sta = mysqli_query($con,$query) ;
    // while($row_sta = mysqli_fetch_assoc($result_query_sta)){
    //     $pro_id = $row_sta['product_id'];
    //     $query_products= "select product_title from `products` where product_id='$pro_id'";
    //     $rs_products = mysqli_query($con,$query_products);
    //     while($row_pr = mysqli_fetch_assoc($rs_products)){
    //         $pro_title = $row_pr['product_title'];
            // echo $pro_title;
            // $data_point=array(
            //     array('y'=>4,"label" => $pro_title)
            // );
                // echo "$pro_title - ";
    //     }
    // }
    // echo $pro_id;
    // echo json_encode($data);

// $dataPoints = array(
//     array("y" => 3373.64,"label" => "Air Jordan 1 Mid SE"),
//     array("y" => 2345.64,"label" => "Nike Air Force 1 Shadow"),
//     array("y" => 1842.55,"label" => "MŨ"),
//     array("y" => 1828.55,"label" => " Áo thun cổ tròn"),
//     array("y" => 1039.99,"label" => "MŨ BUCKET"),
//     array("y" => 755.215,"label" => "Nike Air Force 1")
// );
// $link = mysqli_connect("localhost:3306","root","123456789","fashionstore");

// $test = array();


// $count =0;

// $res = mysqli_query($link,"SELECT product_id,COUNT(product_id) AS size_status FROM orders_pending GROUP BY product_id");
//  while($row=mysqli_fetch_array($res)){
//     $test[$count]["label"] = $row["product_id"];
//     $test[$count]["y"]=$row["size_status"];
//     $count = $count +1;
//  }
// ?>

<?php
 
    // $query = "SELECT product_id,COUNT(product_id) AS size_status FROM orders_pending GROUP BY product_id";
    // $result_query_sta = mysqli_query($con,$query) ;
    // while($row_sta = mysqli_fetch_assoc($result_query_sta)){
    //     $pro_id = $row_sta['product_id'];
    //     $query_products= "select product_title from `products` where product_id='$pro_id'";
    //     $rs_products = mysqli_query($con,$query_products);
    //     while($row_pr = mysqli_fetch_assoc($rs_products)){
    //     $count_pr = $row_sta['size_status'];
    //         foreach($row_pr as $row_pr[]){
    //         $pro_title = $row_pr['product_title'];
    //         $dataPoints = array(array("y" => $count_pr,"label" => $pro_title));
    //         $dataPoints = array(array("y" => $count_pr,"label" => $pro_title));

    //     }
    // }   
    // }
 ?>
<!-- <!DOCTYPE HTML>
<html>

<head>
    <script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "THỐNG KÊ SỐ LƯỢNG SẢN PHẨM BÁN RA"
            },
            axisY: {
                includeZero: true
            },
            data: [{
                type: "pie", //change type to bar, line, area, pie, etc
                //indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script> -->
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"
    integrity="sha512-FJ2OYvUIXUqCcPf1stu+oTBlhn54W0UisZB/TNrZaVMHHhYvLBV9jMbvJYtvDe5x/WVaoXZ6KB+Uqe5hT2vlyA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<!-- 
</body>

</html> -->
<?php
$name = "root";
$pass = "123456789";
try{
$pdo = new PDO("mysql:host=localhost;database=fashionstore",$name,$pass);
$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
 die("ERROR: Could not connect. ". $e -> getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"
        integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <?php
    try{
        $sql = "SELECT product_id,COUNT(product_id) AS size_status FROM fashionstore.orders_pending GROUP BY product_id";
        $result = $pdo->query($sql);
        if($result->rowCount() >0){
            $revenue = array();
            $size_status = array();
            $labels = array();
            while($row = $result->fetch()){
                $size_status[] = $row['size_status'];
                $revenue[] = $row["product_id"];
                $pro_id = $row['product_id'];
                $result_title = "select product_title from `products` where product_id = '$pro_id'";
                $query = mysqli_query($con,$result_title);
                while($row_title=mysqli_fetch_assoc($query)){
                    $labels[] = $row_title['product_title'];
                    // echo $labels;
                }         
            }
            unset($result);

        }else{
            echo "No ";
        }}
        catch(PDOException $e){
            die("ERROR: count not able to $sql" . $e->getMessage());
        }
        unset($pdo);    
    ?>
    <div class="chartBox">
        <canvas id="myChart"></canvas>
    </div>
    <script>
    // set up
    console.log(<?php echo json_encode($size_status)?>);
    console.log(<?php echo json_encode($labels)?>);

    const size_status = <?php echo json_encode($size_status) ?>;
    const labels = <?php echo json_encode($labels) ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: 'SỐ LƯỢNG BÁN RA',
            data: size_status,
            backgroundColor: [
                'rgba(255,99,132,0.2)',
                'rgba(54,162,235,0.2)',
                'rgba(155,206,86,0.2)',
                'rgba(75,192,192,0.2)',
                'rgba(153,102,255,0.2)',
                'rgba(255,159,64,0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54,162,235,1)',
                'rgba(155,206,86,1)',
                'rgba(75,192,192,1)',
                'rgba(153,102,255,1)',
                'rgba(255,159,64,1)'
            ],
            borderWidth: 1

        }]
    };

    // 
    const config = {
        type: 'bar',
        data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // 
    const myChart = new Chart(
        document.getElementById('myChart'), config
    );
    </script>
</body>

</html>
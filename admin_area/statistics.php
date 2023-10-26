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
                $revenue[] = $row["product_id"];
                $pro_id = $row['product_id'];
                $result_title = "select product_title from `products` where product_id = '$pro_id'";
                $query = mysqli_query($con,$result_title);
                while($row_title=mysqli_fetch_assoc($query)){
                    $labels[] = $row_title['product_title'];
                    $size_status[] = $row['size_status'];
                    // echo print_r($size_status);
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
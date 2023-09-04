<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>TFashion</title>
    <link rel="stylesheet" href="style.css">
    <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- font aware cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
    .container_1 {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 1000px;
        height: 600px;
        padding: 50px;
        background-color: #f5f5f5;
        box-shadow: 0 30px 50px #dbdbdb;
    }

    body {
        overflow: hidden !important;
    }

    #slide {
        width: max-content;
        margin-top: 50px;
    }

    .item {
        width: 200px;
        height: 300px;
        background-position: 50% 50%;
        display: inline-block;
        transition: 0.5s;
        background-size: cover;
        position: absolute;
        z-index: 1;
        top: 50%;
        transform: translate(0, -50%);
        border-radius: 20px;
        box-shadow: 0 30px 50px #505050;
        overflow: hidden !important;
    }

    .item:nth-child(1),
    .item:nth-child(2) {
        left: 0;
        top: 0;
        transform: translate(0, 0);
        border-radius: 0;
        width: 100%;
        height: 100%;
        box-shadow: none;
    }

    .item:nth-child(3) {
        left: 50%;
    }

    .item:nth-child(4) {
        left: calc(50% + 220px);
    }

    .item:nth-child(5) {
        left: calc(50% + 440px);
    }

    .item:nth-child(n+6) {
        left: calc(50% + 660px);
        opacity: 0;
    }

    .item .content {
        position: absolute;
        top: 50%;
        left: 100px;
        width: 300px;
        text-align: left;
        padding: 0;
        color: #eee;
        transform: translate(0, -50%);
        display: none;
        font-family: system-ui;
    }

    .item:nth-child(2) .content {
        display: block;
        z-index: 11111;
    }

    .item .name {
        font-size: 40px;
        font-weight: bold;
        opacity: 0;
        animation: showcontent 1s ease-in-out 1 forwards
    }

    .item .des {
        margin: 20px 0;
        opacity: 0;
        animation: showcontent 1s ease-in-out 0.3s 1 forwards
    }

    .item button {
        padding: 10px 20px;
        border: none;
        opacity: 0;
        animation: showcontent 1s ease-in-out 0.6s 1 forwards
    }

    @keyframes showcontent {
        from {
            opacity: 0;
            transform: translate(0, 100px);
            filter: blur(33px);
        }

        to {
            opacity: 1;
            transform: translate(0, 0);
            filter: blur(0);
        }
    }

    .buttons {
        position: absolute;
        bottom: 30px;
        z-index: 222222;
        text-align: center;
        width: 100%;
    }

    .buttons button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 1px solid #555;
        transition: 0.5s;
    }

    .buttons button:hover {
        background-color: #bac383;
    }

    a {
        text-decoration: none !important;
    }
    </style>
</head>

<body>
    <div class="">
        <div class="banner">
            <div class="container">
                <div id="slide">
                    <div class="item" style="background-image: url(./images/fashion1.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button><a href="homepage.php">Xem chi tiết</a></button>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(./images/fashion1.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button><a href="homepage.php">Xem chi tiết</a></button>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(./images/fashion3.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button><a href="homepage.php">Xem chi tiết</a></button>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(./images/fashion4.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button><a href="homepage.php">Xem chi tiết</a></button>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(./images/fashion5.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button><a href="homepage.php">Xem chi tiết</a></button>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(./images/fashion6.jpg);">
                        <div class="content">
                            <div class="name">TFashion</div>
                            <div class="des">Phong cách thời trang quốc tế</div>
                            <button><a href="homepage.php">Xem chi tiết</a></button>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
                    <button id="next"><i class="fa-solid fa-angle-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
    document.getElementById('next').onclick = function() {
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').appendChild(lists[0]);
    }
    document.getElementById('prev').onclick = function() {
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').prepend(lists[lists.length - 1]);
    }
    </script>
    <footer>
        <?php 
            include('./includes/footer.php');
            ?>
    </footer>
</body>

</html>
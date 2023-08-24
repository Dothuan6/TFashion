<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TFashion</title>
        <link rel="stylesheet" href="style.css">
            <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">
        
    <!-- font aware cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous"
     referrerpolicy="no-referrer" />


        <style>         
.banner{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.40),rgba(0,0,0,0.40));
    background-position: center;
    background-size: center;
}
.navbar{
    width: 90%;
    padding: 30px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.logo{
    width: 7%;
    margin-top: -10px;
    cursor: pointer;
    border-radius: 20px;
}
.navbar ul li{
    list-style: none;
    display: inline-block;
    margin: 20px;
}
.navbar ul li a{
    text-decoration: none;
    text-transform: uppercase;
    color: white;
    font-weight: 600;
    padding: 15px;
}
li a:hover{
    background: white;
    transition: 0.5s;
}
.navbar a:hover{
    color: black;
}
.content{
    width: 100%;
    position: absolute;
    color: white;
    top: 45%;
    transform: translateY(-50%);
    text-align: center;
}
.content h1{
    margin-top: 80px;
    font-size: 90px;
    font-weight: 800;
}
button{
    width: 200px;
    padding: 15px;
    margin: 20px 5px;
    text-align: center;
    border-radius: 25px;
    color: black;
    border: 2px;
    font-size: 20px;
    cursor: pointer;
    font-weight: 600;
}
button:hover{
    background: rgb(0, 192, 226);
    transition: 0.5s;
}
button:hover{
    color: white;
}
.banner video{
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: -1;
    
}
@media(min-aspect-ratio: 16/9){
    .banner video{
        width: 100%;
        height: auto;
        object-fit: contain;
    }
}
        </style>
    </head>
    <body>
        <div class="">
            <div class="banner">
            <video autoplay loop muted plays-inline>
                <source src="./video/background3.mp4" type="video/mp4">
            </video>
            <div class="navbar">
                <img class="logo" src="./images/logo.png">
            </div>
            <div class="content">
                <h1>TFaShion</h1>
                <div>
                    <a href="home_page_chose.php?explore">
                    <button name="explore" value="explore" type="button">Explore</button>
                    </a>
                </div>
                </div>
            </div>
            <footer>
            <?php 
            include('./includes/footer.php');
            ?>
        </footer>
        </div>
    </body>
</html>

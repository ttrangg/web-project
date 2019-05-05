<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Product</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
    </head>
    <body class="animsition">

        <?php
        require 'header.php';
        ?>

        <!-- Product -->
        <div class="bg0 m-t-23 p-b-140">
            <div class="container">
                
                <?php
                require 'products_menu.php';
                ?>
                
                <div style="width:auto; height:auto; position: relative; display:table">
                    <?php
                    $host = 'localhost';
                    $user = 'root';
                    $password = '';
                    $database = "fashion1";
                    $con = mysqli_connect($host, $user, $password, $database);
                    if (!$con) {
                        die('Could not connect: ' . mysqli_error());
                    }
                    
                    $sql_category = "SELECT cate_id FROM categories where cate_name='Men'";
                    $result_category = mysqli_query($con, $sql_category);
                    
                    $row_category = mysqli_fetch_object($result_category);
                           
                    $cate_id = $row_category->cate_id;
                    
                    $sql = "SELECT * FROM products where cate_id=$cate_id";
                    $result = mysqli_query($con, $sql);
                    
                    while ($row = mysqli_fetch_array($result)) {
                        $name = stripslashes($row['pro_name']);
                        $price = $row['price'];
                        $image = stripslashes($row['image']);
                        ?>
                        <div style="pading:20px; width:200px; height:300px; float:left; background:#FFF">
                            <img src="/web-project/user/image/<?= $image ?>" width="180px">
                            <p><b><?= $name ?></b></p>
                            <p>Price: <?= $price ?></p>
                        </div>

                    <?php } ?>
                </div>

            </div>
        </div>


        <?php
        require 'footer.php';
        ?>



        <!--===============================================================================================-->	
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

    </body>
</html>
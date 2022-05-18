<?php

    session_start();

    include("includes/db.php");
    include("functions/functions.php");

?>

<?php 

    if(isset($_GET['pro_id'])){

        $product_id = $_GET['pro_id'];
        
        $get_product = "select * from products where product_id='$product_id'";

        $run_product = mysqli_query($con,$get_product);

        $row_product = mysqli_fetch_array($run_product);

        $p_cat_id = $row_product['p_cat_id'];

        $pro_title = $row_product['product_title'];

        $pro_price = $row_product['product_price'];
        
        $pro_desc = $row_product['product_desc'];
        
        $pro_img1 = $row_product['product_img1'];
        $pro_img2 = $row_product['product_img2'];
        $pro_img3 = $row_product['product_img3'];

        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

        $run_p_cat = mysqli_query($con,$get_p_cat);

        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['p_cat_title'];


    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VonalRólad Shop</title>
        <link rel="stylesheet" href="styles/bootstrap-337.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>

        <div id="top"> <!-- Top begin -->
            <div class="container"> <!-- Container begin -->

                <div class="col-md-6 offer"> <!-- col-md-6 offer begin -->

                    <a href="../my_account.php?my_orders" class="btn btn-success btn-sm">
                        <?php 

                            if(!isset($_SESSION['customer_email'])){

                                echo "Üdv: Vendég ";

                            }else{

                                $customer_email = $_SESSION['customer_email'];
                                $getcustomer = "select * from customers where customer_email='$customer_email'";
                                $run_customer = mysqli_query($con,$getcustomer);
                                $row_customer = mysqli_fetch_array($run_customer);
                                $customer_name = $row_customer['customer_name'];

                                echo "Üdv, " . $customer_name . " ";

                            }
                        
                        ?></a>
                    <a href="checkout.php"> <?php items(); ?> termék van a kosaradban | Termékek ára: <?php total_price(); ?></a>

                </div> <!-- col-md-6 offer finish -->

                <div class="col-md-6">  <!-- col-md-6 begin -->

                    <ul class="menu"> <!-- cmenu begin -->
                        
                        <li>
                            <a href="../customer_register.php">Regisztráció</a>
                        </li>
                        <li>
                            <a href="my_account.php?my_orders">Fiókom</a>
                        </li>
                        <li>
                            <a href="../cart.php">Go To Cart</a>
                        </li>
                        <li>
                            <a href="../checkout.php">
                                <?php 

                                    if(!isset($_SESSION['customer_email'])){

                                        echo "<a href='../checkout.php'> Login </a>";

                                    }else{

                                        echo "<a href='../logout.php'> Log Out </a>";

                                    }
                                
                                ?>
                            </a>
                        </li>

                    </ul> <!-- cmenu finish -->

                </div> <!-- col-md-6 finish -->

            </div> <!-- Container finish -->

        </div> <!-- Top finish -->

        <div id="navbar" class="navbar navbar-default"> <!-- navbar navbar-default begin -->

            <div class="container"> <!-- container begin -->

                <div class="navbar-header"> <!-- navbar-header begin -->

                    <a href="../index.php" class="navbar-brand home"> <!-- navbar-brand home begin -->
                        <img src="images/logo-horizontal.png" alt="VonalRólad Shop logó" class="hidden-xs">
                        <img src="images/logo-circle.png" alt="VonalRólad Shop logó kör" class="visible-xs">

                    </a> <!-- navbar-brand home begin -->

                </div> <!-- navbar-header finish -->

                <div class="navbar-collapse collapse" id="navigation"> <!-- navbar-collapse collapse begin -->

                    <div class="padding-nav">  <!-- padding-nav begin -->
                        <ul class="nav navbar-nav left"> <!-- nav navbar-nav left begin -->

                        <li>
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="../shop.php">Shop</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php?my_orders">Fiókom</a>
                        </li>
                        <li>
                            <a href="../cart.php">Kosár</a>
                        </li>
                        <li>
                            <a href="../contact.php">Kapcsolat</a>
                        </li>

                        </ul> <!-- nav navbar-nav left finish -->

                    </div> <!-- padding-nav finish -->

                    <a href="../cart.php" class="btn navbar-btn btn-primary right"> <!-- btn navbar-btn btn-primary right begin -->
                
                        <i class="fa fa-shopping-cart"></i>
                        <span><?php items(); ?> termék van a kosaradban</span>

                    </a>  <!-- btn navbar-btn btn-primary right finish -->

                    <!-- <div class="navbar-collapse collapse right"> <1!-- navbar-collapse collapse right begin --1>

                        <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"> <!1-- btn btn-primary navbar-btn begin -1->

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                        </button> <!1-- btn btn-primary navbar-btn finish -1->

                    </div>  <!1-- navbar-collapse collapse right finish -1-> -->

                    <!-- <div class="collapse clearfix" id="search"> <!1-- collapse clearfix begin -1->
                    
                        <form method="get" action="results.php" class="navbar-form"> <!1-- navbar-form begin -1->

                            <div class="input-group"> <!1-- input-group begin -1->

                                <input type="text" class="form-control" placeholder="Keresés" name="user_query" required>

                                <span class="input-group-btn"> <!1-- input-group-btn begin -1->
                                <button type="submit" name="search" value="Search" class="btn btn-primary"> <!1-- btn btn-primary begin -1->
                                    
                                    <i class="fa fa-search"></i>

                                </button> <!1-- btn btn-primary finish -1->
                                </span> <!1-- input-group-btn finish -1->

                            </div> <!1-- input-group finish -1->

                        </form> <!1-- navbar-form finish -1->

                    </div> <!-1- collapse clearfix finish -1-> -->

                </div> <!-- navbar-collapse collapse finish -->

            </div> <!-- container finish -->

        </div> <!-- navbar navbar-default finish -->
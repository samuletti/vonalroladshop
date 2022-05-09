<?php

    session_start();

    if(!isset($_SESSION['customer_email'])){

        echo "<script>window.open('../checkout.php','_self')</script>";

    }else{

    include("includes/db.php");
    include("includes/functions/functions.php");

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

                    <a href="#" class="btn btn-success btn-sm">
                        <?php 

                            if(!isset($_SESSION['customer_email'])){

                                echo "Üdv, Vendég";

                            }else{

                                echo "Üdv, " . $_SESSION['customer_email'] . " ";

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
                            <a href="../cart.php">Kosár</a>
                        </li>
                        <li>
                            <a href="../checkout.php">
                                <?php 

                                    if(!isset($_SESSION['customer_email'])){

                                        echo "<a href='../checkout.php'> Bejelentkezés </a>";

                                    }else{

                                        echo "<a href='../logout.php'> Kijelentkezés </a>";

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

                    <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>

                    <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>

                </div> <!-- navbar-header finish -->

                <div class="navbar-collapse collapse" id="navigation"> <!-- navbar-collapse collapse begin -->

                    <div class="padding-nav">  <!-- padding-nav begin -->
                        <ul class="nav navbar-nav left"> <!-- nav navbar-nav left begin -->

                        <li>
                            <a href="../index.php">Főoldal</a>
                        </li>
                        <li>
                            <a href="../shop.php">Bolt</a>
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

                    <div class="navbar-collapse collapse right"> <!-- navbar-collapse collapse right begin -->

                        <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"> <!-- btn btn-primary navbar-btn begin -->

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                        </button> <!-- btn btn-primary navbar-btn finish -->

                    </div>  <!-- navbar-collapse collapse right finish -->

                    <div class="collapse clearfix" id="search"> <!-- collapse clearfix begin -->
                    
                        <form method="get" action="results.php" class="navbar-form"> <!-- navbar-form begin -->

                            <div class="input-group"> <!-- input-group begin -->

                                <input type="text" class="form-control" placeholder="Keresés" name="user_query" required>

                                <span class="input-group-btn"> <!-- input-group-btn begin -->
                                <button type="submit" name="search" value="Search" class="btn btn-primary"> <!-- btn btn-primary begin -->
                                    
                                    <i class="fa fa-search"></i>

                                </button> <!-- btn btn-primary finish -->
                                </span> <!-- input-group-btn finish -->

                            </div> <!-- input-group finish -->

                        </form> <!-- navbar-form finish -->

                    </div> <!-- collapse clearfix finish -->

                </div> <!-- navbar-collapse collapse finish -->

            </div> <!-- container finish -->

        </div> <!-- navbar navbar-default finish -->

        <div id="content"> <!-- #content begin -->
            <div class="container"> <!-- container begin -->
                <div class="col-md-12"> <!-- col-md-12 begin -->

                    <ul class="breadcrumb"> <!-- breadcrumb begin -->
                        <li>
                            <a href="index.php">Főoldal</a>
                        </li>
                        <li>
                            Fiókom
                        </li>
                    </ul> <!-- breadcrumb finish -->

                </div> <!-- col-md-12 finish -->

                <div class="col-md-3"> <!-- col-md-3 begin -->
                    <?php 
            
                        include("includes/sidebar.php");
            
                    ?>

                </div> <!-- col-md-3 finish -->
                
                <div class="col-md-9"> <!-- col-md-9 begin -->

                    <div class="box"> <!-- box begin -->

                        <?php

                            if(isset($_GET['my_orders'])){
                                include("my_orders.php");
                            }

                        ?>

                        <?php

                            if(isset($_GET['pay_offline'])){
                                include("pay_offline.php");
                            }

                        ?>

                        <?php

                            if(isset($_GET['upload_pic'])){
                                include("upload_pic.php");
                            }

                        ?>

                        <?php

                            if(isset($_GET['download_draw'])){
                                include("download_draw.php");
                            }

                        ?>

                        <?php

                            if(isset($_GET['edit_account'])){
                                include("edit_account.php");
                            }

                        ?>

                        <?php

                            if(isset($_GET['change_pass'])){
                                include("change_pass.php");
                            }

                        ?>

                        <?php

                            if(isset($_GET['delete_account'])){
                                include("delete_account.php");
                            }

                        ?>
                        
                    </div> <!-- box finish-->

                </div> <!-- col-md-9 finish -->

            </div> <!-- container finish -->
        </div> <!-- #content finish -->

        <?php 
        
        include("includes/footer.php");
        
        ?>

        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>

    </body>
</html>

<?php } ?>
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

                    <a href="#" class="btn btn-success btn-sm">Welcome</a>
                    <a href="checkout.php">4 Items in your Cart | Cart Total Price: $300</a>

                </div> <!-- col-md-6 offer finish -->

                <div class="col-md-6">  <!-- col-md-6 begin -->

                    <ul class="menu"> <!-- cmenu begin -->
                        
                        <li>
                            <a href="../customer_register.php">Register</a>
                        </li>
                        <li>
                            <a href="my_account.php">My Account</a>
                        </li>
                        <li>
                            <a href="../cart.php">Go To Cart</a>
                        </li>
                        <li>
                            <a href="../checkout.php">Login</a>
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
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="../shop.php">Shop</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php">My Account</a>
                        </li>
                        <li>
                            <a href="../cart.php">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="../contact.php">Contact Us</a>
                        </li>

                        </ul> <!-- nav navbar-nav left finish -->

                    </div> <!-- padding-nav finish -->

                    <a href="cart.php" class="btn navbar-btn btn-primary right"> <!-- btn navbar-btn btn-primary right begin -->
                
                        <i class="fa fa-shopping-cart"></i>
                        <span>4 Items in Your Cart</span>

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

                                <input type="text" class="form-control" placeholder="Search" name="user_query" required>

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
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            My Account
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

                        <h1 align="center"> Please confirm your payment</h1>

                        <form action="confirm.php" method="post" enctype="multipart/form-data"> <!-- form begin -->

                            <div class="form-group"> <!-- form-group begin -->

                                <label> Invoice No: </label>

                                <input type="text" class="form-control" name="invoice_no" required>

                            </div> <!-- form-group finish -->

                            <div class="form-group"> <!-- form-group begin -->

                                <label> Amount Sent: </label>

                                <input type="text" class="form-control" name="amount_sent" required>

                            </div> <!-- form-group finish -->

                            <div class="form-group"> <!-- form-group begin -->

                                <label> Select Payment Mode: </label>

                                <select name="payment_mode" class="form-control"> <!-- form-control begin -->

                                    <option> Select Payment Mode</option>
                                    <option>Készpénz</option>
                                    <option>Átutalás</option>
                                    <option>PayPal</option>
                                    <option>Ajéndékkártya</option>

                                </select> <!-- form-control finish -->

                            </div> <!-- form-group finish -->

                            <div class="form-group"> <!-- form-group begin -->

                                <label> Transaction / Reference ID: </label>

                                <input type="text" class="form-control" name="ref_no" required>

                            </div> <!-- form-group finish -->

                            <div class="form-group"> <!-- form-group begin -->

                                <label> Payment Date: </label>

                                <input type="text" class="form-control" name="date" required>

                            </div> <!-- form-group finish -->

                            <div class="text-center"> <!-- text-center begin -->

                                <button class="btn btn-primary btn-lg"> <!-- btn btn-primary btn-lg begin -->

                                    <i class="fa fa-user md"></i> Confirm Payment

                                </button> <!-- btn btn-primary btn-lg finish -->

                            </div> <!-- text-center finish -->

                        </form> <!-- form finish -->

                    </div><!-- box finish -->

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
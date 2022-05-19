<?php 

    session_start();
    $customer_email = $_SESSION['customer_email'];
    include("includes/header.php");

?>

        <div id="content"> <!-- #content begin -->
            <div class="container"> <!-- container begin -->
                <div class="col-md-12"> <!-- col-md-12 begin -->

                    <ul class="breadcrumb"> <!-- breadcrumb begin -->
                        <li>
                            <a href="index.php">Főoldal</a>
                        </li>
                        <li>
                        <a href="shop.php">Bolt</a>
                        </li>
                        <li>
                            <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                        </li>
                        <li> <?php echo $pro_title; ?> </li>
                    </ul> <!-- breadcrumb finish -->

                </div> <!-- col-md-12 finish -->

                <div class="col-md-3"> <!-- col-md-3 begin -->
                    <?php 
            
                        include("includes/sidebar.php");
            
                    ?>

                </div> <!-- col-md-3 finish -->

                <div class="col-md-9"> <!-- col-md-9 begin -->
                    <div id="productMain" class="row"> <!-- row begin -->
                        <div class="col-sm-6"> <!-- col-sm-6 begin -->
                            <div id="mainImage"> <!-- #mainImage begin -->
                                <div id="myCarousel" class="carousel slide" data-ride="carousel"> <!-- carousel slide begin -->
                                    <ol class="carousel-indicators"> <!-- carousel-indicators begin -->
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol> <!-- carousel-indicators finish -->

                                    <div class="carousel-inner"> <!-- carousel-inner begin -->
                                        <div class="item active">
                                            <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1 ?>" alt="Termék fotó 1"></center>
                                        </div>
                                        <div class="item">
                                            <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2 ?>" alt="Termék fotó 2"></center>
                                        </div>
                                        <div class="item">
                                            <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3 ?>" alt="Termék fotó 3"></center>
                                        </div>
                                    </div> <!-- carousel-inner finish -->

                                    <a href="#myCarousel" class="left carousel-control" data-slide="prev"> <!-- left carousel-control begin -->
                                        <span class="glyphicon  glyphicon-chevron-left"></span>
                                        <span class="sr-only">Előző</span>
                                    </a> <!-- left carousel-control finish -->

                                    <a href="#myCarousel" class="right carousel-control" data-slide="next"> <!-- right carousel-control begin -->
                                        <span class="glyphicon  glyphicon-chevron-right"></span>
                                        <span class="sr-only">Következő</span>
                                    </a> <!-- right carousel-control finish -->

                                </div> <!-- carousel slide finish -->
                            </div> <!-- #mainImage finish -->
                        </div> <!-- col-sm-6 finish -->

                        <div class="col-sm-6"> <!-- col-sm-6 begin -->
                            <div class="box"> <!-- box begin -->
                                <h1 class="text-center"><?php echo $pro_title ?></h1>

                                <?php add_cart(); ?>

                                <form action="details.php?add_cart=<?php echo $product_id ?>" class="form-horizontal" method="post"> <!-- form-horizontal begin -->
                                    <div class="form-group"> <!-- form-group begin -->
                                        <label for="" class="col-md-5 control-label">Mennyiség</label>

                                        <div class="col-md-7"> <!-- col-md-7 begin -->

                                            <select name="product_qty" id="" class="form-control"> <!-- select begin -->
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select> <!-- select finish -->

                                        </div> <!-- col-md-7 finish -->

                                    </div> <!-- form-group finish -->
                                    <?php
                                    if($product_id == 9){
                                        echo"
                                        <div class='form-group'> <!-- form-group begin -->
                                            <label class='col-md-5 control-label'>Méret</label>

                                            <div class='col-md-7'> <!-- col-md-7 begin -->

                                                <select name='product_size' class='form-control' oninput='setCustomValidity('')' oninvalid='setCustomValidity('Must pick 1 size for the product')' required> <!-- form-control begin -->
                                                    <option disabled selected>Válassz méretet</option>
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                </select> <!-- form-control finish -->

                                            </div> <!-- col-md-7 finish -->

                                        </div> <!-- form-group finish -->";
                                    }elseif($product_id == 8){
                                        echo"
                                        <div class='form-group'> <!-- form-group begin -->
                                            <label class='col-md-5 control-label'>Méret</label>

                                            <div class='col-md-7'> <!-- col-md-7 begin -->

                                                <select name='product_size' class='form-control' oninput='setCustomValidity('')' oninvalid='setCustomValidity('Must pick 1 size for the product')' required> <!-- form-control begin -->
                                                    <option disabled selected>Válassz méretet</option>
                                                    <option>A3</option>
                                                    <option>A4</option>
                                                </select> <!-- form-control finish -->

                                            </div> <!-- col-md-7 finish -->
                                            </div> <!-- form-group finish -->

                                            <div class='form-group'> <!-- form-group begin -->
                                            <label class='col-md-5 control-label'>Szín</label>

                                            <div class='col-md-7'> <!-- col-md-7 begin -->

                                                <select name='product_color' class='form-control' oninput='setCustomValidity('')' oninvalid='setCustomValidity('Must pick 1 size for the product')' required> <!-- form-control begin -->
                                                    <option disabled selected>Válassz színt</option>
                                                    <option>fekete</option>
                                                    <option>fehér</option>
                                                </select> <!-- form-control finish -->
                                                
                                            </div> <!-- col-md-7 finish -->

                                        </div> <!-- form-group finish -->";
                                    }elseif($product_id == 6){
                                        echo"
                                        <div class='form-group'> <!-- form-group begin -->
                                            <label class='col-md-5 control-label'>Méret</label>

                                            <div class='col-md-7'> <!-- col-md-7 begin -->

                                                <input type='text' name='product_size' class='form-control' placeholder='Telefon típusa' required> <!-- form-control begin -->
                                                </input> <!-- form-control finish -->

                                            </div> <!-- col-md-7 finish -->

                                        </div> <!-- form-group finish -->";
                                    }

                                    $customer_email = $_SESSION['customer_email'];
                                    $get_customer = "select * from customers where customer_email='$customer_email'";
                                    $run_customers = mysqli_query($con,$get_customer);
                                    $row_customer = mysqli_fetch_array($run_customers);
                                    $customer_id = $row_customer['customer_id'];

                                    if($p_cat_id == 1){
                                        /* digitális, tehát a fotókat listázza ki */
                                        echo "
                                        <div class='form-group'> <!-- form-group begin -->
                                    <label class='col-md-5 control-label'>Fotó</label>

                                    <div class='col-md-7'> <!-- col-md-7 begin -->
                                        <select name='product_pic' class='form-control' required> <!-- form-control begin -->
                                            <option disabled selected>Válassz fényképet</option>
                                        ";
                                        $get_pics = "select * from customer_pics where customer_id='$customer_id'";
                                        $run_pics = mysqli_query($con,$get_pics);
                                        while($row_pics=mysqli_fetch_array($run_pics)){

                                            $pic_id = $row_pics['pic_id'];
            
                                            $pic_name = $row_pics['pic_name'];

                                            echo "<option>$pic_name</option>";}
                                    }
                                    echo "</select> <!-- form-control finish-->";
                                    if($p_cat_id > 1){
                                        /* fizikai, tehát a rajzokat listázza ki */
                                        echo "
                                        <div class='form-group'> <!-- form-group begin -->
                                    <label class='col-md-5 control-label'>Rajz</label>
                                    <div class='col-md-7'> <!-- col-md-7 begin -->

                                        <select name='product_draw' class='form-control' required> <!-- form-control begin -->
                                            <option disabled selected>Válassz rajzot</option>
                                        ";
                                        $get_draws = "select * from drawings where customer_id='$customer_id'";
                                        $run_draws = mysqli_query($con,$get_draws);
                                        while($row_draws=mysqli_fetch_array($run_draws)){

                                            $draw_id = $row_draws['draw_id'];
            
                                            $draw_name = $row_draws['draw_name'];

                                            echo "<option>$draw_name</option>";}
                                    }
                                    echo "</select> <!-- form-control finish-->
                                    </div> <!-- col-md-7 finish -->

                                    </div> <!-- form-group finish -->";
                                    ?>

                                    <p class="price"><?php echo $pro_price ?> Ft</p>
                                    <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Kosárba</button></p>

                                </form> <!-- form-horizontal finish -->
                            </div> <!-- box finish -->

                            <div class="row" id="thumbs"> <!-- row begin -->

                                <div class="col-xs-4"> <!-- col-xs-4 begin -->
                                    <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb"> <!-- thumb begin -->
                                        <img src="admin_area/product_images/<?php echo $pro_img1 ?>" alt="Fotó 1" class="img-responsive">
                                    </a> <!-- thumb finish -->
                                </div> <!-- col-xs-4 finish -->

                                <div class="col-xs-4"> <!-- col-xs-4 begin -->
                                    <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb"> <!-- thumb begin -->
                                        <img src="admin_area/product_images/<?php echo $pro_img2 ?>" alt="Fotó 2" class="img-responsive">
                                    </a> <!-- thumb finish -->
                                </div> <!-- col-xs-4 finish -->

                                <div class="col-xs-4"> <!-- col-xs-4 begin -->
                                    <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb"> <!-- thumb begin -->
                                        <img src="admin_area/product_images/<?php echo $pro_img3 ?>" alt="Fotó 3" class="img-responsive">
                                    </a> <!-- thumb finish -->
                                </div> <!-- col-xs-4 finish -->

                            </div> <!-- row finish -->

                        </div> <!-- col-sm-6 finish -->

                    </div> <!-- row finish -->

                    <div class="box" id="details"> <!-- box begin -->

                            <h4>Termék leírása</h4>

                            <hr>

                        <p>

                        <?php echo $pro_desc ?>

                        </p>

                    </div> <!-- box finish -->

                    <div id="row same-height-row"> <!-- #row same-height-row begin -->
                        <div class="col-md-3 col-sm-6"> <!-- col-md-3 col-sm-6 begin -->
                            <div class="box same-height headline"> <!-- box same-height headline begin -->
                                <h3 class="text-center">Ez is érdekelhet</h3>
                            </div> <!-- box same-height headline begin -->
                        </div> <!-- col-md-3 col-sm-6 finish -->

                        <?php 

                            $get_products = "select * from products order by rand() LIMIT 0,3";

                            $run_products = mysqli_query($con,$get_products);

                            while($row_products=mysqli_fetch_array($run_products)){

                                $pro_id = $row_products['product_id'];
                                $pro_title = $row_products['product_title'];
                                $pro_img1 = $row_products['product_img1'];
                                $pro_price = $row_products['product_price'];

                                echo "

                                    <div class='col-md-3 col-sm-6 center-responsive'>

                                        <div  class='product same-height'>

                                            <a href='details.php?pro_id=$pro_id'>

                                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                                            </a>

                                            <div class='text'>

                                                <h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>

                                                <p class='price'> $pro_price Ft </p>

                                            </div>

                                        </div>
                                    
                                    </div>
                                
                                ";

                            }

                        ?>

                    </div> <!-- #row same-height-row finish -->

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
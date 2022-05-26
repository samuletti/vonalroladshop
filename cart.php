<?php 

    $active = "Cart";
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
                            Kosár
                        </li>
                    </ul> <!-- breadcrumb finish -->

                </div> <!-- col-md-12 finish -->

                <div id="cart" class="col-md-9"> <!-- col-md-9 begin -->

                    <div class="box"> <!-- box begin -->

                        <form action="cart.php" method="post" enctype="multipart/form-data"> <!-- form begin -->

                        <h1>Kosár</h1>

                        <?php

                            $ip_add = getRealIpUser();

                            if(!isset($_SESSION['customer_email'])){
                                $select_cart = "select * from cart where ip_add='$ip_add'";

                                $run_cart = mysqli_query($con,$select_cart);

                                $count = mysqli_num_rows($run_cart);
                            }else{

                            $customer_email = $_SESSION['customer_email'];

                            $get_customer = "select * from customers where customer_email='$customer_email'";
                            $run_customers = mysqli_query($con,$get_customer);
                            $row_customer = mysqli_fetch_array($run_customers);
                            $customer_id = $row_customer['customer_id'];

                            $select_cart = "select * from cart where customer_id='$customer_id'";

                            $run_cart = mysqli_query($con,$select_cart);

                            $count = mysqli_num_rows($run_cart);
                            }
                        
                        ?>

                        <p class="text-muted">Jelenleg <?php items(); ?> termék van a kosaradban</p>

                        <div class="table-responsive"> <!-- table-responsive begin -->

                            <table class="table"> <!-- table begin -->

                                <thead> <!-- thead begin -->

                                    <tr>
                                        <th colspan="2">Termék</th>
                                        <th>Mennyiség</th>
                                        <th>Egységár</th>
                                        <th>Méret</th>
                                        <th>Szín</th>
                                        <th>Fénykép neve</th>
                                        <th>Rajz neve</th>
                                        <th colspan="1">Törlés</th>
                                        <th colspan="2">Fizetendő</th>
                                    </tr>

                                </thead> <!-- thead finish -->

                                <tbody> <!-- tbody begin -->

                                <?php 

                                    $total = 0;

                                    while($row_cart = mysqli_fetch_array($run_cart)) {

                                        $cart_id = $row_cart['cart_id'];

                                        $pro_id = $row_cart['p_id'];

                                        $pro_size = $row_cart['size'];
                                        
                                        $pro_qty = $row_cart['qty'];

                                        $pro_color = $row_cart['color'];

                                        $pic_name = $row_cart['pic_name'];
                                        
                                        $draw_name = $row_cart['draw_name'];

                                        $get_products = "select * from products where product_id='$pro_id'";

                                        $run_products = mysqli_query($con,$get_products);

                                        while($row_products = mysqli_fetch_array($run_products)){

                                            $product_title = $row_products['product_title'];
                                            
                                            $product_img1 = $row_products['product_img1'];

                                            $only_price = $row_products['product_price'];
                                            
                                            $sub_total = $row_products['product_price']*$pro_qty;

                                            $total += $sub_total;
                                
                                ?>

                                    <tr> <!-- tr begin -->
                                    
                                        <td>

                                            <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product Image">

                                        </td>

                                        <td>

                                            <a href="details.php?pro_id=<?php echo $pro_id ?>"><?php echo $product_title; ?></a>

                                        </td>

                                        <td>
                                            <?php echo $pro_qty; ?> db
                                        </td>

                                        <td>
                                            <?php echo $only_price; ?> Ft
                                        </td>

                                        <td>
                                            <?php echo $pro_size; ?>
                                        </td>

                                        <td>
                                            <?php echo $pro_color; ?>
                                        </td>

                                        <td>
                                            <?php echo $pic_name; ?>
                                        </td>

                                        <td>
                                            <?php echo $draw_name; ?>
                                        </td>

                                        <td>

                                            <input type="checkbox" name="remove[]" value="<?php echo $cart_id; ?>">

                                        </td>

                                        <td>

                                            <?php echo $sub_total ?> Ft

                                        </td>
                                        
                                    </tr> <!-- tr finish -->

                                    <?php 

                                        }}
                                    
                                    ?>

                                </tbody> <!-- tbody finish -->

                                <tfoot> <!-- tfoot begin -->

                                    <tr> <!-- tr begin -->

                                        <th colspan="9">Összesen</th>
                                        <th colspan="2"><?php echo $total ?> Ft</th>
                                        
                                    </tr> <!-- tr finish -->

                                </tfoot> <!-- tfoot finish -->

                            </table> <!-- table finish -->

                        </div> <!-- table-responsive finish -->

                        <div class="box-footer"> <!-- box-footer begin -->

                            <div class="pull-left"> <!-- pull-left begin -->

                                <a href="shop.php" class="btn btn-default"> <!-- btn btn-default begin -->

                                    <i class="fa fa-chevron-left"></i> Vásárlás folytatása

                                </a> <!-- btn btn-default finish -->

                            </div> <!-- pull-left finish -->

                            <div class="pull-right"> <!-- pull-right begin -->

                                <button type="submit" name="update" value="update cart" class="btn btn-default"> <!-- btn btn-default begin -->

                                    <i class="fa fa-refresh"></i> Kosár frissítése

                                </button> <!-- btn btn-default finish -->

                                <a href="checkout.php" class="btn btn-primary" <?php $i = items(); if($i == 0){echo"disabled";} ?>>

                                    Tovább a fizetéshez <i class="fa fa-chevron-right"></i>

                                </a>

                            </div> <!-- pull-right finish -->

                        </div> <!-- box-footer finish -->
                        
                        </form> <!-- form finish -->

                    </div> <!-- box finish -->

                    <?php 

                        function update_cart(){

                            global $con;

                            if(isset($_POST['update'])){

                                foreach($_POST['remove'] as $remove_id){

                                    $delete_product = "delete from cart where cart_id='$remove_id'";

                                    $run_delete = mysqli_query($con,$delete_product);

                                    if($run_delete){

                                        echo "<script>window.open('cart.php','_self')</script>";

                                    }
                                }

                            }

                        }

                        echo @$up_cart = update_cart();
                    
                    ?>

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

                <div class="col-md-3"> <!-- col-md-3 begin -->

                    <div id="order-summary" class="box"> <!-- box begin -->

                        <div class="box-header"> <!-- box-header begin -->

                            <h3>Rendelés összegzés</h3>

                        </div> <!-- box-header finish -->

                        <div class="table-responsive"> <!-- table-responsive begin -->

                            <table class="table"> <!-- table begin -->

                                <tbody> <!-- tbody begin -->

                                    <tr> <!-- tr begin -->

                                        <td> Rendelés </td>
                                        <th> <?php echo $total; ?> Ft </th>

                                    </tr>  <!-- tr finish -->

                                    <!--<tr> <'!-- tr begin --'>

                                        <td> Tax </td>
                                        <th> 0 Ft </th>

                                    </tr> <'!-- tr finish -->

                                    <tr class="total"> <!-- tr begin -->

                                        <td> Összesen </td>
                                        <th> <?php echo $total ?> Ft </th>

                                    </tr> <!-- tr finish -->

                                </tbody> <!-- tbody finish -->

                            </table> <!-- table finish -->

                        </div> <!-- table-responsive finish -->

                    </div> <!-- box finish -->

                </div> <!-- col-md-3 finish -->

            </div> <!-- container finish -->
        </div> <!-- #content finish -->

        <?php 
        
        include("includes/footer.php");
        
        ?>

        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>

    </body>
</html>
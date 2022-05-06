<div id="footer"> <!-- footer begin -->
    <div class="container"> <!-- container begin -->
        <div class="row"> <!-- row begin -->
            <div class="col-sm-6 col-md-3"> <!-- col-sm-6 col-md-3 begin -->

                <h4>Pages</h4>

                <ul> <!-- ul begin -->
                    <li><a href="cart.php">Shopping cart</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="./customer/my_account.php">My Account</a></li>
                </ul><!-- ul finish -->

                <hr>

                <h4>User Section</h4>

                <ul> <!-- ul begin -->
                    <li><a href="checkout.php">Login</a></li>
                    <li><a href="customer_register.php">Register</a></li>
                </ul> <!-- ul finish -->

                <hr>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div> <!-- col-sm-6 col-md-3 finish -->

            <div class="com-sm-6 col-md-3"> <!-- com-sm-6 col-md-3 begin -->

                <h4>Top Products Categories</h4>

                <ul> <!-- ul begin -->

                    <?php 

                        $get_p_cats = "select * from product_categories";

                        $run_p_cats = mysqli_query($con, $get_p_cats);

                        while($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                            $p_cat_id = $row_p_cats['p_cat_id'];
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            $p_cat_desc = $row_p_cats['p_cat_desc'];

                            echo "

                                <li>

                                    <a href='shop.php?p_cat=$p_cat_id'>
                                    $p_cat_title
                                    </a>

                                </li>
                            
                            ";

                        }

                    ?>

                </ul> <!-- ul finish -->

                <hr class="hidden-md hidden-lg">

            </div> <!-- com-sm-6 col-md-3 finish -->

            <div class="col-sm-6 col-md-3"> <!-- com-sm-6 col-md-3 begin -->

                <h4>Find Us</h4>
                <p> <!-- p begin -->
                    <strong>VonalRólad Shop</strong>
                    <br/>Budapest
                    <br/>Magyarország
                    </br>+36 1 123 4567
                    </br>vonalrolad@gmail.com
                    </br><strong>R4JGSN</strong>
                </p> <!-- p finish -->

                <a href="contact.php">Check Our Contact Page</a>

                <hr class="hidden-md hidden-lg">

            </div> <!-- com-sm-6 col-md-3 finish -->

            <div class="col-sm-6 col-md-3">

                <!--<h4>Get The News</h4>

                <p class="text-muted">
                    Don't miss our latest update.
                </p>

                <form action="get" method="post"> <-- form begin ->

                    <div class="input-group"> <-- input-group begin ->

                        <input type="text" class="form-control" name="email">

                        <span class="input-group-btn"> <-- input-group-btn begin ->

                            <input type="submit" value="subscribe" class="btn btn-default">

                        </span> <-- input-group-btn finish ->


                    </div> <-- input-group finish ->

                </form> <-- form finish ->

                <hr>-->

                <h4>Keep In Touch</h4>
                
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                    </p>

            </div>
        </div> <!-- row finish -->
    </div> <!-- container finish -->
</div> <!-- footer finish -->

<div id="copyright"> <!-- #copyright begin -->
    <div class="container"> <!-- container begin -->
        <div class="col-md-6"> <!-- col-md-6 begin -->

            <p class="pull-left">&copy; 2022 VonalRólad Shop All Rights Reserved</p>

        </div> <!-- col-md-6 finish -->
        <div class="col-md-6"> <!-- col-md-6 begin -->

            <p class="pull-right">Theme by: <a href="#">R4JGSN</a></p>

        </div> <!-- col-md-6 finish -->
    </div> <!-- container finish -->
</div> <!-- copyright finish -->
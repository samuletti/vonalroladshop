<?php 

    include("includes/header.php");

?>

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
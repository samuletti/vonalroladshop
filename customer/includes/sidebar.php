<div class="panel panel-default sidebar-menu"> <!-- panel panel-default sidebar-menu begin -->

    <div class="panel-heading"> <!-- panel-heading begin -->

        <?php 

            $customer_session = $_SESSION['customer_email'];

            $get_customer = "select * from customers where customer_email='$customer_session'";

            $run_customer = mysqli_query($con,$get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_image = $row_customer['customer_profile'];
            $customer_name = $row_customer['customer_name'];

            if(!isset($_SESSION['customer_email'])){

            }else{

                echo "

                    <center>

                        <img src='customer_images/$customer_image' class='img-responsive'>

                    </center>

                    <br/>

                    <h3 class='panel-title' align='center'>

                        Név: $customer_name

                    </h3>
                
                ";

            }
        
        ?>

    </div> <!-- panel-heading finish -->

    <div class="panel-body"> <!-- panel-body begin -->

        <ul class="nav-pills nav-stacked nav"> <!-- nav-pills nav-stacked nav begin -->

            <li class="<?php if(isset($_GET['my_orders'])){echo"active";} ?>">
                <a href="my_account.php?my_orders">

                    <i class="fa fa-list"></i> Rendeléseim

                </a>
            </li>

            <li class="<?php if(isset($_GET['pay_offline'])){echo"active";} ?>">
                <a href="my_account.php?pay_offline">

                    <i class="fa fa-bolt"></i> Fizetés

                </a>
            </li>

            <li class="<?php if(isset($_GET['upload_pic'])){echo"active";} ?>">
                <a href="my_account.php?upload_pic">

                    <i class="fa fa-camera"></i> Fotó feltöltése

                </a>
            </li>

            <li class="<?php if(isset($_GET['download_draw'])){echo"active";} ?>">
                <a href="my_account.php?download_draw">

                    <i class="fa fa-image"></i> Rajz letöltése

                </a>
            </li>

            <li class="<?php if(isset($_GET['edit_account'])){echo"active";} ?>">
                <a href="my_account.php?edit_account">

                    <i class="fa fa-pencil"></i> Fiók szerkesztése

                </a>
            </li>

            <li class="<?php if(isset($_GET['change_pass'])){echo"active";} ?>">
                <a href="my_account.php?change_pass">

                    <i class="fa fa-lock"></i> Jelszó módosítása

                </a>
            </li>

            <li class="<?php if(isset($_GET['delete_account'])){echo"active";} ?>">
                <a href="my_account.php?delete_account">

                    <i class="fa fa-trash-o"></i> Fiók törlése

                </a>
            </li>

            <li>
                <a href="logout.php">

                    <i class="fa fa-sign-out"></i> Kijelentkezés

                </a>
            </li>

        </ul> <!-- nav-pills nav-stacked nav finish -->

    </div> <!-- panel-body finish -->

</div> <!-- panel panel-default sidebar-menu finish -->
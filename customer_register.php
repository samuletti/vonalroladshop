<?php 

    $active="Account";
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
                            Regisztráció
                        </li>
                    </ul> <!-- breadcrumb finish -->

                </div> <!-- col-md-12 finish -->

                <div class="col-md-12"> <!-- col-md-9 begin -->

                    <div class="box"> <!-- box begin -->

                        <div class="box-header"> <!-- box-header begin -->

                            <center> <!-- center begin -->

                                <h2> Új felhasználó létrehozása </h2>

                            </center> <!-- center finish -->

                            <form action="customer_register.php" method="post" enctype="multipart/form-data"> <!-- form begin -->

                                <div class="form-group"> <!-- form-group begin -->

                                    <label>Név:*</label>
                                    <input type="text" class="form-control" name="c_name" required>

                                </div> <!-- form-group finish -->

                                <div class="form-group"> <!-- form-group begin -->

                                    <label>E-mail cím:*</label>
                                    <input type="text" class="form-control" name="c_email" required>

                                </div> <!-- form-group finish -->

                                <div class="form-group"> <!-- form-group begin -->

                                    <label>Jelszó:*</label>
                                    <input type="password" class="form-control" name="c_pass" required>

                                </div> <!-- form-group finish -->

                                <div class="form-group"> <!-- form-group begin -->

                                    <label>Ország:*</label>
                                    <input type="text" class="form-control" name="c_country" required>

                                </div> <!-- form-group finish -->

                                <div class="form-group"> <!-- form-group begin -->

                                    <label>Város:*</label>
                                    <input type="text" class="form-control" name="c_city" required>

                                </div> <!-- form-group finish -->

                                <div class="form-group"> <!-- form-group begin -->

                                    <label>Cím:*</label>
                                    <input type="text" class="form-control" name="c_address" required>

                                </div> <!-- form-group finish -->

                                <div class="form-group"> <!-- form-group begin -->

                                    <label>Telefonszám:*</label>
                                    <input type="text" class="form-control" name="c_contact" required>

                                </div> <!-- form-group finish -->

                                <div class="form-group"> <!-- form-group begin -->

                                    <label>Profilkép:*</label>
                                    <input type="file" class="form-control form-height-custom" name="c_image" required>

                                </div> <!-- form-group finish -->

                                <div class="text-center"> <!-- text-center begin -->

                                    <button type="submit" name="register" class="btn btn-primary">

                                    <i class="fa fa-user"></i> Regisztráció </button>

                                </div> <!-- text-center finish -->
                                
                            </form> <!-- form finish -->

                            <p>* Kötelező mező</p>
                            
                        </div> <!-- box-header finish -->

                    </div> <!-- box finish -->
                        
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

<?php 

    if(isset($_POST['register'])){

        $cur_email = $_POST['c_email'];

        $get_check = "select * from customers where customer_email='$cur_email'";
        $run_check = mysqli_query($con,$get_check);
        $count_rows = mysqli_num_rows($run_check);

        if($count_rows == 0){

            $c_name = $_POST['c_name'];
            $c_email = $_POST['c_email'];
            $c_pass = $_POST['c_pass'];
            $c_country = $_POST['c_country'];
            $c_city = $_POST['c_city'];
            $c_contact = $_POST['c_contact'];
            $c_address = $_POST['c_address'];

            $c_image = $_FILES['c_image']['name'];
            $c_image_tmp = $_FILES['c_image']['tmp_name'];

            $c_ip = getRealIpUser();

            /* $customer_id = "select customer_id from customers where customer_email='$c_email'"; */

            mkdir("customer/customers/$c_email");
            mkdir("customer/customers/$c_email/pics");
            mkdir("customer/customers/$c_email/draws");

            move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

            $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_profile,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";

            $run_customer = mysqli_query($con,$insert_customer);

            $sel_cart = "select * from cart where ip_add='$c_ip'";

            $run_cart = mysqli_query($con,$sel_cart);

            $check_cart = mysqli_num_rows($run_cart);

            if($check_cart>0){
                //register with item(s) in cart

                $_SESSION['customer_email']=$c_email;

                echo "<script>window.open('cart.php'.'_self')</script>";
                echo "<script>alert('Sikeres regisztráció!')</script>";
                
            }else{
                //register with empty cart

                $_SESSION['customer_email']=$c_email;

                echo "<script>alert('Sikeres regisztráció!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
                
            }
        }else{
            echo "<script>alert('Ez az e-mail cím már használatban van!')</script>";
            echo "<script>window.open('customer_register.php','_self')</script>";
        }

    }

?>
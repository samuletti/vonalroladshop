<div class="box"> <!-- box begin -->

    <div class="box-header"> <!-- box-header begin -->

        <center> <!-- center begin -->

            <h1> Bejelentkezés </h1>

            <p class="lead"> Már regisztráltál? </p>

            <p class="text-muted"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis amet pariatur odio, nostrum, aliquam tenetur rerum ipsum quasi et, optio modi accusantium qui minima id voluptates dolorum. Voluptatibus, dolor eum. </p>

        </center> <!-- center finish -->

    </div> <!-- box-header finish -->

    <form method="post" action="checkout.php"> <!-- form begin -->

        <div class="form-group"> <!-- form-group begin -->

            <label> E-mail cím: </label>
            <input name="c_email" type="text" class="form-control" required>

        </div> <!-- form-group finish -->

        <div class="form-group"> <!-- form-group begin -->

            <label> Jelszó: </label>
            <input name="c_pass" type="password" class="form-control" required>

        </div> <!-- form-group finish -->

        <div class="text-center"> <!-- text-center begin -->

            <button name="login" value="login" class="btn btn-primary">

                <i class="fa fa-sign-in"></i> Bejelentkezés

            </button>

        </div> <!-- text-center finish -->

    </form> <!-- form finish -->

    <center> <!-- center begin -->

        <a href="./customer_register.php">

            <h3> Még nincs fiókod? Regisztrálj itt! </h3>

        </a>

    </center> <!-- center finish -->

</div> <!-- box finish -->

<?php 

    if(isset($_POST['login'])){

        $customer_email = $_POST['c_email'];
        
        $customer_pass = $_POST['c_pass'];

        $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

        $run_customer = mysqli_query($con,$select_customer);

        $get_ip = getRealIpUser();

        $check_customer = mysqli_num_rows($run_customer);

        $select_cart = "select * from cart where ip_add='$get_ip'";

        $run_cart = mysqli_query($con,$select_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if($check_customer==0){
            
            echo "<script>alert('Az e-mail cím vagy jelszó hibás.')</script>";

            exit();
        }

        if($check_customer==1 && $check_cart==0){

            $_SESSION['customer_email']=$customer_email;

            echo "<script>alert('Sikeres bejelentkezés')</script>";
            echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

        }else{

            $_SESSION['customer_email']=$customer_email;

            echo "<script>alert('Sikeres bejelentkezés')</script>";
            echo "<script>window.open('./checkout.php','_self')</script>";
        }
    }

?>
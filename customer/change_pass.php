<h1 align="center"> Jelszó megváltoztatása </h1>

<form action="" method="post"> <!-- form begin -->

    <div class="form-group"> <!-- form-group begin -->

        <label> Régi jelszó: </label>

        <input type="text" name="old_pass" class="form-control" required>

    </div> <!-- form-group finish -->

    <div class="form-group"> <!-- form-group begin -->

        <label> Új jelszó: </label>

        <input type="text" name="new_pass" class="form-control" required>

    </div> <!-- form-group finish -->

    <div class="form-group"> <!-- form-group begin -->

        <label> Új jelszó megerősítése: </label>

        <input type="text" name="new_pass_again" class="form-control" required>

    </div> <!-- form-group finish -->

    <div class="text-center"> <!-- text-center begin -->

        <button type="submit" name="submit" class="btn btn-primary"> <!-- btn btn-primary begin -->

            <i class="fa fa-user-md"></i> Frissítés

        </button> <!-- btn btn-primary finish -->

    </div> <!-- text-center finish -->

</form> <!-- form finish -->

<?php 

    if(isset($_POST['submit'])){

        $c_email = $_SESSION['customer_email'];

        $c_old_pass = $_POST['old_pass'];

        $c_new_pass = $_POST['new_pass'];

        $c_new_pass_again = $_POST['new_pass_again'];

        $sel_old_pass = "select * from customers where customer_email='$c_email'";

        $run_c_old_pass = mysqli_query($con,$sel_old_pass);

        $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

        if($check_c_old_pass == 0){

            echo "<script>alert('Hibás régi jelszó, próbáld újra!')</script>";

            exit();

        }
        if($c_new_pass!=$c_new_pass_again){

            echo "<script>alert('Az új jelszavak nem egyeznek, próbáld újra!')</script>";

            exit();

        }

        $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";

        $run_c_pass = mysqli_query($con,$update_c_pass);

        if($run_c_pass){

            echo "<script>alert('A jelszavad megváltozott!')</script>";
            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
            
        }
    }

?>
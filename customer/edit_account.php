<?php 

    $customer_session = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$customer_session'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_id = $row_customer['customer_id'];
    $customer_name = $row_customer['customer_name'];
    $customer_email = $row_customer['customer_email'];
    $customer_country = $row_customer['customer_country'];
    $customer_city = $row_customer['customer_city'];
    $customer_contact = $row_customer['customer_contact'];
    $customer_address = $row_customer['customer_address'];
    $customer_image = $row_customer['customer_profile'];

?>

<h1 align="center"> Felhasználó módosítása </h1>

<form action="" method="post" enctype="multipart/form-data"> <!-- form begin -->

    <div class="form-group"> <!-- form-group begin -->

        <label> Név: </label>

        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>

    </div> <!-- form-group finish -->

    <div class="form-group"> <!-- form-group begin -->

        <label> E-mail cím: </label>

        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>

    </div> <!-- form-group finish -->

    <div class="form-group"> <!-- form-group begin -->

        <label> Ország: </label>

        <input type="text" name="c_country" class="form-control" value="<?php echo $customer_country; ?>" required>

    </div> <!-- form-group finish -->

    <div class="form-group"> <!-- form-group begin -->

        <label> Város: </label>

        <input type="text" name="c_city" class="form-control" value="<?php echo $customer_city; ?>" required>

    </div> <!-- form-group finish -->

    <div class="form-group"> <!-- form-group begin -->

        <label> Cím: </label>

        <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>

    </div> <!-- form-group finish -->

    <div class="form-group"> <!-- form-group begin -->

        <label> Telefonszám: </label>

        <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>

    </div> <!-- form-group finish -->

    <div class="form-group"> <!-- form-group begin -->

        <label> Profilkép: </label>

        <input type="file" name="c_image" class="form-control form-height-custom">

        <img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" alt="Customer Image" required>

    </div> <!-- form-group finish -->

    <div class="text-center"> <!-- text-center begin -->

        <button name="update" class="btn btn-primary"> <!-- btn btn-primary begin -->

            <i class="fa fa-user-md"></i> Frissítés

        </button> <!-- btn btn-primary finish -->

    </div> <!-- text-center finish -->

</form> <!-- form finish -->

<?php 

    if(isset($_POST['update'])){

        echo $update_id = $customer_id;
        echo $c_name = $_POST['c_name'];
        echo $c_email = $_POST['c_email'];
        echo $c_country = $_POST['c_country'];
        echo $c_city = $_POST['c_city'];
        echo $c_address = $_POST['c_address'];
        echo $c_contact = $_POST['c_contact'];
        echo $c_image = $_FILES['c_image']['name'];
        echo $c_image_tmp = $_FILES['c_image']['tmp_name'];
        
        echo move_uploaded_file($c_image_tmp,"customer_images/$c_image");

        $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_address='$c_address',customer_contact='$c_contact',customer_profile='$c_image' where customer_id='$update_id'";

        $run_customer = mysqli_query($con,$update_customer);

        if($run_customer){

            echo "<script>alert('Az adatokat sikeresen módosítottad. Jelentkezz be újra!')</script>";
            echo "<script>window.open('logout.php','_self')</script>";

        }

    }

?>
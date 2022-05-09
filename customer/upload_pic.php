<?php 

    include("includes/db.php");

    session_start();

    $cur_email = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$cur_email'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $cur_id = $row_customer['customer_id'];
?>

<h1 align="center"> Fotó feltöltése </h1>

<form action="upload_pic.php" method="post" enctype="multipart/form-data"> <!-- form begin -->

    <div class="form-group"> <!-- form-group begin -->

        <label>Fénykép feltöltése:</label>
        <input type="file" class="form-control form-height-custom" name="up_image" required>

    </div> <!-- form-group finish -->

    <div class="text-center"> <!-- text-center begin -->

        <button type="submit" name="upload" class="btn btn-primary">

        <i class="fa fa-user-md"></i> Feltöltés </button>

    </div> <!-- text-center finish -->
    
</form> <!-- form finish -->

<hr>

<div class="row"> <!-- row begin -->

    <?php
            
            $get_pics = "select * from customer_pics where customer_id='$cur_id'";

            $run_pics = mysqli_query($con,$get_pics);

            while($row_pics=mysqli_fetch_array($run_pics)){

                $pic_id = $row_pics['pic_id'];

                $pic_name = $row_pics['pic_name'];

                echo "

                    <div class='col-md-4 col-sm-6 center-responsive'>

                        <div class='pic'>

                            <img class='img-responsive' src='customers/$cur_email/pics/$pic_name'>

                            <div class='text'> $pic_name </div>
                        
                        </div>
                    
                    </div>
                
                ";

            }


    ?>

</div> <!-- row finish -->

<?php 

    if(isset($_POST['upload'])){

        $up_image = $_FILES['up_image']['name'];
        $up_image_tmp = $_FILES['up_image']['tmp_name'];

        move_uploaded_file($up_image_tmp,"customers/$cur_email/pics/$up_image");

        $insert_pic = "insert into customer_pics (customer_id,pic_name) values ('$cur_id','$up_image')";

        $run_pic = mysqli_query($con,$insert_pic);

        if($run_pic){

        echo "<script>alert('Sikeres feltöltés')</script>";
        echo "<script>window.open('my_account.php?upload_pic','_self')</script>";

        }

    }

?>
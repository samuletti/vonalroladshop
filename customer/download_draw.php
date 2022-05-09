<?php 

    include("includes/db.php");

    session_start();

    $cur_email = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$cur_email'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $cur_id = $row_customer['customer_id'];
?>

<h1 align="center"> Elkészült rajz letöltése </h1>

<div class="row"> <!-- row begin -->

    <?php
            
            $get_draws = "select * from drawings where customer_id='$cur_id'";

            $run_draws = mysqli_query($con,$get_draws);

            while($row_draws=mysqli_fetch_array($run_draws)){

                $draw_id = $row_draws['draw_id'];

                $draw_name = $row_draws['draw_name'];

                $pic_id = $row_draws['pic_id'];

                echo "

                    <div class='col-md-5 col-sm-6 center-responsive'>

                        <div class='pic'>

                            <a href='dload.php?draw_id=$draw_id'>
                            <img class='img-responsive' src='customers/$cur_email/draws/$draw_name'>
                            </a>

                            <div class='text'> $draw_name </div>
                        
                        </div>
                    
                    </div>
                
                ";

            }


    ?>

</div> <!-- row finish -->
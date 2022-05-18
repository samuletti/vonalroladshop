<div class="box"> <!-- box begin -->

    <?php 

        $session_email = $_SESSION['customer_email'];

        $select_customer = "select * from customers where customer_email='$session_email'";

        $run_customer = mysqli_query($con,$select_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $customer_id = $row_customer['customer_id'];
    
    ?>
<center>
    <a href="order.php?c_id=<?php echo $customer_id ?>" class="btn btn-primary"> <!-- btn navbar-btn btn-primary right begin -->
                
        <i class="fa fa-money"></i> Fizetés banki átutalással

    </a>  <!-- btn navbar-btn btn-primary right finish -->
</center>
</div> <!-- box finish -->
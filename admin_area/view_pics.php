<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
        
?>

<div class="row"> <!-- row 1 begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <ol class="breadcrumb"> <!-- breadcrumb begin -->
            <li class="active"> <!-- li begin -->

                <i class="fa fa-dashboard"></i> Kezelőfelület / Vásárlók fényképeinek megtekintése

            </li> <!-- li finish -->
        </ol> <!-- breadcrumb finish -->
    </div> <!-- col-lg-12 finish -->
</div> <!-- row 1 finish -->

<div class="row"> <!-- row 2 begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <div class="panel panel-brown"> <!-- panel panel-deafult begin -->
            <div class="panel-heading"> <!-- panel-heading begin -->
                <h3 class="panel-title"> <!-- panel-title begin -->

                    <i class="fa fa-camera"></i> Vásárlók fényképeinek megtekintése

                </h3> <!-- panel-title finish -->
            </div> <!-- panel-heading finish -->

            <div class="panel-body"> <!-- panel-body begin -->
                <div class="table-responsive"> <!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"> <!-- table table-striped table-bordered table-hover begin -->

                        <thead> <!-- thead begin -->
                            <tr> <!-- tr begin -->
                                <th> Fénykép ID: </th>
                                <th> Vásárló: </th>
                                <th> Fénykép neve: </th>
                                <th> Fénykép: </th>
                                
                            </tr> <!-- tr begin -->
                        </thead> <!-- thead finish -->

                        <tbody> <!-- tbody begin -->

                            <?php 

                                $get_pics = "select * from customer_pics";
                                $run_pics = mysqli_query($con,$get_pics);
                                while($row_pics=mysqli_fetch_array($run_pics)){

                                    $pic_id = $row_pics['pic_id'];
                                    $customer_id = $row_pics['customer_id'];
                                    $pic_name = $row_pics['pic_name'];

                                    $get_customer = "select * from customers where customer_id='$customer_id'";
                                    $run_customer = mysqli_query($con,$get_customer);
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    $customer_email = $row_customer['customer_email'];
                                    
                                    $i++;
                            
                            ?>

                            <tr> <!-- tr begin -->
                                <td> <?php echo $pic_id; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $pic_name; ?> </td>
                                <td> <a href="dload.php?pic_id=<?php echo $pic_id; ?>"><img src="../customer/customers/<?php echo $customer_email; ?>/pics/<?php echo $pic_name; ?>" width="200" class="img-responsive"></a> </td>
                            </tr> <!-- tr finish -->

                            <?php } ?>

                        </tbody> <!-- tbody finish -->

                    </table> <!-- table table-striped table-bordered table-hover finish -->
                </div> <!-- table-responsive begin -->
            </div> <!-- panel-body finish -->
            
        </div> <!-- panel panel-deafult finish -->
    </div> <!-- col-lg-12 finish -->
</div> <!-- row 2 finish -->

<?php } ?>
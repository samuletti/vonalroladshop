<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
        
?>

<div class="row"> <!-- row 1 begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <ol class="breadcrumb"> <!-- breadcrumb begin -->
            <li class="active"> <!-- li begin -->

                <i class="fa fa-dashboard"></i> Kezelőfelület / Vásárlók megtekintése

            </li> <!-- li finish -->
        </ol> <!-- breadcrumb finish -->
    </div> <!-- col-lg-12 finish -->
</div> <!-- row 1 finish -->

<div class="row"> <!-- row 2 begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <div class="panel panel-brown"> <!-- panel panel-deafult begin -->
            <div class="panel-heading"> <!-- panel-heading begin -->
                <h3 class="panel-title"> <!-- panel-title begin -->

                    <i class="fa fa-tags"></i> Vásárlók megtekintése

                </h3> <!-- panel-title finish -->
            </div> <!-- panel-heading finish -->

            <div class="panel-body"> <!-- panel-body begin -->
                <div class="table-responsive"> <!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"> <!-- table table-striped table-bordered table-hover begin -->

                        <thead> <!-- thead begin -->
                            <tr> <!-- tr begin -->
                                <th> ID: </th>
                                <th> Név: </th>
                                <th> Profilkép: </th>
                                <th> E-mail: </th>
                                <th> Ország: </th>
                                <th> Város: </th>
                                <th> Cím: </th>
                                <th> Kapcsolat: </th>
                                <th> Törlés: </th>
                                
                            </tr> <!-- tr begin -->
                        </thead> <!-- thead finish -->

                        <tbody> <!-- tbody begin -->

                            <?php 

                                $get_acc = "select * from customers";
                                $run_acc = mysqli_query($con,$get_acc);
                                while($row_acc=mysqli_fetch_array($run_acc)){

                                    $acc_id = $row_acc['customer_id'];
                                    $acc_name = $row_acc['customer_name'];
                                    $acc_img = $row_acc['customer_profile'];
                                    $acc_mail = $row_acc['customer_email'];
                                    $acc_country = $row_acc['customer_country'];
                                    $acc_city = $row_acc['customer_city'];
                                    $acc_address = $row_acc['customer_address'];
                                    $acc_contact = $row_acc['customer_contact'];
                                    $i++;
                            
                            ?>

                            <tr> <!-- tr begin -->
                                <td> <?php echo $acc_id; ?> </td>
                                <td> <?php echo $acc_name; ?> </td>
                                <td> <img src="../customer/customer_images/<?php echo $acc_img; ?>" width="100" class="img-responsive"> </td>
                                <td> <?php echo $acc_mail; ?> </td>
                                <td> <?php echo $acc_country; ?> </td>
                                <td> <?php echo $acc_city; ?> </td>
                                <td> <?php echo $acc_address; ?> </td>
                                <td> <?php echo $acc_contact; ?> </td>
                                <td> <a href="index.php?delete_customer=<?php echo $acc_id; ?>">

                                    <i class="fa fa-trash"></i> Törlés
                            
                                </a> </td>
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
<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
        
?>

<div class="row"> <!-- row 1 begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <ol class="breadcrumb"> <!-- breadcrumb begin -->
            <li class="active"> <!-- li begin -->

                <i class="fa fa-dashboard"></i> Kezelőfelület / Rendelések megtekintése

            </li> <!-- li finish -->
        </ol> <!-- breadcrumb finish -->
    </div> <!-- col-lg-12 finish -->
</div> <!-- row 1 finish -->

<div class="row"> <!-- row 2 begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <div class="panel panel-brown"> <!-- panel panel-deafult begin -->
            <div class="panel-heading"> <!-- panel-heading begin -->
                <h3 class="panel-title"> <!-- panel-title begin -->

                    <i class="fa fa-tags"></i> Rendelések megtekintése

                </h3> <!-- panel-title finish -->
            </div> <!-- panel-heading finish -->

            <div class="panel-body"> <!-- panel-body begin -->
                <div class="table-responsive"> <!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"> <!-- table table-striped table-bordered table-hover begin -->

                        <thead> <!-- thead begin -->
                            <tr> <!-- tr begin -->
                                <th> ID: </th>
                                <th> Vásárló: </th>
                                <th> Termék neve: </th>
                                <th> Egység ár: </th>
                                <th> Számla: </th>
                                <th> DB: </th>
                                <th> Méret: </th>
                                <th> Szín: </th>
                                <th> Fénykép neve: </th>
                                <th> Rajz neve: </th>
                                <th> Összesen: </th>
                                <th> Rendelés dátuma: </th>
                                <th> Rendelés állapota: </th>
                                <th> Állapot frissítése: </th>
                                <th> Törlés: </th>
                                
                            </tr> <!-- tr begin -->
                        </thead> <!-- thead finish -->

                        <tbody> <!-- tbody begin -->

                            <?php 

                                $get_order = "select * from customer_orders";
                                $run_order = mysqli_query($con,$get_order);
                                while($row_order=mysqli_fetch_array($run_order)){

                                    $order_id = $row_order['order_id'];

                                    $customer_id = $row_order['customer_id'];
                                    $get_customer = "select * from customers where customer_id='$customer_id'";
                                    $run_customer = mysqli_query($con,$get_customer);
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    $customer_name = $row_customer['customer_name'];

                                    $order_prod = $row_order['prod_title'];
                                    $order_due = $row_order['due_amount'];
                                    $order_invoice_no = $row_order['invoice_no'];
                                    $order_qty = $row_order['qty'];
                                    $order_size = $row_order['size'];
                                    $order_color = $row_order['color'];
                                    $order_pic = $row_order['pic_name'];
                                    $order_draw = $row_order['draw_name'];
                                    $order_total = $order_due * $order_qty;
                                    $order_date = $row_order['order_date'];
                                    $order_status = $row_order['order_status'];
                                    $i++;
                            
                            ?>

                            <tr> <!-- tr begin -->
                                <td> <?php echo $order_id; ?> </td>
                                <td> <?php echo $customer_name; ?> </td>
                                <td> <?php echo $order_prod; ?> </td>
                                <td> <?php echo $order_due; ?> </td>
                                <td> <?php echo $order_invoice_no; ?> </td>
                                <td> <?php echo $order_qty; ?> </td>
                                <td> <?php echo $order_size; ?> </td>
                                <td> <?php echo $order_color; ?> </td>
                                <td> <?php echo $order_pic; ?> </td>
                                <td> <?php echo $order_draw; ?> </td>
                                <td> <?php echo $order_total; ?> </td>
                                <td> <?php echo $order_date; ?> </td>

                                <td> <?php echo $order_status; ?> </td>

                                <td> <a href="index.php?edit_status=<?php echo $order_id; ?>">

                                    <i class="fa fa-pencil"></i> Állapot frissítése
                            
                                </a> </td>
                                
                                <td> <a href="index.php?delete_order=<?php echo $order_id; ?>">

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
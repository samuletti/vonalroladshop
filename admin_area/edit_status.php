<?php 

    include("includes/db.php");

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
?>

<?php

    if(isset($_GET['edit_status'])){

        $edit_id = $_GET['edit_status'];
        $get_o = "select * from customer_orders where order_id='$edit_id'";
        $run_edit = mysqli_query($con,$get_o);
        $row_edit = mysqli_fetch_array($run_edit);

        $o_id = $row_edit['order_id'];
        $customer_id = $row_edit['customer_id'];
        $invoice_no = $row_edit['invoice_no'];
        $o_stat = $row_edit['order_status'];
        
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit Product </title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
    
    <div class="row"> <!-- row begin -->

        <div class="col-lg-12"> <!-- col-lg-12 begin -->

            <ol class="breadcrumb"> <!-- breadcrumb begin -->

                <li class="active"> <!-- li active begin -->

                    <i class="fa fa-dashboard"></i> Kezelőfelület / Rendelés állapotának frissítése <!-- vagy "Insert Products" -->

                </li> <!-- li active finish -->

            </ol> <!-- breadcrumb finish -->

        </div> <!-- col-lg-12 finish -->

    </div> <!-- row finish -->

    <div class="row"> <!-- row begin -->

        <div class="col-lg-12"> <!-- col-lg-12 begin -->

            <div class="panel panel-default"> <!-- panel panel-default begin -->

                <div class="panel-heading"> <!-- panel-heading begin -->

                    <h3 class="panel-title"> <!-- panel-title begin -->

                        <i class="fa fa-money fa-fw"></i> Rendelés állapotának frissítése

                    </h3> <!-- panel-title begin -->

                </div> <!-- panel-heading finish -->

            </div> <!-- panel panel-default finish -->

            <div class="panel-body"> <!-- panel-body begin -->

                <form method="post" class="form-horizontal" enctype="multipart/form-data"> <!-- form-horizontal begin -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Rendelés azonosítója </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="order_id" type="text" class="form-control" readonly value="<?php echo $o_id; ?>">

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->
                    <label class="col-md-3 control-label"> Vásárló azonosítója </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="customer_id" type="text" class="form-control" readonly value="<?php echo $customer_id; ?>">

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->
                    <label class="col-md-3 control-label"> Számla sorszáma </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="invoice_no" type="text" class="form-control" readonly value="<?php echo $invoice_no; ?>">

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Állapot </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <select name="stat" class="form-control"> <!-- form-control begin -->

                                <option value="<?php echo $o_stat; ?>"> <?php echo $o_stat; ?> </option>
                                <option value="Pending"> Pending </option>
                                <option value="Paid / In Progress"> Paid / In Progress </option>
                                <option value="In Transit"> In Transit </option>
                                <option value="Completed"> Completed </option>

                            </select> <!-- form-control finish -->

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="update" value="Update Status" type="submit" class="btn btn-primary form-control">

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                </form> <!-- form-horizontal finish -->

            </div> <!-- panel-body finish -->

        </div> <!-- col-lg-12 finish -->

    </div> <!-- row finish --> 

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php

    if(isset($_POST['update'])){

        $o_id = $_POST['order_id'];
        $customer_id = $_POST['customer_id'];
        $invoice_no = $_POST['invoice_no'];
        $o_stat = $_POST['stat'];

        $update_stat = "update customer_orders set order_status='$o_stat' where order_id='$o_id'";

        $run_stat = mysqli_query($con,$update_stat);

        if($run_stat){

            echo "<script>alert('Sikeres rendelés állapot frissítés')</script>";
            echo "<script>window.open('index.php?view_orders','_self')</script>";

        }

    }

?>

<?php } ?>
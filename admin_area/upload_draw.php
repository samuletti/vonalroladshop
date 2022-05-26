<?php 

    include("includes/db.php");

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{


?>
<body>
    
    <div class="row"> <!-- row begin -->

        <div class="col-lg-12"> <!-- col-lg-12 begin -->

            <ol class="breadcrumb"> <!-- breadcrumb begin -->

                <li class="active"> <!-- li active begin -->

                    <i class="fa fa-dashboard"></i> Kezelőfelület / Rajz feltöltése<!-- vagy "Insert Products" -->

                </li> <!-- li active finish -->

            </ol> <!-- breadcrumb finish -->

        </div> <!-- col-lg-12 finish -->

    </div> <!-- row finish -->

    <div class="row"> <!-- row begin -->

        <div class="col-lg-12"> <!-- col-lg-12 begin -->

            <div class="panel panel-brown"> <!-- panel panel-default begin -->

                <div class="panel-heading"> <!-- panel-heading begin -->

                    <h3 class="panel-title"> <!-- panel-title begin -->

                        <i class="fa fa-upload"></i> Rajz feltöltése

                    </h3> <!-- panel-title begin -->

                </div> <!-- panel-heading finish -->

            </div> <!-- panel panel-default finish -->
<p class="pull-right">* Kötelező</p>
            <div class="panel-body"> <!-- panel-body begin -->

                <form method="post" class="form-horizontal" enctype="multipart/form-data"> <!-- form-horizontal begin -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Vásárló azonosítója (ID)* </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="customer_id" type="text" class="form-control" required>

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Vásárló e-mail címe* </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="customer_email" type="text" class="form-control" required>

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Fénykép azonosítója (ID)* </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="pic_id" type="text" class="form-control" required>

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Rajz* </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="drawing" type="file" class="form-control" required>

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="upload" value="Rajz feltöltése" type="submit" class="btn btn-primary form-control">

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

    if(isset($_POST['upload'])){

        $customer_id = $_POST['customer_id'];
        $pic_id = $_POST['pic_id'];
        $customer_email = $_POST['customer_email'];
        
        $drawing = $_FILES['drawing']['name'];
        
        $drawing_type = $_FILES['drawing']['type'];
        
        $temp_name = $_FILES['drawing']['tmp_name'];
        
        $img_path = "../customer/customers/";

        move_uploaded_file($temp_name,$img_path . $customer_email . "/draws" . "/" . $drawing);

        $insert_pic = "insert into drawings (customer_id,pic_id,draw_name) values('$customer_id','$pic_id','$drawing')";

        $run_pic = mysqli_query($con, $insert_pic);

        if($run_pic){

            echo "<script>alert('Rajz sikeres feltöltése')</script>";
            echo "<script>window.open('index.php?view_draws','_self')</script>";

        }

    }

?>

<?php } ?>
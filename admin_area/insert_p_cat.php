<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
        
?>

<div class="row"> <!-- row begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <ol class="breadcrumb"> <!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Kezelőfelület / Termék típus létrehozása

            </li>
        </ol> <!-- breadcrumb begin -->
    </div> <!-- col-lg-12 begin -->
</div> <!-- row begin -->

<div class="row"> <!-- row begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <div class="panel panel-brown"> <!-- panel panel-default begin -->
            <div class="panel-heading"> <!-- panel-heading begin -->
                <h3 class="panel-title"> <!-- panel-title begin -->
                    <i class="fa fa-plus"></i> Termék típus létrehozása
                </h3> <!-- panel-title finish -->
            </div> <!-- panel-heading finish -->
            <p class="pull-right">* Kötelező</p>
            <div class="panel-body"> <!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"> <!-- form-horizontal begin -->
                    <div class="form-group"> <!-- form-group begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 begin -->
                            Termék típus neve * 
                        </label> <!-- control-label col-md-3 finish -->

                        <div class="col-md-6"> <!-- col-md-6 begin -->
                            <input name="p_cat_title" type="text" class="form-control" required>
                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 begin -->
                            Termék típus leírása 
                        </label> <!-- control-label col-md-3 finish -->

                        <div class="col-md-6"> <!-- col-md-6 begin -->
                            <textarea type="text" name="p_cat_desc" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 begin -->
                            
                        </label> <!-- control-label col-md-3 finish -->

                        <div class="col-md-6"> <!-- col-md-6 begin -->
                            <input value="Termék típus létrehozása" name="submit" type="submit" class="form-control btn btn-primary">
                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->
                    
                </form> <!-- form-horizontal finish -->
            </div> <!-- panel-body finish -->
            
        </div> <!-- panel panel-default finish -->
    </div> <!-- col-lg-12 finish -->
</div> <!-- row finish -->

<?php 

    if(isset($_POST['submit'])){

        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_desc = $_POST['p_cat_desc'];
        $insert_p_cat = "insert into product_categories (p_cat_title,p_cat_desc) values ('$p_cat_title','$p_cat_desc')";
        $run_p_cat = mysqli_query($con,$insert_p_cat);

        if($run_p_cat){

            echo "<script>alert('Új termék típus hozzáadva')</script>";
            echo "<script>window.open('index.php?view_p_cats','_self')</script>";

        }

    }

?>

<?php } ?>
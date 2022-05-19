<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
        
?>

<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
        
?>

<div class="row"> <!-- row begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <ol class="breadcrumb"> <!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Kezelőfelület / Dia hozzáadása

            </li>
        </ol> <!-- breadcrumb begin -->
    </div> <!-- col-lg-12 begin -->
</div> <!-- row begin -->

<div class="row"> <!-- row begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <div class="panel panel-brown"> <!-- panel panel-default begin -->
            <div class="panel-heading"> <!-- panel-heading begin -->
                <h3 class="panel-title"> <!-- panel-title begin -->
                    <i class="fa fa-gear fa-fw"></i> Dia hozzáadása
                </h3> <!-- panel-title finish -->
            </div> <!-- panel-heading finish -->

            <div class="panel-body"> <!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"> <!-- form-horizontal begin -->
                    <div class="form-group"> <!-- form-group begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 begin -->
                            Dia neve
                        </label> <!-- control-label col-md-3 finish -->

                        <div class="col-md-6"> <!-- col-md-6 begin -->
                            <input name="slide_name" type="text" class="form-control">
                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 begin -->
                                Dia
                        </label> <!-- control-label col-md-3 finish -->

                        <div class="col-md-6"> <!-- col-md-6 begin -->
                            <input type="file" name="slide_image" class="form-control">
                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 begin -->
                            
                        </label> <!-- control-label col-md-3 finish -->

                        <div class="col-md-6"> <!-- col-md-6 begin -->
                            <input value="Submit Now" name="submit" type="submit" class="form-control btn btn-primary">
                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->
                    
                </form> <!-- form-horizontal finish -->
            </div> <!-- panel-body finish -->
            
        </div> <!-- panel panel-default finish -->
    </div> <!-- col-lg-12 finish -->
</div> <!-- row finish -->

<?php 

    if(isset($_POST['submit'])){

        $slide_name = $_POST['slide_name'];
        $slide_image = $_FILES['slide_image']['name'];
        $temp_name = $_FILES['slide_image']['tmp_name'];
        $view_slides = "select * from slider";
        $view_run_slide = mysqli_query($con,$view_slides);
        $count = mysqli_num_rows($view_run_slide);
        if($count < 4){

            move_uploaded_file($temp_name,"slides_images/$slide_image");

            $insert_slide = "insert into slider (slide_name,slide_image) values ('$slide_name','$slide_image')";

            $run_slide = mysqli_query($con,$insert_slide);

            echo "<script>alert('Dia sikeresen hozzáadva')</script>";
            echo "<script>window.open('index.php?view_slides','_self')</script>";

        }else{

            echo "<script>alert('Nincs lehetőség új dia beszúrására. A diavetítés már tartalmaz 4 diát')</script>";
            
        }

    }

?>

<?php } ?>

<?php } ?>
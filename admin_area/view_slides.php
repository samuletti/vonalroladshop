<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
        
?>

<div class="row"> <!-- row begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <ol class="breadcrumb"> <!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Kezelőfelület / Diák megtekintése

            </li>
        </ol> <!-- breadcrumb begin -->
    </div> <!-- col-lg-12 begin -->
</div> <!-- row begin -->

<div class="row"> <!-- row begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <div class="panel panel-brown"> <!-- panel panel-default begin -->
            <div class="panel-heading"> <!-- panel-heading begin -->
                <h3 class="panel-title"> <!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Diák megtekintése
                </h3> <!-- panel-title finish -->
            </div> <!-- panel-heading finish -->

            <div class="panel-body"> <!-- panel-body begin -->

                <div class="table-responsive"> <!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"> <!-- table table-hover table-striped table-bordered begin -->
                        <thead> <!-- thead begin -->
                            <tr> <!-- tr begin -->
                                <th> Dia ID </th>
                                <th> Dia neve </th>
                                <th> Dia </th>
                                <th> Szerkesztés </th>
                                <th> Törlés </th>
                            </tr> <!-- tr finish -->
                        </thead> <!-- thead finish -->

                        <tbody> <!-- tbody begin -->

                            <?php 

                                $i = 0;

                                $get_slides = "select * from slider";
                                $run_slides = mysqli_query($con,$get_slides);
                                while($row_slides = mysqli_fetch_array($run_slides)){

                                    $slide_id = $row_slides['slide_id'];
                                    $slide_name = $row_slides['slide_name'];
                                    $slide_image = $row_slides['slide_image'];

                                    $i++;

                            ?>

                            <tr> <!-- tr begin -->
                                <td> <?php echo $slide_id; ?> </td>
                                <td> <?php echo $slide_name; ?> </td>
                                <td width="300"> <img class="img-responsive" src="slides_images/<?php echo $slide_image; ?>"> </td>
                                <td> <a href="index.php?edit_slide=<?php echo $slide_id; ?>">
                                    <i class="fa fa-pencil"></i> Szerkesztés
                                </a>  </td>
                                <td> <a href="index.php?delete_slide=<?php echo $slide_id; ?>">
                                    <i class="fa fa-trash"></i> Törlés
                                </a>  </td>
                            </tr> <!-- tr finish -->

                        <?php } ?>
                        </tbody> <!-- tbody finisg -->
                        
                    </table> <!-- table table-hover table-striped table-bordered finish -->
                </div> <!-- table-responsive finish -->
                
            </div> <!-- panel-body finish -->
            
        </div> <!-- panel panel-default finish -->
    </div> <!-- col-lg-12 finish -->
</div> <!-- row finish -->

<?php } ?>
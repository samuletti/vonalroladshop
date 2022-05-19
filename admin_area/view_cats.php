<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
        
?>

<div class="row"> <!-- row begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <ol class="breadcrumb"> <!-- breadcrumb begin -->
            <li>

                <i class="fa fa-dashboard"></i> Kezelőfelület / Kategóriák megtekintése

            </li>
        </ol> <!-- breadcrumb begin -->
    </div> <!-- col-lg-12 begin -->
</div> <!-- row begin -->

<div class="row"> <!-- row begin -->
    <div class="col-lg-12"> <!-- col-lg-12 begin -->
        <div class="panel panel-brown"> <!-- panel panel-default begin -->
            <div class="panel-heading"> <!-- panel-heading begin -->
                <h3 class="panel-title"> <!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Kategóriák megtekintése
                </h3> <!-- panel-title finish -->
            </div> <!-- panel-heading finish -->

            <div class="panel-body"> <!-- panel-body begin -->

                <div class="table-responsive"> <!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"> <!-- table table-hover table-striped table-bordered begin -->
                        <thead> <!-- thead begin -->
                            <tr> <!-- tr begin -->
                                <th> Kategória ID </th>
                                <th> Kategória neve </th>
                                <th> Kategória leírása </th>
                                <th> Kategória szerkesztése </th>
                                <th> Kategória törlése </th>
                            </tr> <!-- tr finish -->
                        </thead> <!-- thead finish -->

                        <tbody> <!-- tbody begin -->

                            <?php 

                                $i = 0;

                                $get_cats = "select * from categories";
                                $run_cats = mysqli_query($con,$get_cats);
                                while($row_cats = mysqli_fetch_array($run_cats)){

                                    $cat_id = $row_cats['cat_id'];
                                    $cat_title = $row_cats['cat_title'];
                                    $cat_desc = $row_cats['cat_desc'];

                                    $i++;

                            ?>

                            <tr> <!-- tr begin -->
                                <td> <?php echo $cat_id; ?> </td>
                                <td> <?php echo $cat_title; ?> </td>
                                <td width="300"> <?php echo $cat_desc; ?> </td>
                                <td> <a href="index.php?edit_cat=<?php echo $cat_id; ?>">
                                    <i class="fa fa-pencil"></i> Szerkesztés
                                </a>  </td>
                                <td> <a href="index.php?delete_cat=<?php echo $cat_id; ?>">
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
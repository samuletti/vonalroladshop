<?php 

    include("includes/db.php");

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
?>

<?php

    if(isset($_GET['edit_product'])){

        $edit_id = $_GET['edit_product'];
        $get_p = "select * from products where product_id='$edit_id'";
        $run_edit = mysqli_query($con,$get_p);
        $row_edit = mysqli_fetch_array($run_edit);

        $p_id = $row_edit['product_id'];
        $p_title = $row_edit['product_title'];
        $p_cat = $row_edit['p_cat_id'];
        $cat = $row_edit['cat_id'];
        $p_image1 = $row_edit['product_img1'];
        $p_image2 = $row_edit['product_img2'];
        $p_image3 = $row_edit['product_img3'];
        $p_price = $row_edit['product_price'];
        $p_desc = $row_edit['product_desc'];
        $p_date = $row_edit['date'];
        
        
        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";
        $run_p_cat = mysqli_query($con,$get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_title = $row_p_cat['p_cat_title'];
        
    }
?>

<body>
    
    <div class="row"> <!-- row begin -->

        <div class="col-lg-12"> <!-- col-lg-12 begin -->

            <ol class="breadcrumb"> <!-- breadcrumb begin -->

                <li class="active"> <!-- li active begin -->

                    <i class="fa fa-dashboard"></i> Kezelőfelület / Termék szerkesztése<!-- vagy "Insert Products" -->

                </li> <!-- li active finish -->

            </ol> <!-- breadcrumb finish -->

        </div> <!-- col-lg-12 finish -->

    </div> <!-- row finish -->

    <div class="row"> <!-- row begin -->

        <div class="col-lg-12"> <!-- col-lg-12 begin -->

            <div class="panel panel-brown"> <!-- panel panel-default begin -->

                <div class="panel-heading"> <!-- panel-heading begin -->

                    <h3 class="panel-title"> <!-- panel-title begin -->

                        <i class="fa fa-pencil"></i> Termék szerkesztése

                    </h3> <!-- panel-title begin -->

                </div> <!-- panel-heading finish -->

            </div> <!-- panel panel-default finish -->
            <p class="pull-right">* Kötelező</p>

            <div class="panel-body"> <!-- panel-body begin -->

                <form method="post" class="form-horizontal" enctype="multipart/form-data"> <!-- form-horizontal begin -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Termék neve* </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Termék típusa* </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <select name="product_cat" class="form-control" required> <!-- form-control begin -->

                                <option value="<?php echo $p_cat_title; ?>" disabled selected> <?php echo $p_cat_title; ?> </option>
                                <?php 

                                    $get_p_cats = "select * from product_categories";
                                    $run_p_cats = mysqli_query($con, $get_p_cats);

                                    while ($row_p_cats=mysqli_fetch_array($run_p_cats)){

                                        $p_cat_id = $row_p_cats['p_cat_id'];
                                        $p_cat_title = $row_p_cats['p_cat_title'];

                                        echo "

                                            <option value='$p_cat_id'> $p_cat_title </option>

                                        ";

                                    }
                                
                                ?>

                            </select> <!-- form-control finish -->

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Termék Fotó 1* </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="product_img1" type="file" class="form-control" required>
                            <br>
                            <img width="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_title; ?>">

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Termék Fotó 2* </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="product_img2" type="file" class="form-control" required>
                            <br>
                            <img width="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_title; ?>">


                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Termék Fotó 3* </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="product_img3" type="file" class="form-control" required>
                            <br>
                            <img width="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_title; ?>">


                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Termék ára* </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"> Termék leírása </label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <textarea name="product_desc" cols="19" rows="10" class="form-control">

                            <?php echo $p_desc; ?>
                                
                            </textarea>

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                    <div class="form-group"> <!-- form-group begin -->

                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6"> <!-- col-md-6 begin -->

                            <input name="update" value="Termék frissítése" type="submit" class="btn btn-primary form-control">

                        </div> <!-- col-md-6 finish -->

                    </div> <!-- form-group finish -->

                </form> <!-- form-horizontal finish -->

            </div> <!-- panel-body finish -->

        </div> <!-- col-lg-12 finish -->

    </div> <!-- row finish --> 

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</body>
</html>

<?php

    if(isset($_POST['update'])){

        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        
        $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];
        $product_desc = $_POST['product_desc'];

        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $img_type1 = $_FILES['product_img1']['type'];
        $img_type2 = $_FILES['product_img2']['type'];
        $img_type3 = $_FILES['product_img3']['type'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        $img_path = "product_images/";

        move_uploaded_file($temp_name1,$img_path . $product_img1);
        move_uploaded_file($temp_name2,$img_path . $product_img2);
        move_uploaded_file($temp_name3,$img_path . $product_img3);

        $update_product = "update products set p_cat_id='$product_cat',date='$p_date',product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_desc='$product_desc' where product_id='$p_id'";

        $run_product = mysqli_query($con,$update_product);

        if($run_product){

            echo "<script>alert('Sikeres termék szerkesztés')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";

        }

    }

?>

<?php } ?>
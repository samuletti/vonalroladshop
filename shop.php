<?php 

    $active = "Shop";
    include("includes/header.php");

?>

        <div id="content"> <!-- #content begin -->
            <div class="container"> <!-- container begin -->
                <div class="col-md-12"> <!-- col-md-12 begin -->

                    <ul class="breadcrumb"> <!-- breadcrumb begin -->
                        <li>
                            <a href="index.php">Főoldal</a>
                        </li>
                        <li>
                            Bolt
                        </li>
                    </ul> <!-- breadcrumb finish -->

                </div> <!-- col-md-12 finish -->

                <div class="col-md-3"> <!-- col-md-3 begin -->
                    <?php 
            
                        include("includes/sidebar.php");
            
                    ?>

                </div> <!-- col-md-3 finish -->

                <div class="col-md-9"> <!-- col-md-9 begin -->

                <?php

                    if (!isset($_GET['p_cat'])) {  
                        if(!isset($_GET['cat'])) {                  
                            echo "
                                
                                <div class='box'> <!-- box begin -->
                                    <h1>VonalRólad Bolt</h1>
                                    <p>A VonalRólad Boltban lehetőséged van egyaránt digitális és fizikai termékeket vásárolni. Digitális terméknek számít a fekete-fehér és a színes digitális vonalrajz, amelyet a saját fényképed alapján készítünk el kézzel rajzolva, digitális eszközökkel. Minden egyéb termék fizikai terméknek számít, például: nyomtatott, keretezett változata a vonalrajzodnak, póló, amelyre a vonalrajzodat nyomtatjuk, stb. Egyes termékeknél van lehetőséged színt és/vagy méretet választani. Minden esetben ki tudod választani, mely fényképből szeretnél digitális vonalrajzot - a fiókodba feltöltött fényképek közül tudsz választani; illetve, hogy melyik elkészült rajzból szeretnél fizikai terméket - a fiókodban található, már elkészült rajzok közül tudsz választani.</p>
                                </div> <!-- box finish -->
                                
                            ";
                        }
                    }

                ?>

                <div class="row"> <!-- row begin -->

                    <?php 

                        if (!isset($_GET['p_cat'])) {  
                        if(!isset($_GET['cat'])) {                  
                            
                            $per_page = 6;

                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                            }
                            else{
                                $page = 1;
                            }

                            $start_from = ($page-1) * $per_page;
                            
                            $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";

                            $run_products = mysqli_query($con,$get_products);

                            while($row_products=mysqli_fetch_array($run_products)){

                                $pro_id = $row_products['product_id'];

                                $pro_title = $row_products['product_title'];

                                $pro_price = $row_products['product_price'];

                                $pro_img1 = $row_products['product_img1'];

                                echo "

                                    <div class='col-md-4 col-sm-6 center-responsive'>

                                        <div class='product'>

                                            <a href='details.php?pro_id=$pro_id'>

                                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                            
                                            </a>

                                            <div class='text'>

                                                <h3>

                                                <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                                                
                                                </h3>

                                                <p class='price'>

                                                    $pro_price Ft
                                                
                                                </p>

                                                <p class='buttons center-responsive'>

                                                    <a class='btn btn-default shop' href='details.php?pro_id=$pro_id'>

                                                        Részletek
                                                    
                                                    </a>

                                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                                        <i class='fa fa-shopping-cart'></i>Kosárba
                                                    
                                                    </a>
                                                
                                                </p>
                                            
                                            </div>
                                        
                                        </div>
                                    
                                    </div>
                                
                                ";

                            }


                    ?>
                
                </div> <!-- row finish -->

                    <center>
                        <ul class="pagination"> <!-- pagination begin -->

                        <?php

                            $query = "select * from products";

                            $result = mysqli_query($con,$query);

                            $total_records = mysqli_num_rows($result);

                            $total_pages = ceil($total_records / $per_page);

                            echo "

                                <li>
                                
                                    <a href='shop.php?page=1'> ".'Első oldal'." </a>
                                
                                </li>
                            
                            ";

                            for($i = 1; $i <= $total_pages; $i++){

                                echo "

                                <li>
                                
                                    <a href='shop.php?page=".$i."'> ".$i." </a>
                                
                                </li>
                            
                            "; 

                            }

                            echo "

                                <li>
                                
                                    <a href='shop.php?page=$total_pages'> ".'Utolsó oldal'." </a>
                                
                                </li>
                            
                            ";

                                }
                            }

                        ?>
                            
                        </ul> <!-- pagination finish -->
                    </center>

                    <?php
                    
                    getPCatPro(); 
                    
                    /* getCatPro(); */

                    ?>

                </div> <!-- col-md-9 finish -->

            </div> <!-- container finish -->
        </div> <!-- #content finish -->

        <?php 
        
        include("includes/footer.php");
        
        ?>

        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>

    </body>
</html>
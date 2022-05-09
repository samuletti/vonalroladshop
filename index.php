<?php 
    $active = "Home";
    include("includes/header.php");

?>

        <div class="container" id="slider"> <!-- container begin -->
            
            <div class="col-md-12"> <!-- col-md-12 begin -->

            <div class="carousel slide" id="myCarousel" data-ride="carousel"> <!-- carousel slide begin -->
            
                <ol class="carousel-indicators"><!-- carousel-indicators begin -->
                    
                    <li class="active" data-target="#myCarousel" data-slide-to="0"><li>
                    <li data-target="#myCarousel" data-slide-to="1"><li>
                    <li data-target="#myCarousel" data-slide-to="2"><li>
                    <li data-target="#myCarousel" data-slide-to="3"><li>

                </ol> <!-- carousel-indicators finish -->
                
                <div class="carousel-inner"> <!-- carousel-inner begin -->
                        
                    <?php

                        $get_slides = "select * from slider LIMIT 0,1";
                        $run_slides = mysqli_query($con,$get_slides);

                        while($row_slides=mysqli_fetch_array($run_slides)){

                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];

                            echo "

                            <div class='item active'>

                                <img src='admin_area/slides_images/$slide_image'>

                            </div>
                            
                            ";

                        }

                        $get_slides = "select * from slider LIMIT 1,3";
                        $run_slides = mysqli_query($con,$get_slides);

                        while($row_slides=mysqli_fetch_array($run_slides)){

                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];

                            echo "

                            <div class='item'>

                                <img src='admin_area/slides_images/$slide_image'>

                            </div>
                            
                            ";

                        }

                    ?>

                </div> <!-- carousel-inner finish -->

                <a href="#myCarousel" class="left carousel-control" data-slide="prev"> <!-- left carousel-control begin -->

                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Előző</span>

                </a> <!-- left carousel-control finish -->

                <a href="#myCarousel" class="right carousel-control" data-slide="next"> <!-- right carousel-control begin -->

                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Következő</span>

                </a> <!-- right carousel-control finish -->

            </div> <!-- carousel slide finish -->

            </div> <!-- col-md-12 finish -->

        </div> <!-- container finish -->

        <div class="container"> <!-- container begin -->

            <p>Bemutatkozó leírás Lorem ipsum, dolor sit amet consectetur adipisicing elit. A impedit quis porro, accusamus unde commodi, eaque excepturi repudiandae dolores ab, exercitationem adipisci est totam! Maxime, sunt? Nobis id fugit quas. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit mollitia asperiores aliquam repudiandae? In maxime dolorum sed quidem assumenda rem, ad, non similique culpa quod minus adipisci distinctio, porro magni.</p>

        </div> <!-- container finish -->

        <div id="hot"> <!-- #hot begin -->

            <div class="box"> <!-- box begin -->

                <div class="container"> <!-- container begin -->

                    <div class="col-md-12"> <!-- col-md-12 begin -->

                        <h2>
                            Legújabb termékek
                        </h2>
                        
                    </div> <!-- col-md-12 finish -->

                </div> <!-- container finish -->

            </div> <!-- box finish -->

        </div> <!-- #hot finish -->

        <div id="content" class="container"> <!-- container begin -->
            
            <div class="row"> <!-- row begin -->

            <?php

            getPro();
            
            ?>

            </div> <!-- row finish -->

        </div> <!-- container finish -->

        <?php 
        
        include("includes/footer.php");
        
        ?>

        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>

    </body>
</html>
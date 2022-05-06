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
                    <span class="sr-only">Previous</span>

                </a> <!-- left carousel-control finish -->

                <a href="#myCarousel" class="right carousel-control" data-slide="next"> <!-- right carousel-control begin -->

                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>

                </a> <!-- right carousel-control finish -->

            </div> <!-- carousel slide finish -->

            </div> <!-- col-md-12 finish -->

        </div> <!-- container finish -->

        <div id="advantages"> <!-- #advanteges begin -->

            <div class="container"> <!-- container begin -->

                <div class="same-height row"> <!-- same-height-row begin -->

                    <div class="col-sm-4"> <!-- col-sm-4 begin -->

                        <div class="box same-height"> <!-- box same-height begin -->

                            <div class="icon"> <!-- icon begin -->

                                <i class="fa fa-heart"></i>

                            </div> <!-- icon finish -->

                            <h3><a href="#">Best Offer</a></h3>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                        </div> <!-- box same-height finish -->

                    </div> <!-- col-sm-4 finish -->

                    <div class="col-sm-4"> <!-- col-sm-4 begin -->

                        <div class="box same-height"> <!-- box same-height begin -->

                            <div class="icon"> <!-- icon begin -->

                                <i class="fa fa-tag"></i>

                            </div> <!-- icon finish -->

                            <h3><a href="#">Best Prices</a></h3>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                        </div> <!-- box same-height finish -->

                    </div> <!-- col-sm-4 finish -->
                    
                    <div class="col-sm-4"> <!-- col-sm-4 begin -->

                        <div class="box same-height"> <!-- box same-height begin -->

                            <div class="icon"> <!-- icon begin -->

                                <i class="fa fa-thumbs-up"></i>

                            </div> <!-- icon finish -->

                            <h3><a href="#">100% original Products</a></h3>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                        </div> <!-- box same-height finish -->

                    </div> <!-- col-sm-4 finish -->

                </div> <!-- same-height-row finish -->

            </div> <!-- container finish -->

        </div> <!-- #advanteges finish -->

        <div id="hot"> <!-- #hot begin -->

            <div class="box"> <!-- box begin -->

                <div class="container"> <!-- container begin -->

                    <div class="col-md-12"> <!-- col-md-12 begin -->

                        <h2>
                            Our Latest Products
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
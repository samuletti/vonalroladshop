<div class="panel panel-default sidebar-menu"> <!-- panel panel-default sidebar-menu begin -->

    <div class="panel-heading"> <!-- panel-heading begin -->
    
        <h3 class="panel-title">Termék típusok</h3>

    </div> <!-- panel-heading finish -->

    <div class="panel-body"> <!-- panel-body begin -->
        <ul class="nav nav-pills nav-stacked category-menu"> <!-- nav nav-pills nav-stacked category-menu begin -->

            <?php getPCats(); ?>

        </ul> <!-- nav nav-pills nav-stacked category-menu finish -->
    </div> <!-- panel-body finish -->

</div> <!-- panel panel-default sidebar-menu finish -->

<div class="panel panel-default sidebar-menu"> <!-- panel panel-default sidebar-menu begin -->

    <div class="panel-heading"> <!-- panel-heading begin -->
    
        <h3 class="panel-title">Fénykép feltöltése / Elkészült rajzok megtekintése</h3>

    </div> <!-- panel-heading finish -->

    <div class="panel-body"> <!-- panel-body begin -->
        <ul class="nav nav-pills nav-stacked category-menu"> <!-- nav nav-pills nav-stacked category-menu begin -->

        <li class="<?php if(isset($_GET['upload_pic'])){echo"active";} ?>">
                <a href="customer/my_account.php?upload_pic">

                    <i class="fa fa-camera"></i> Fotó feltöltése

                </a>
            </li>

            <li class="<?php if(isset($_GET['download_draw'])){echo"active";} ?>">
                <a href="customer/my_account.php?download_draw">

                    <i class="fa fa-image"></i> Rajz letöltése

                </a>
            </li>

        </ul> <!-- nav nav-pills nav-stacked category-menu finish -->
    </div> <!-- panel-body finish -->

</div> <!-- panel panel-default sidebar-menu finish -->

<div class="panel panel-default sidebar-menu"> <!-- panel panel-default sidebar-menu begin -->

    <div class="panel-heading"> <!-- panel-heading begin -->
    
        <h3 class="panel-title">Rendelés menete</h3>

    </div> <!-- panel-heading finish -->

    <div class="panel-body"> <!-- panel-body begin -->
        <ol class="nav nav-pills nav-stacked category-menu"> <!-- nav nav-pills nav-stacked category-menu begin -->

            <li>
                <i class="fa fa-user"></i> Regisztrálj
            </li>

            <li>
                <i class="fa fa-camera"></i> Tölts fel egy fényképet
            </li>

            <li>
                <i class="fa fa-shopping-cart"></i> Rendelj egy digitális rajzot
            </li>

            <li>
                <i class="fa fa-money"></i> Fizesd ki
            </li>

            <li>
                <i class="fa fa-download"></i> Töltsd le az elkészült rajzot
            </li>

            <li>
                <i class="fa fa-gift"></i> Rendelj belőle fizikai terméket
            </li>


        </ol> <!-- nav nav-pills nav-stacked category-menu finish -->
    </div> <!-- panel-body finish -->

</div> <!-- panel panel-default sidebar-menu finish -->

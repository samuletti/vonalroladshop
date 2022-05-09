<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{
        
?>

<nav class="navbar navbar-inverse navbar-fixed-top"> <!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"> <!-- navbar-header begin -->

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <!-- navbar-toggle begin -->

            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button> <!-- navbar-toggle finish -->

        <a href="index.php?dashboard" class="navbar-brand">Admin Felület</a>

    </div> <!-- navbar-header finish -->

    <ul class="nav navbar-right top-nav"> <!-- nav navbar-right top-nav begin -->

        <li class="dropdown"> <!-- dropdown begin -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <!-- dropdown-toggle begin -->

                <i class="fa fa-user"></i> VonalRólad <b class="caret"></b>

            </a> <!-- dropdown-toggle finish -->

            <ul class="dropdown-menu"> <!-- dropdown-menu begin -->
                <li> <!-- li begin -->
                    <a href="index.php?user_profile"> <!-- a href begin -->

                        <i class="fa fa-fw fa-user"></i> Profil

                    </a> <!-- a href finish -->
                </li> <!-- li finish -->

                <li> <!-- li begin -->
                    <a href="index.php?view-products"> <!-- a href begin -->

                        <i class="fa fa-fw fa-envelope"></i> Termékek

                        <span class="badge">7</span>

                    </a> <!-- a href finish -->
                </li> <!-- li finish -->

                <li> <!-- li begin -->
                    <a href="index.php?view_customers"> <!-- a href begin -->

                        <i class="fa fa-fw fa-users"></i> Vásárlók

                        <span class="badge">11</span>

                    </a> <!-- a href finish -->
                </li> <!-- li finish -->

                <li> <!-- li begin -->
                    <a href="index.php?view_cats"> <!-- a href begin -->

                        <i class="fa fa-fw fa-gear"></i> Termék típusok

                        <span class="badge">4</span>

                    </a> <!-- a href finish -->
                </li> <!-- li finish -->

                <li class="divider"></li>

                <li> <!-- li begin -->
                    <a href="logout.php"> <!-- a href begin -->

                        <i class="fa fa-fw fa-power-off"></i> Kijelentkezés

                    </a> <!-- a href finish -->
                </li> <!-- li finish -->

            </ul> <!-- dropdown-menu finish -->

        </li> <!-- dropdown finish -->

    </ul> <!-- nav navbar-right top-nav finish -->

    <div class="collapse navbar-collapse navbar-ex1-collapse"> <!-- collapse navbar-collapse navbar-ex1-collapse begin -->
        <ul class="nav navbar-nav side-nav"> <!-- nav navbar-nav side-nav begin -->
            <li> <!-- li begin -->

                <a href="index.php?dashboard"> <!-- a href begin -->

                    <i class="fa fa-fw fa-dashboard"></i> Kezelőfelület

                </a> <!-- a href finish -->

            </li> <!-- li finish -->

            <li> <!-- li begin -->

                <a href="#" data-toggle="collapse" data-target="#products"> <!-- a href begin -->

                    <i class="fa fa-fw fa-tag"></i> Termékek
                    <i class="fa fa-fw fa-caret-down"></i>

                </a> <!-- a href finish -->

                <ul id="products" class="collapse"> <!-- collapse begin -->
                    <li> <!-- li begin -->
                        <a href="index.php?insert_product"> Termék hozzáadása </a>
                    </li> <!-- li finish -->
                    <li> <!-- li begin -->
                        <a href="index.php?view_products"> Termékek megtekintése </a>
                    </li> <!-- li finish -->
                </ul> <!-- collapse finish -->

            </li> <!-- li finish -->

            <li> <!-- li begin -->

                <a href="#" data-toggle="collapse" data-target="#p_cat"> <!-- a href begin -->

                    <i class="fa fa-fw fa-edit"></i> Termék típusok
                    <i class="fa fa-fw fa-caret-down"></i>

                </a> <!-- a href finish -->

                <ul id="p_cat" class="collapse"> <!-- collapse begin -->
                    <li> <!-- li begin -->
                        <a href="index.php?insert_p_cat"> Termék típus létrehozása </a>
                    </li> <!-- li begin -->
                    <li> <!-- li finish -->
                        <a href="index.php?view_p_cats"> Termék típusok megtekintése </a>
                    </li> <!-- li finish -->
                </ul> <!-- collapse finish -->

            </li> <!-- li finish -->

            <li> <!-- li begin -->

                <a href="#" data-toggle="collapse" data-target="#cat"> <!-- a href begin -->

                    <i class="fa fa-fw fa-book"></i> Kategóriák
                    <i class="fa fa-fw fa-caret-down"></i>

                </a> <!-- a href finish -->

                <ul id="cat" class="collapse"> <!-- collapse begin -->
                    <li> <!-- li begin -->
                        <a href="index.php?insert_category"> Kategória létrehozása </a>
                    </li> <!-- li begin -->
                    <li> <!-- li finish -->
                        <a href="index.php?view_cats"> Kategóriák megtekintése </a>
                    </li> <!-- li finish -->
                </ul> <!-- collapse finish -->

            </li> <!-- li finish -->

            <li> <!-- li begin -->

                <a href="#" data-toggle="collapse" data-target="#slides"> <!-- a href begin -->

                    <i class="fa fa-fw fa-gear"></i> Diavetítés
                    <i class="fa fa-fw fa-caret-down"></i>

                </a> <!-- a href finish -->

                <ul id="slides" class="collapse"> <!-- collapse begin -->
                    <li> <!-- li begin -->
                        <a href="index.php?insert_slide"> Dia hozzáadása </a>
                    </li> <!-- li begin -->
                    <li> <!-- li finish -->
                        <a href="index.php?view_slides"> Diák megtekintése </a>
                    </li> <!-- li finish -->
                </ul> <!-- collapse finish -->

            </li> <!-- li finish -->

            <li> <!-- li begin -->
                <a href="index.php?view_customers"> <!-- a href begin -->
                    <i class="fa fa-fw fa-users"></i> Vásárlók
                </a> <!-- a href finish -->
            </li> <!-- li finish -->

            <li> <!-- li begin -->
                <a href="index.php?view_orders"> <!-- a href begin -->
                    <i class="fa fa-fw fa-clipboard"></i> Rendelések megtekintése
                </a> <!-- a href finish -->
            </li> <!-- li finish -->

            <li> <!-- li begin -->
                <a href="index.php?view_payments"> <!-- a href begin -->
                    <i class="fa fa-fw fa-money"></i> Fizetések megtekintése
                </a> <!-- a href finish -->
            </li> <!-- li finish -->

            <li> <!-- li begin -->

                <a href="#" data-toggle="collapse" data-target="#users"> <!-- a href begin -->

                    <i class="fa fa-fw fa-users"></i> Felhasználók
                    <i class="fa fa-fw fa-caret-down"></i>

                </a> <!-- a href finish -->

                <ul id="users" class="collapse"> <!-- collapse begin -->
                    <li> <!-- li begin -->
                        <a href="index.php?insert_user"> Felhasználó hozzáadása </a>
                    </li> <!-- li begin -->
                    <li> <!-- li finish -->
                        <a href="index.php?view_users"> Felhasználók megtekintése </a>
                    </li> <!-- li finish -->
                    <li> <!-- li finish -->
                        <a href="index.php?user_profile"> Felhasználó módosítása </a>
                    </li> <!-- li finish -->
                </ul> <!-- collapse finish -->

            </li> <!-- li finish -->

            <li> <!-- li begin -->
                <a href="logout.php"> <!-- a href begin -->
                    <i class="fa fa-fw fa-power-off"></i> Kijelentkezés
                </a> <!-- a href finish -->
            </li> <!-- li finish -->

        </ul> <!-- nav navbar-nav side-nav finish -->
    </div> <!-- collapse navbar-collapse navbar-ex1-collapse finish -->

</nav> <!-- navbar navbar-inverse navbar-fixed-top finish -->

<?php } ?>
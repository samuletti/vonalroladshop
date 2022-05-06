<div class="panel panel-default sidebar-menu"> <!-- panel panel-default sidebar-menu begin -->

    <div class="panel-heading"> <!-- panel-heading begin -->

        <center> <!-- center begin -->

        <img src="customer_images/profile_pic.jpg" alt="VonalRólad Profilkép">

        </center> <!-- center finish -->

        <br/>

        <h3 align="center" class="panel-title"> <!-- panel-title begin -->

            Name: R4JGSN

        </h3> <!-- panel-title finish -->

    </div> <!-- panel-heading finish -->

    <div class="panel-body"> <!-- panel-body begin -->

        <ul class="nav-pills nav-stacked nav"> <!-- nav-pills nav-stacked nav begin -->

            <li class="<?php if(isset($_GET['my_orders'])){echo"active";} ?>">
                <a href="my_account.php?my_orders">

                    <i class="fa fa-list"></i> My Orders

                </a>
            </li>

            <li class="<?php if(isset($_GET['pay_offline'])){echo"active";} ?>">
                <a href="my_account.php?pay_offline">

                    <i class="fa fa-bolt"></i> Pay Offline

                </a>
            </li>

            <li class="<?php if(isset($_GET['edit_account'])){echo"active";} ?>">
                <a href="my_account.php?edit_account">

                    <i class="fa fa-pencil"></i> Edit Account

                </a>
            </li>

            <li class="<?php if(isset($_GET['change_pass'])){echo"active";} ?>">
                <a href="my_account.php?change_pass">

                    <i class="fa fa-lock"></i> Change Password

                </a>
            </li>

            <li class="<?php if(isset($_GET['delete_account'])){echo"active";} ?>">
                <a href="my_account.php?delete_account">

                    <i class="fa fa-trash-o"></i> Delete Account

                </a>
            </li>

            <li>
                <a href="logout.php">

                    <i class="fa fa-sign-out"></i> Log Out

                </a>
            </li>

        </ul> <!-- nav-pills nav-stacked nav finish -->

    </div> <!-- panel-body finish -->

</div> <!-- panel panel-default sidebar-menu finish -->
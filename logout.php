<?php

    session_start();
    
    if (isset($_SESSION['customer_email']))
    { 
        session_destroy();
        
        echo "<script>window.open('index.php','_self')</script>";
    }


?>
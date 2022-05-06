<?php

    $con = mysqli_connect("mysql.caesar.elte.hu","letti0418","tXzVx7Gje4yjbX3a","letti0418");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
      }
?>
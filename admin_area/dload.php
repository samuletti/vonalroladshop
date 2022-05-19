<?php

    include("includes/db.php");

    session_start();

    $cur_pic_id = $_GET['pic_id'];

    $get_pics = "select * from customer_pics where pic_id='$cur_pic_id'";

    $run_pics = mysqli_query($con,$get_pics);

    $row_pic = mysqli_fetch_array($run_pics);

    $cur_pic_name = $row_pic['pic_name'];

    $cur_customer_id = $row_pic['customer_id'];

    $get_customer = "select * from customers where customer_id='$cur_customer_id'";

    $run_customers = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customers);

    $cur_customer_email = $row_customer['customer_email'];

    $filepath = "../customer/customers/" . $cur_customer_email . "/pics" . "/" . $cur_pic_name;

    if(file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        die("Well done!");
    } else {
        http_response_code(404);
        die();
    }
?>
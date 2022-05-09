<?php

    include("includes/db.php");

    session_start();

    $cur_draw_id = $_GET['draw_id'];

    $get_draws = "select * from drawings where draw_id='$cur_draw_id'";

    $run_draws = mysqli_query($con,$get_draws);

    $row_draw = mysqli_fetch_array($run_draws);

    $cur_draw_name = $row_draw['draw_name'];

    $cur_customer_id = $row_draw['customer_id'];

    $get_customer = "select * from customers where customer_id='$cur_customer_id'";

    $run_customers = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customers);

    $cur_customer_email = $row_customer['customer_email'];

    $filepath = "customers/" . $cur_customer_email . "/draws" . "/" . $cur_draw_name;

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
<?php

    session_start();

    include("includes/db.php");
    include("functions/functions.php");

?>

<?php 

    $customer_email = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$customer_email'";
    $run_customers = mysqli_query($con,$get_customer);
    $row_customer = mysqli_fetch_array($run_customers);
    $customer_id = $row_customer['customer_id'];

    if(isset($_GET['c_id'])){

        $customer_id = $_GET['c_id'];

    }

    /* $ip_add = getRealIpUser(); */

    $status = "Pending";

    $invoice_no = mt_rand(10000,99999);

    $select_cart = "select * from cart where customer_id='$customer_id'";

    $run_cart = mysqli_query($con,$select_cart);

    while($row_cart = mysqli_fetch_array($run_cart)){

        $pro_id = $row_cart['p_id'];
        $pro_size = $row_cart['size'];
        $pro_qty = $row_cart['qty'];
        $pro_color = $row_cart['color'];
        $pic_name = $row_cart['pic_name'];
        $draw_name = $row_cart['draw_name'];

        $get_products = "select * from products where product_id='$pro_id'";

        $run_products = mysqli_query($con,$get_products);

        while($row_products = mysqli_fetch_array($run_products)){

            $prod_name = $row_products['product_title'];
            $sub_total = $row_products['product_price'] * $pro_qty;

            $insert_customer_order = "insert into customer_orders (customer_id,prod_title,due_amount,invoice_no,qty,size,order_date,order_status, color, pic_name, draw_name) values ('$customer_id','$prod_name','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status','$pro_color','$pic_name','$draw_name')";

            $run_customer_order = mysqli_query($con,$insert_customer_order);

            $insert_pending_order = "insert into pending_orders (customer_id,prod_title,invoice_no,product_id,qty,size,order_status, color, pic_name, draw_name) values ('$customer_id','$prod_name','$invoice_no','$pro_id','$pro_qty','$pro_size','$status','$pro_color','$pic_name','$draw_name')";

            $run_pending_order = mysqli_query($con,$insert_pending_order);

            $delete_cart = "delete from cart where customer_id='$customer_id'";

            $run_delete = mysqli_query($con,$delete_cart);

        }
    }
    
    echo "<script>alert('Sikeresen leadtad a rendelésedet!')</script>";
    echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

?>
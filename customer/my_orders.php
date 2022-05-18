<center> <!-- center begin -->

    <h1> Rendeléseim </h1>

    <p class="text-muted">
        Bármilyen kérdés esetén <a href="../contact.php">keress minket</a> bizalommal!
    </p>

</center> <!-- center finish -->

<hr>

<div class="table-responsive"> <!-- table-responsive begin -->

    <table class="table table-bordered table-hover"> <!-- table table-bordered table-hover begin -->

        <thead> <!-- thead begin -->

            <tr> <!-- tr begin -->

                <th> ID: </th>
                <th> Fiz.: </th>
                <th> Számla: </th>
                <th> Termék: </th>
                <th> Db: </th>
                <th> Méret: </th>
                <th> Szín: </th>
                <th> Fénykép: </th>
                <th> Rajz: </th>
                <th> Dátum: </th>
                <th> Állapot: </th>

            </tr> <!-- tr finish -->

        </thead> <!-- thead finish -->

        <tbody> <!-- tbody begin -->

            <?php 

                $customer_session = $_SESSION['customer_email'];

                $get_customer = "select * from customers where customer_email='$customer_session'";

                $run_customer = mysqli_query($con,$get_customer);

                $row_customers = mysqli_fetch_array($run_customer);

                $customer_id = $row_customers['customer_id'];

                $get_orders = "select * from customer_orders where customer_id='$customer_id'";

                $run_orders = mysqli_query($con,$get_orders);

                $i = 0;

                while($row_orders = mysqli_fetch_array($run_orders)){

                    $order_id = $row_orders['order_id'];
                    $due_amount = $row_orders['due_amount'];
                    $invoice_no = $row_orders['invoice_no'];
                    $qty = $row_orders['qty'];
                    $size = $row_orders['size'];
                    $color = $row_orders['color'];
                    $pic = $row_orders['pic_name'];
                    $draw = $row_orders['draw_name'];
                    $prod = $row_orders['prod_title'];
                    $order_date = substr($row_orders['order_date'],0,11);
                    $order_status = $row_orders['order_status'];

                    $i++;

                    if($order_status=='Pending'){

                        $order_status = 'Fizetésre vár';

                    }else{

                        $order_status = 'Fizetve';

                    }
            
            ?>

            <tr> <!-- tr begin -->

                <th> <?php echo"$order_id"; ?> </th>
                <td> <?php echo"$due_amount"; ?> Ft</td>
                <td> <?php echo"$invoice_no"; ?> </td>
                <td> <?php echo"$prod"; ?> </td>
                <td> <?php echo"$qty"; ?> </td>
                <td> <?php echo"$size"; ?> </td>
                <td> <?php echo"$color"; ?> </td>
                <td> <?php echo"$pic"; ?> </td>
                <td> <?php echo"$draw"; ?> </td>
                <td> <?php echo"$order_date"; ?> </td>
                <td> <?php echo"$order_status"; ?> </td>

            </tr> <!-- tr finish -->

            <?php } ?>

        </tbody> <!-- tbody finish -->

    </table> <!-- table table-bordered table-hover finish -->

</div> <!-- table-responsive finish -->
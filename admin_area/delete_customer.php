<?php 

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<?php 

    if(isset($_GET['delete_customer'])){
        
        $delete_id = $_GET['delete_customer'];

        $delete_acc = "delete from customers where customer_id='$delete_id'";

        $run_delete = mysqli_query($con,$delete_acc);

        if($run_delete){

            echo "<script>alert('You deleted this customer.')</script>";
            echo "<script>window.open('index.php?view_customers','_self')</script>";

        }
    }

?>

<?php } ?>
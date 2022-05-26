<?php

    $db = mysqli_connect("mysql.caesar.elte.hu","letti0418","tXzVx7Gje4yjbX3a","letti0418");

    // begin getRealIpUser()
    function getRealIpUser(){
        
        switch(true){

            case(!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];

            default: return $_SERVER['REMOTE_ADDR'];

        }
    }
    // finish getRealIpUser()

    //begin add_cart()
    function add_cart(){

        session_start();
        global $db;
        if(isset($_GET['add_cart'])){

            if(!isset($_SESSION['customer_email'])){
            $ip_add = getRealIpUser();
            $p_id = $_GET['add_cart'];

            $product_qty = $_POST['product_qty'];

            $product_size = $_POST['product_size'];
            
            $product_color = $_POST['product_color'];
            
            $product_pic = $_POST['product_pic'];

            $product_draw = $_POST['product_draw'];

            $query = "insert into cart (p_id,ip_add,qty,size,customer_id,color,pic_name,draw_name) values ('$p_id','$ip_add','$product_qty','$product_size', '$customer_id', '$product_color', '$product_pic', '$product_draw')";
            
            $run_query = mysqli_query($db,$query);
        }else{

            $customer_email = $_SESSION['customer_email'];

            $get_customer = "select * from customers where customer_email='$customer_email'";
            $run_customers = mysqli_query($db,$get_customer);
            $row_customer = mysqli_fetch_array($run_customers);
            $customer_id = $row_customer['customer_id'];

            $p_id = $_GET['add_cart'];

            $product_qty = $_POST['product_qty'];

            $product_size = $_POST['product_size'];
            
            $product_color = $_POST['product_color'];
            
            $product_pic = $_POST['product_pic'];

            $product_draw = $_POST['product_draw'];

            /* $check_product = "select * from cart where customer_id='$customer_id' AND p_id='$p_id'";

            $run_check = mysqli_query($db,$check_product); */

            $query = "insert into cart (p_id,ip_add,qty,size,customer_id,color,pic_name,draw_name) values ('$p_id','$ip_add','$product_qty','$product_size', '$customer_id', '$product_color', '$product_pic', '$product_draw')";

            /* echo $query; */
            $run_query = mysqli_query($db,$query);
        }

            echo "<script>window.open('shop.php','_self')</script>";

        }

    }
    //finish add_cart()

    // begin getPro()
    function getPro(){

        global $db;

        $get_products = "select * from products order by 1 DESC LIMIT 0,4";

        $run_products = mysqli_query($db,$get_products);

        while($row_products=mysqli_fetch_array($run_products)) {

            $pro_id = $row_products['product_id'];

            $pro_title = $row_products['product_title'];

            $pro_price = $row_products['product_price'];

            $pro_img1 = $row_products['product_img1'];

            echo "

            <div class='col-md-3 col-sm-6 center-responsive'>

                <div class='product'>

                    <a href='details.php?pro_id=$pro_id'>

                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                    </a>

                    <div class='text'>

                        <h3>

                            <a href='details.php?pro_id=$pro_id'>

                                $pro_title

                            </a>
                        
                        </h3>

                        <p class='price'>

                            $pro_price Ft
                        
                        </p>

                        <p class='button'>

                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                Részletek

                            </a>

                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                <i class='fa fa-shopping-cart'></i> Kosárba

                            </a>

                        </p>

                    </div>
                
                </div>
            
            </div>
            ";

        }
    }
    // finish getPro()

    // begin getPCats()
    function getPCats(){

        global $db;

        $get_p_cats = "select * from product_categories";

        $run_p_cats = mysqli_query($db,$get_p_cats);

        while($row_p_cats=mysqli_fetch_array($run_p_cats)) {
            
            $p_cat_id = $row_p_cats['p_cat_id'];
            $p_cat_title = $row_p_cats['p_cat_title'];

            echo "

                <li>

                    <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>

                </li>
            
            ";

        }

    }
    //finish getPCats()
    
    // begin getCats()
    function getCats(){

        global $db;

        $get_cats = "select * from categories";

        $run_cats = mysqli_query($db,$get_cats);

        while($row_cats=mysqli_fetch_array($run_cats)) {
            
            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];

            echo "

                <li>

                    <a href='shop.php?cat=$cat_id'> $cat_title </a>

                </li>
            
            ";

        }

    }
    //finish getCats()

    //begin getPCatPro()
    function getPCatPro(){

        global $db;

        if(isset($_GET['p_cat'])){

            $p_cat_id = $_GET['p_cat'];

            $get_p_cats = "select * from product_categories where p_cat_id='$p_cat_id'";

            $run_p_cats = mysqli_query($db,$get_p_cats);

            $row_p_cats = mysqli_fetch_array($run_p_cats);

            $p_cat_title = $row_p_cats['p_cat_title'];
            
            $p_cat_desc = $row_p_cats['p_cat_desc'];

            $get_products = "select * from products where p_cat_id='$p_cat_id'";

            $run_products = mysqli_query($db,$get_products);

            $count = mysqli_num_rows($run_products);

            if($count==0){

                echo "

                    <div class='box'>

                        <h1> Nem található termék ebben a kategóriában </h1>
                    
                    </div>

                ";

            }else{

                echo "

                    <div class='box'>

                        <h1> $p_cat_title </h1>

                        <p> $p_cat_desc </p>
                    
                    </div>
                
                ";

            }

            while($row_products=mysqli_fetch_array($run_products)){

                $pro_id = $row_products['product_id'];

                $pro_title = $row_products['product_title'];

                $pro_price = $row_products['product_price'];

                $pro_img1 = $row_products['product_img1'];

                echo "

                <div class='col-md-4 col-sm-6 center_responsive'>

                <div class='product'>

                    <a href='details.php?pro_id=$pro_id'>

                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                    </a>

                    <div class='text'>

                        <h3>

                            <a href='details.php?pro_id=$pro_id'>

                                $pro_title

                            </a>
                        
                        </h3>

                        <p class='price'>

                            $pro_price Ft
                        
                        </p>

                        <p class='button'>

                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                Részletek

                            </a>

                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                <i class='fa fa-shopping-cart'></i> Kosárba

                            </a>

                        </p>

                    </div>
                
                </div>
            
            </div>
                
                ";

            }

        }

    }
    //finish getPCatPro()

    //begin getCatPro()
    /* function getCatPro(){

        global $db;

        if(isset($_GET['cat'])){

            $cat_id = $_GET['cat'];

            $get_cats = "select * from categories where cat_id='$cat_id'";

            $run_cats = mysqli_query($db,$get_cats);

            $row_cats = mysqli_fetch_array($run_cats);

            $cat_title = $row_cats['cat_title'];
            
            $cat_desc = $row_cats['cat_desc'];

            $get_cats = "select * from products where cat_id='$cat_id' LIMIT 0,6";
            
            $run_products = mysqli_query($db,$get_cats);

            $count = mysqli_num_rows($run_products);

            if($count==0){
                
                echo "

                    <div class='box'>

                        <h1> Nem található termék ebben a kategóriában </h1>
                    
                    </div>
                
                ";

            }else{

                echo "

                    <div class='box'>

                        <h1> $cat_title </h1>

                        <p> $cat_desc </p>
                    
                    </div>
                
                ";

            }

            while($row_products=mysqli_fetch_array($run_products)){

                $pro_id = $row_products['product_id'];

                $pro_title = $row_products['product_title'];

                $pro_price = $row_products['product_price'];

                $pro_img1 = $row_products['product_img1'];

                echo "

                <div class='col-md-4 col-sm-6 center_responsive'>

                <div class='product'>

                    <a href='details.php?pro_id=$pro_id'>

                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                    </a>

                    <div class='text'>

                        <h3>

                            <a href='details.php?pro_id=$pro_id'>

                                $pro_title

                            </a>
                        
                        </h3>

                        <p class='price'>

                            $pro_price Ft
                        
                        </p>

                        <p class='button'>

                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                Részletek

                            </a>

                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                <i class='fa fa-shopping-cart'></i> Kosárba

                            </a>

                        </p>

                    </div>
                
                </div>
            
            </div>
                
                ";

            }

        }

    } */
    //finish getCatPro()

    // begin items()
    function items(){

        session_start();
        global $db;

        /* $ip_add = getRealIpUser(); */

        $customer_email = $_SESSION['customer_email'];

        $get_customer = "select * from customers where customer_email='$customer_email'";
        $run_customers = mysqli_query($db,$get_customer);
        $row_customer = mysqli_fetch_array($run_customers);
        $customer_id = $row_customer['customer_id'];

        $get_items = "select * from cart where customer_id='$customer_id'";

        $run_items = mysqli_query($db,$get_items);

        $count_items = mysqli_num_rows($run_items);

        echo $count_items;
    }
    // finish items()

    // begin total_price()
    function total_price(){

        global $db;
        session_start();

        /* $ip_add = getRealIpUser(); */

        $customer_email = $_SESSION['customer_email'];

        $get_customer = "select * from customers where customer_email='$customer_email'";
        $run_customers = mysqli_query($db,$get_customer);
        $row_customer = mysqli_fetch_array($run_customers);
        $customer_id = $row_customer['customer_id'];


        $select_cart = "select * from cart where customer_id='$customer_id'";

        $total = 0;

        $run_cart = mysqli_query($db,$select_cart);

        while($record=mysqli_fetch_array($run_cart)){

            $pro_id = $record['p_id'];

            $pro_qty = $record['qty'];

            $get_price = "select * from products where product_id='$pro_id'";

            $run_price = mysqli_query($db,$get_price);

            while($row_price=mysqli_fetch_array($run_price)){

                $sub_total = $row_price['product_price'] * $pro_qty;

                $total += $sub_total;

            }

        }

        echo $total . " Ft";
    }
    // finish total_price()
?>
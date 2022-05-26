<?php 

    $active = "Contact";
    include("includes/header.php");

?>

        <div id="content"> <!-- #content begin -->
            <div class="container"> <!-- container begin -->
                <div class="col-md-12"> <!-- col-md-12 begin -->

                    <ul class="breadcrumb"> <!-- breadcrumb begin -->
                        <li>
                            <a href="index.php">Főoldal</a>
                        </li>
                        <li>
                            Kapcsolat
                        </li>
                    </ul> <!-- breadcrumb finish -->

                </div> <!-- col-md-12 finish -->

                <div class="col-md-12"> <!-- col-md-9 begin -->

                    <div class="box"> <!-- box begin -->

                        <div class="box-header"> <!-- box-header begin -->

                            <center> <!-- center begin -->

                                <h2> Keress minket bizalommal! </h2>

                                <p class="text-muted"> <!-- text-muted begin -->

                                Ha olyan dolgot álmodtál meg vonalrajzzal kapcsolatban, amit nem találsz itt, akkor vedd fel velünk a kapcsolatot, és keresünk rá együtt megoldást!

                                </p> <!-- text-muted finish -->

                                <hr>

                                <p class="text-muted"> <!-- text-muted begin -->

                                Bármilyen felmerülő kérdés/kérés esetén keress minket bizalommal a lenti elérhetőségek bármelyikén!

                                </p> <!-- text-muted finish -->

                            </center> <!-- center finish -->

                            <form action="contact.php" method="post"> <!-- form begin -->

                                <div class="form-group"> <!-- form-group begin -->

                                    <label>Név:*</label>
                                    <input type="text" class="form-control" name="name" required>

                                </div> <!-- form-group finish -->

                                <div class="form-group"> <!-- form-group begin -->

                                    <label>E-mail cím:*</label>
                                    <input type="email" class="form-control" name="email" required>

                                </div> <!-- form-group finish -->

                                <div class="form-group"> <!-- form-group begin -->

                                    <label>Tárgy:*</label>
                                    <input type="text" class="form-control" name="subject" required>

                                </div> <!-- form-group finish -->
                                
                                <div class="form-group"> <!-- form-group begin -->

                                    <label>Üzenet:*</label>
                                    <textarea name="message" class="form-control" required></textarea>

                                </div> <!-- form-group finish -->
                                
                                <div class="text-center"> <!-- text-center begin -->

                                    <button type="submit" name="submit" class="btn btn-primary">

                                    <i class="fa fa-envelope"></i> Üzenet küldése </button>

                                </div> <!-- text-center finish -->
                                <p>* Kötelező mező</p>
                                
                            </form> <!-- form finish -->
                            
                            <?php 

                                if(isset($_POST['submit'])){

                                    //Admin recieves message

                                    $sender_name = $_POST['name'];
                                    $sender_email = $_POST['email'];
                                    $sender_subject = $_POST['subject'];
                                    $sender_message = $_POST['message'];
                                    $receiver_email = "vonalrolad@gmail.com";
                                    $message_to_send = "Új üzenet tőle: " . $sender_name . " Az üzenet: " . $sender_message . " A feladó e-mail címe: ". $sender_email;

                                    mail($receiver_email,$sender_subject,$message_to_send);

                                    //Auto reply to sender

                                    $email = $_POST['email'];

                                    $subject = "Köszönjük az üzeneted!";

                                    $msg = "Új üzenet tőle: vonalrolad@gmail.com Az üzenet: Köszönjük az üzeneted! Hamarosan felvesszük Veled a kapcsolatot!";

                                    mail($sender_email,$subject,$msg);

                                    echo "<h2 align='center'> Üzenet sikeresen elküldve! </h2>";

                                }
                            
                            ?>
                            
                        </div> <!-- box-header finish -->

                    </div> <!-- box finish -->
                        
                </div> <!-- col-md-9 finish -->

            </div> <!-- container finish -->
        </div> <!-- #content finish -->

        <?php 
        
        include("includes/footer.php");
        
        ?>

        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>

    </body>
</html>
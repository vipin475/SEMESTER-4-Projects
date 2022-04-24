<?php
    session_start();  

    // Database connection
    $con = new mysqli("localhost", "root", "", "test1");

    if($con->connect_error){
        die("Connection Failed : ".$con->connect_error);
    }
    else {

        $stmd1 = $con->prepare("DELETE FROM login WHERE email = (?)");
        $stmd1->bind_param("s", $_SESSION['mail']);
        $stmd1->execute();

            $stmd2 = $con->prepare("DELETE FROM profile WHERE email = (?)");
            $stmd2->bind_param("s", $_SESSION['mail']);
            $stmd2->execute();

            

            header("Location: register.html");

        }

?>
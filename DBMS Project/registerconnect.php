<?php
    session_start();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];
    $_SESSION['mail'] = $_POST['email'];

    // Database connection
    $con = new mysqli("localhost", "root", "", "test1");

    if($con->connect_error){
        die("Connection Failed : ".$con->connect_error);
    }
    else {
        if($password === $repeatpassword)
        {
            $stmd = $con->prepare("INSERT INTO login(name, email, username, password) VALUES (?,?,?,?)");
            $stmd->bind_param("ssss", $name, $email, $username, $password);
            $stmd->execute();

            header("Location: filldetails.html");

        }
        else {
            echo "Password and Repeat Password not matching";
        }
        
    
    }



?>

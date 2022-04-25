<?php
session_start();
    $email = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['mail'] = $_POST['username'];

    // Database connection
    $con = new mysqli("localhost", "root", "", "test1");

    if($con->connect_error){
        die("Connection Failed : ".$con->connect_error);
    }
    else {

        $stmt = $con->prepare("SELECT * FROM login WHERE email = ?");

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->result = $stmt->get_result();



        if($stmt->result->num_rows > 0){
            
            $data = $stmt->result->fetch_assoc();
            if($data['password'] === $password){
                header("Location: profile.php");
            }
            else{
                echo "Wrong Password";
            }
        }
        else {
            echo "Invalid Email";
        }

    }
?>
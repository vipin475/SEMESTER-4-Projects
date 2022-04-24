<?php
    session_start();
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $grno = $_POST["grno"];
    $rollno = $_POST["rollno"];
    $division = $_POST["division"];
    $dept = $_POST["dept"];
    $mobile = $_POST["mobile"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];    


    // Database connection
    $con = new mysqli("localhost", "root", "", "test1");

    if($con->connect_error){
        die("Connection Failed : ".$con->connect_error);
    }
    else {

            $stmd = $con->prepare("INSERT INTO profile(email, firstname, middlename, lastname, grno, rollno, division, dept, mobile, dob, address) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $stmd->bind_param("ssssiississ", $_SESSION['mail'], $firstname, $middlename, $lastname, $grno, $rollno, $division, $dept, $mobile, $dob, $address);
            $stmd->execute();

            header("Location: profile.php");

        }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Details </title>
    <link rel="stylesheet" href="editstyle.css">

</head>

<body>
    <section>
        <?php
            session_start();
            $mail = $_SESSION['mail'];
            $con = new mysqli("localhost", "root", "", "test1");
            $query = "SELECT * FROM profile where email = '$mail'";
            $query_run = mysqli_query($con, $query);
            $check_student = mysqli_num_rows($query_run) > 0;

            if($check_student)
            {
                $row = mysqli_fetch_array($query_run)
            
            ?>
        

        <div class="contentBx">
            <div class="formBx">
                <h2>Update Student details</h2>

                <form action="editdetails.php" method="POST">
                    <div class="inputBx">
                        <span>Full Name</span>
                        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname">
                        <input type="text" value="<?php echo $row['middlename']; ?>" name="middlename">
                        <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname">

                    </div>

                    

                    <div class="inputBx">
                        <span>GR Number</span>
                        <input type="text" value="<?php echo $row['grno']; ?> " name="grno">
                    </div>

                    <div class="inputBx">
                        <span>Roll Number</span>
                        <input type="text" value="<?php echo $row['rollno']; ?> " name="rollno">
                    </div>

                    <div class="inputBx">
                        <span>Division</span>
                        <input type="text" value="<?php echo $row['division']; ?> " name="division">
                    </div>

                    <div class="inputBx">
                        <span>Department</span>
                        <input type="text" value="<?php echo $row['dept']; ?> " name="dept">
                    </div>

                    <div class="inputBx">
                        <span>Mobile Number</span>
                        <input type="text" value="<?php echo $row['mobile']; ?> " name="mobile">
                    </div>

                    <div class="inputBx">
                        <span>Date of Birth</span>
                        <input type="date" placeholder="<?php echo $row['dob']; ?> " name="dob">
                    </div>

                    <div class="inputBx">
                        <span>Local Address</span>
                        <input type="text" value="<?php echo $row['address']; ?> " name="address">
                    </div>

                    <div class="inputBx">
                        <input type="submit" value="Update" name="">
                    </div>


                </form>
            </div>
        </div>

        <?php

        }

        ?>

    </section>
</body>

</html>


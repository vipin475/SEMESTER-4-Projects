<!doctype html>
<html lang="en">
  <style>
       .container{
        background: linear-gradient(120deg, #8e44ad, #2980b9);
        padding-top: 40px;
        border-radius: 7px;
      }   
  </style>





    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Profile page</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="profile.php">Home 
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Examination</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Academics</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="upcomingEvent.html">Upcoming Events</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="delete.php" onclick="fun();">DELETE ACCOUNT</a>
                    </li>

                </ul>
            </div>
        </nav>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <script type = "text/javascript">  
            function fun() {  
               confirm ("Do you really want to DELETE your ACCOUNT?");  
            } 
        </script>

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
            //while($row = mysqli_fetch_array($query_run));
            //{
              ?>

              <div class="container">
                <div class="main-body">
            
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                              <h4> <?php echo $row['firstname']; echo " "; echo $row['lastname']; ?>   </h4>
                              <p class="text-secondary mb-1"> <?php echo $row['dept']; ?>  Engineer</p>
                              <p class="text-muted font-size-sm"> PRN Number : <?php echo $row['grno']; ?></p>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>LinkedIn</h6>
                            <span class="text-secondary">https://bootdey.com</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                            <span class="text-secondary">bootdey</span>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <?php echo $row['firstname']; echo " "; echo $row['middlename']; echo " "; echo $row['lastname']; ?> 
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Roll Number </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $row['rollno']; ?> 
                            </div>
                          </div>


                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">PRN Number </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $row['grno']; ?> 
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Division </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $row['division']; ?> 
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Department </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $row['dept']; ?> 
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $row['mobile']; ?> 
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Date of Birth</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $row['dob']; ?> 
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $row['address']; ?> 
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <a class="btn btn-info " href="edit.php">Edit</a>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-12 pt-2">
                              <a class="btn btn-danger " href="index.html">Log out</a>
                            </div>
                          </div>

                        </div>
                      </div>
                
        
        
                    </div>
                  </div>
        
                </div>
            </div>


            <?php

              
          //  }

          }

      ?>


    </body>
</html>
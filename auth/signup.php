<?php
//Buffer callback method:
ob_start();

 //needed required files:
 include "../api/db_config.php";
 include "../api/sessions.php";

 //start session:
 $session = new Session;
 $session->start();

 //Handling login control:
 if(isset($_POST['signup'])){
  $fname = mysqli_real_escape_string($con, $_POST['first_name']);
  $lname = mysqli_real_escape_string($con, $_POST['last_name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pwd = mysqli_real_escape_string($con, $_POST['password']);

  //Clear record tracing:
  $_POST['first_name'] = "";
  $_POST['last_name'] = "";
  $_POST['email'] = "";
  $_POST['password'] = "";
  $_POST['signup'] = "";

  $stm = "INSERT INTO user(email, first_name, last_name, auth_key) VALUES('$email', '$fname', '$lname', '$pwd')";
  $result = mysqli_query($con, $stm);
  if($result){
      //Success prompt:
      ?>
      <script>
        alert("Account successfully created!");
        //Redirect to app:
        location.href = 'signin.php';
      </script>
      <?php
  }else{
    die(mysqli_error($con));
    //$_SESSION['error'] = mysqli_error($con);
    //header('Location: ../api/error.php');
  }

 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | JobHunter</title>

    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
  rel="stylesheet"
/>

<!-- Bootstrap Icon cdn -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


<!-- Custom links -->
<link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image gradient-custom" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body gradient-custom py-5 px-md-5 card card2">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <span class="h1 fw-bold mb-0"><img src="../assets/jobhunter.png" class="logo" alt=""> JobHunter</span>
            <hr>

          <h3 class="fw-bold mt-3 mb-2">Sign up</h3>
          <p class="text-dark m-2 p-2 fs-4 text-center">You're a step away from your dream job, join us!</p>
          <form method="post">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control" name="first_name" required/>
                  <label class="form-label" for="form3Example1">First name</label>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example2" class="form-control" name="last_name" required/>
                  <label class="form-label" for="form3Example2">Last name</label>
                </div>
              </div>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control" name="email" required/>
              <label class="form-label" for="form3Example3">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control" name="password" required/>
              <label class="form-label" for="form3Example4">Password</label>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" type="checkbox" value="" name="terms" id="form2Example33" checked />
              <label class="form-label" for="form2Example33">
                I agree to terms and conditions
              </label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-dark btn-block mb-4" name="signup">
              Sign up
            </button>

            <!-- Register buttons -->
            <div class="text-center">
            <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="signin.php"
                      style="color: #393f81;">Sign in</a></p>
                  <a href="#!" class="small text-muted">Terms of use |</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
></script>
</body>
</html>
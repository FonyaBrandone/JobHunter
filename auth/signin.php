<?php
//Buffer callback method:
ob_start();

 //needed required files:
 include "../api/db_config.php";
 include "../api/sessions.php";

 //start session:
 $session = new Session;
 $session->start();
?>
<?php
//In case user already Signed in:
if(isset($_SESSION['user_id'])){
  header('Location: ../app/');
}
  //error msg set to Null:
  $login_err_msg = "";

  //User already logged in?
  if(isset($_SESSION['user_id'])){
    header('Location: ../app/');
  }

 //Handling login control:
 if(isset($_POST['login'])){
  $username = mysqli_real_escape_string($con, $_POST['email']);
  $key = mysqli_real_escape_string($con, $_POST['password']);

  //Clear record tracing:
  $_POST['email'] = "";
  $_POST['password'] = "";
  $_POST['LOGIN'] = "";

  $stm = "SELECT user_id FROM user WHERE email='$username' AND auth_key='$key'";
  $result = mysqli_query($con, $stm);
  if($result){
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $row['user_id'];
      //Redirect to app dashboard:
      header(('Location: ../app/'));
    }else{
      //Negetive case handling:
        $login_err_msg = "Incorrect username or password!";
        ?>
        <script>
          alert("Incorrect credentials, try again!");
        </script>
        <?php
    }
  }else{
    die(mysqli_error($con));
    $_SESSION['error'] = mysqli_error($con);
    header('Location: ../api/error.php');
  }

 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | JobHunter</title>

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
<section class="vh-100">
  <div class="container py-5 gradient-custom" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../assets/authentication.svg"
                alt="login form" class="img-fluid mt-5" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h1 fw-bold mb-0"><img src="../assets/jobhunter.png" class="logo" alt=""> JobHunter</span>
                  </div>
                  <hr>

                  <h5 class="fw-normal mb-3 pb-3 text-dark" style="letter-spacing: 1px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Welcome back</h5>

                  <p class="text-center p-2 m-1 text-danger"><?php echo $login_err_msg; ?></p>
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" name="login" type="submit">Login</button>
                  </div>

                  <a class="small text-muted" href="#forgot-password">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="signup.php"
                      style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use |</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
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
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
if (!isset($_SESSION['user_id'])) {
  header('Location: ../auth/signin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Timeline | JobHunter</title>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />

  <!-- Bootstrap Icon cdn -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <style>
    .highlight {
      height: 350px;
    }

    .banner {
      height: 200px;
      width: 200px;
    }
    .intro{
      font-family: fantasy;
    }
  </style>
</head>

<body>
  <section>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- Container wrapper -->
      <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="../app/">
          <img src="../assets//jobhunter.png" height="32" alt="MDB Logo" loading="lazy" style="margin-top: -1px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;" />
          JobHunter
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ms-lg-3">
              <a class="nav-link" href="#">Dashboard</a>
            </li>
          </ul>
          <!-- Left links -->

          <div class="d-flex align-items-center">
            <button type="button" onclick="location.href = 'social/'" class="btn btn-link px-3 me-2">
              Social
            </button>
            <button type="button" onclick="location.href = 'findjob.php'" class="btn btn-primary me-3">
              <i class="bi bi-search pe-1"></i> Find Jobs
            </button>
            <ul class="navbar-nav">
              <!-- Avatar -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                  <img src="../assets/briefcase2.png" class="rounded-circle" height="22" alt="Portrait of a Woman" loading="lazy" />
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li>
                    <a class="dropdown-item" href="profile/">Student profile</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="settings/">Settings</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../auth/logout.php">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <!-- Collapsible wrapper -->
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </section>


  <section>
    <!-- Main content -->
    <div class="highlight container-lg col-10 my-5 text-white border rounded text-center fs-3 shadow-lg" style="background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');">
      <div class="row container-lg-5 container-sm-6  text-center justify-content-center">
        <div class="col-lg-5 col-sm-8 my-3 my-3 col-md-5 mb-3" style="height: 30px;">
          <p class="p-2 my-2 mx-3 text-center intro">Find your next dream job with JobHunter at the blink of an eye</p>
        </div>
      </div>
    </div>

    <h3 class="text-center my-3 p-2">Coming soon...</h3>
  </section>


  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
  <script src="../scripts/location.js"></script>

</body>

</html>
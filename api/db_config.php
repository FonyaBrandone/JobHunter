<?php
ob_start();
?>
<?php
$host = 'localhost';
$username = 'root';
$pass_key = '';
$db_name = 'jobhunter_db';
$con = new mysqli($host, $username, $pass_key, $db_name);
//checking connection:
    if(!$con){
        $_SESSION['error'] = mysqli_error($con);
        header('Location: error.php');
    }
?>
<?php
ob_start();

include '../api/sessions.php';
$session = new Session;
$session->start();

if(isset($_SESSION['error'])){
    $error = $_SESSION['error'];
    echo "JobHunter encountered an error: \n". $error;
}else{
    echo "Nothing to see here.\n";
}
?>
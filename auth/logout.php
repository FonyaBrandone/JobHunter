<?php
include '../api/sessions.php';
$session = new Session;
$session->start();
$session->stop();
//redirect:
header('Location: ../index.php');
?>
<?php
//Session Start
session_start();

//Destory Sesstion
session_destroy();

//redirect to login
header('location:login.php');
?>
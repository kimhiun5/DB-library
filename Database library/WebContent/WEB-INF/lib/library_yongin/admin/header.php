<?php
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['login_email']) || empty($_SESSION['login_email'])) {
	//redirect ke halaman login
	echo("<script>location.replace('login.php');</script>"); 
	header('location:login.php');
	die();
} else {
	$login_email = $_SESSION['login_email'];
}
?>
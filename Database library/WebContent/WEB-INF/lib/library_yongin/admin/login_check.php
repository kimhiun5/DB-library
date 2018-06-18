<?php
require_once('inc/dbconfig.php');
header("Content-Type: text/html; charset=UTF-8");

session_start();
$ip = $_SERVER['REMOTE_ADDR'];

//tangkap data dari form login
$login_email = $_POST['login_email'];
$login_password = $_POST['login_password'];

//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
$login_email = mysqli_real_escape_string($conn, $login_email);
$login_password = mysqli_real_escape_string($conn, $login_password);

$result_login = $conn->query("SELECT * FROM db_member WHERE email = '$login_email' and level=10 LIMIT 1"); 
$array_login = mysqli_fetch_array($result_login);
$hash_passwords = $array_login[password];


if (password_verify($login_password, $hash_passwords)) {
	//kalau username dan password sudah terdaftar di database
	//buat session dengan nama username dengan isi nama user yang login
	$_SESSION['login_email'] = $login_email;
	$conn->query("INSERT INTO db_member_log (username, detail_log, ip_log, date_log) VALUES ('$login_email', '로그인 성공', '$ip', now())");
	//redirect ke halaman index
	header('location:dashboard.php');
?>
	<script>
		// 로그인 성공시 대쉬보드 이동
		document.location.href="dashboard.php" ; 
	</script>
<?php	
} else {
	$conn->query("INSERT INTO db_member_log (email, detail_log, ip_log, date_log) VALUES ('$login_email', '로그인 실패', '$ip', now())");
?>
	<script>
		alert("이메일주소 혹은 비밀번호가 잘못입력 되었습니다!");  // 로그인 실패시 나오는 화면
		// 확인 버튼 클릭시 login.php 페이지로 이동하게 만듬.
		document.location.href="login.php";
	</script>
<?php
}
?>
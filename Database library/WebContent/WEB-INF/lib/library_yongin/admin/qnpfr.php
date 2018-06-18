<?
//require_once('inc/dbconfig.php');

$email = "jinkyu3102@naver.com";
$passwords = "123123"; 
$nickname = "Song";
$level =  "10";

$hash = password_hash($passwords, PASSWORD_DEFAULT);  // 비밀번호 암호화 
// 회원가입시에는 비밀번호를 위의 암호화 과정을 거쳐 $hash 변수 값을 회원 DB Table에 저장합니다. 

//$sql = "INSERT INTO f1_web_member (email,passwords,nickname,level) VALUES ('$email', '$hash', '$nickname', '$level')"; 

echo $hash;
//$conn->close();
?>
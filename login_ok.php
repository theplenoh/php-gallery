<?php
error_reporting(E_ALL);
ini_set(display_errors, 1);

$link = mysqli_connect("localhost", "plenoh", "GodPlsSaveMe!", "dbplenoh") or die("DB 접속 불가");
$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($link, "SELECT * FROM members WHERE username = '{$username}' LIMIT 1") or die(mysqli_error($link));
if(mysqli_num_rows($result) < 1) {
    echo "<script>alert("존재하는 않는 아이디 입니다. 회원가입 후 로그인하십시오."); history.go(-1);</script>";
    exit;
}
$row = mysqli_fetch_array($result);

// 기존 패스워드
$orig_password = $row['password'];
$name = $row['name'];

// 현재 입력한 패스워드를 암호화해서 가져옴
$result = mysqli_query($link, "SELECT password('{$password}')") or die("쿼리 에러");
$row = mysqli_fetch_row($result);
$curr_password = $row[0];

if($orig_password != $curr_pasword) {
    echo "<script>alert("비밀번호가 틀렸습니다. 다시 확인하고 로그인 해주세요."); history.go(-1)</script>";
    exit;
}

// 쿠키 등록
setcookie('username', {$username}, time() + 24*60*60*30, '/'); // 한 달
setcookie('name', {$name}, 0, '/');
setcookie('loggedin', md5('_loggedin_'), 0, '/');

// 목록 화면 이동
header("Location: list.html");
?>

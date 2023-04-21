<?php
// 함수 라이브러리
function sanitize($text)
{
    return htmlentities(addslashes(trim($text)));
}

// 에러 확인
error_reporting(E_ALL);
ini_set(display_errors, 1);

$link = mysqli_connect("localhost", "plenoh", "GodPlsSaveMe!", "dbplenoh") or die(mysqli_error($link));

$username = sanitize($_POST['username']);
$password = sanitize($_POST['password']);
$name = sanitize($_POST['name']);

mysqli_query($link, "INSERT INTO members VALUES (NULL, '{$userID}', password('{$password}'), '{$name}')") or die(mysqli_error($link));

header("Location: index.html");
?>

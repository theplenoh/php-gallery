<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>로그인 페이지</title>

<link rel="stylesheet" href="style.css">
<script>
function logIn() {
    if(!document.login.username.value) {
        alert("사용자 아이디를 입력해주세요.");
        document.login.username.focus();
        return;
    }
    if(!document.login.password.value) {
        alert("사용자 패스워드를 입력해주세요.");
        document.login.password.focus();
        return;
    }
    document.login.submit();
}
function joinUS() {
    location.href = "signup.php";
}
</script>
</head>
<body>
    <h1>로그인</h1>
    <form name="login" method="post" action="login_ok.php">
    <dl>
        <dt>아이디</dt>
        <dd><input type="text" name="username" value="<?=isset($_COOKIE['username'])? $_COOKIE['username']:''; ?>"></dd>

        <dt>비밀번호</dt>
        <dd><input type="password" name="password"></dd>
    </dl>
    <p>
        <a href="javascript:;" onclick="logIn();">로그인 하기</a>
    </p>
    <p>
        <a href="javascript:;" onclick="joinUS();">회원 가입</a>
    </p>
    <p>
        회원만 이용 가능합니다.
    </p>
    </form>
</body>
</html>

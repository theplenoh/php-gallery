<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>회원가입 페이지</title>

<link rel="stylesheet" href="style.css">
<script>
function verify(form) {
    // 확인 전송
    if(!form.agree.checked) {
        alert("개인정보 처리방침에 동의해야 회원가입이 가능합니다.");
        form.agree.focus();
        return;
    }
    if(!form.username.value) {
        alert("사용자 아이디 필수 입력");
        form.username.focus();
        return;
    }
    else {
        // 중복검사를 했는지 체크하는 부분
        if(form.checkUsername.value != "yes") {
            alert("아이디 중복체크 해주세요.");
            return;
        }
        if(!/[^\s]{4,}/.test(form.password.value)) {
            alert("패스워드 필수 입력 항목");
            form.password.focus();
            return;
        }
        if(!form.password.value || form.password.value != form.password_confirm.value) {
            alert("비밀번호 확인 필수 입력");
            form.password.focus();
            return;
        }
        if(!form.name.value) {
            alert("이름 필수 입력");
            form.name.focus();
            return;
        }
        form.submit();
    }
    function checkPassword(form) {
        // 비밀번호 확인
        // alert(event.keyCode); // 어떤 키보드가 눌렸는지 확인할 때 사용함
        if(!form.password.value) {
            alert("비밀번호를 입력해주세요.");
            form.password_confirm.value = "";
            form.password.focus();
            return;
        }
        if(form.password.value.length == form.password_confirm.value.length) {
            if(form.password.value == form.password_confirm.value) {
                form.name.focus();
            }
            else {
                alert("비밀번호가 일치하지 않습니다.");
                form.password.value = "";
                form.password_confirm.value = "";
                form.password.focus();
            }
        }
    }

    function checkDuplicate() {
        // 아이디 중복확인

        if(!document.signup.username.value) {
            alert("아이디 입력 후 중복검사를 해주세요.");
            document.signup.username.focus();
            return;
        }
        var w = 340;
        var h = 140;
        var x = (screen.width - w) / 2;
        var y = (screen.height - h) / 2;
        window.open("check_username.php?username="+document.signup.username.value, 'check', 'left='+x+',top='+y+', width='+w+', height='+h);
    }
}
</script>
</head>
<body>
<form name="signup" method="post" action="signup_ok.php">
<input type="hidden" name="checkUsername" value="no">
<h1>회원가입</h1>
<section>
    <h2>개인정보처리방침동의</h2>
    <p>
    본 사이트의 개인정보처리방침입니다. 본 사이트의 개인정보처리방침입니다. 본 사이트의 개인정보처리방침입니다. 
    </p>
    <ul>
        <li>1번 항목</li>
        <li>2번 항목</li>
        <li>3번 항목</li>
        <li>4번 항목</li>
        <li>5번 항목</li>
        <li>6번 항목</li>
    </ul>
</section>
<p>
    <input type="checkbox" name="agree" id="agree"> <label for="agree">위 조건을 읽었으며 동의합니다.</label>
</p>
<p><mark>*</mark> 표시는 필수 입니다.</p>
<dl>
    <dt>아이디<mark>*</mark></dt>
    <dd><input type="text" name="username"> <input type="button" value="중복 검사" onclick="checkDuplicate();"></dd>

    <dt>패스워드<mark>*</mark></dt>
    <dd>
        <input type="password" name="password"><br>
        <span>8-16글자의 알파벳 또는 숫자 혼용</span>
    </dd>

    <dt>패스워드 확인<mark>*</mark></dt>
    <dd>
        <input type="password" name="password_confirm" onkeyup="checkPassword(this.form);">
    </dd>
</dl>
</form>
</body>
</html>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>사진 업로드</title>

<link rel="stylesheet" href="style.css">
<script>
function check(form) {
    if (!/[^\s].test(form.title.value)) {
        alert("제목이 입력되지 않았습니다. 제목을 입력해주세요.");
        form.title.focus();
        return;
    }
    if (!form.pic.value) {
        alert("사진이 등록되지 않았습니다. 사진을 등록해주세요.");
        form.pic.focus();
        return;
    }
    form.submit();
}
</script>
</head>
<body>
    <h1>사진 업로드</h1>
    <form name="pic_upload" method="post" enctype="multipart/form-data" action="pic_upload_ok.php">
        <input type="hidden" name="username">
        <dl>
            <dt>제목</dt>
            <dd>
                <input type="text" name="title">
            </dd>
            <dt>사진 업로드</dt>
            <dd>
                <input type="file" name="pic" accept="image/*">
            </dd>
        </dl>
        <p>
            <input type="button" value="확인" onclick="check(this.form);">
            <input type="button" value="닫기" onclick="self.close();">
        </p>
    </form>
</body>
</html>

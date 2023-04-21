<?php
error_reporting(E_ALL);
ini_set(display_errors, 1);

// 파일이 임시파일폴더에 업로드 되었는지를 체크
if(!is_uploaded_file($_FILES['pic']['tmp_name'])) {
    echo<<<EOT
    <p>
        파일이 업로드 되지 않았습니다. 확인 후 다시 업로드하세요.
    </p>
    <p>
        <input type="button" value="확인" onclick="history.go(-1);">
    </p>
EOT;
    exit;
}

// 동일 이름 파일 존재여부 체크
if(file_exists('./pics/'.$_FILES['pic']['name'])) {
    echo<<<EOT
    <p>
        동일한 이름을 가진 파일이 있습니다. 다른 파일명으로 올려주세요.
    </p>
    <p>
        <input type="button" value="확인" onclick="history.go(-1);">
    </p>
EOT;
    exit;
}

// 파일을 임시파일폴더에서 사용자서버 폴더로 복사해서 업로드함
// 만약 업로드가 되지 않았다면(임시폴더의 파일을 pics폴더에 사용자가 지정한 이름으로 업로드)
if (!move_uploaded_file($_FILES['pic']['tmp_name'], "./pics/".$_FILES['pic']['name'])) {
    echo<<<EOT
    <p>
        사진을 복사하지 못했습니다. 관리자에게 문의하세요.
    </p>
    <p>
        <input type="button" value="확인" onclick="history.go(-1);">
    </p>
EOT;
    exit;
}
$link = mysqli_connect('localhost', 'plenoh', 'GodPlsSaveMe!', 'dbplenoh') or die('DB 접속오류');
$userID = $_COOKIE['userID'];
$up_date = date('Y-m-d H:i');
$title = addslashes($_POST['title']);
$pic = $_FILES['pic']['name'];
mysqli_query($link, "INSERT INTO gallery values(null, '{$userID}', '{$up_date}', '{$title}', '{$pic}');") or die('쿼리 에러');
mysqli_close($link);

// 목록화면으로 보내기
?>

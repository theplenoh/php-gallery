<?php
error_reporting(E_ALL);
ini_set(display_errors, 1);

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
?>

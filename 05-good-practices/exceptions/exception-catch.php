<?php
try {
    $pdo = new PDO('mysql://host=wrong_host;dbname=wrong_name');
} catch (PDOException $e) {
    // 로그를 남기기 위한 예외 검사
    $code = $e->getCode();
    $message = $e->getMessage();

    // 사용자 친화적인 메시지 표시
    echo '문제가 발생했습니다. 잠시 후 접속해 주시기 바랍니다';
    exit;
}

<?php
try {
    throw new Exception('Not a PDO exception');
    $pdo = new PDO('mysql://host=wrong_host;dbname=wrong_name');
} catch (PDOException $e) {
    //PDO 예외 처리
    echo "PDO 예외 감지";
} catch (Exception $e) {
    // 나머지 모든 예외 처리
    echo "일반 예외 감지";
} finally {
    // 항상 실행하는 부분
    echo "항상 실행하는 부분";
}

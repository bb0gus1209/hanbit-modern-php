<?php
require 'settings.php';

// PDO 연결
try {
    $pdo = new PDO(
        sprintf(
            'mysql:host=%s;dbname=%s;port=%s;charset=%s',
            $settings['host'],
            $settings['name'],
            $settings['port'],
            $settings['charset']
        ),
        $settings['username'],
        $settings['password']
    );
} catch (PDOException $e) {
    // 데이터베이스 연결 실패
    echo "데이터베이스 연결 실패";
    exit;
}

// SQL 쿼리 작성 및 실행
$sql = 'SELECT id, email FROM users WHERE email = :email';
$statement = $pdo->prepare($sql);
$email = filter_input(INPUT_GET, 'email');
$statement->bindValue(':email', $email, PDO::PARAM_STR);

// 한번에 결과 하나씩 순회
echo '한번에 결과 하나씩 연관 배열로 얻기', PHP_EOL;
$statement->execute();
while (($result = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
    echo $result['email'], PHP_EOL;
}

// 전체 결과를 한번에 순회
echo '전체 결과를 연관 배열로 얻기', PHP_EOL;
$statement->execute();
$allResults = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($allResults as $result) {
    echo $result['email'], PHP_EOL;
}

// 한번에 하나의 컬럼 값을 가져오기
echo '하나의 컬럼 값을 하나씩 연관 배열로 가져오기', PHP_EOL;
$statement->execute();
while (($email = $statement->fetchColumn(1)) !== false) {
    echo $email, PHP_EOL;
}

// 결과를 객체로 순회
echo '결과 객체를 한번에 하나씩 가져오기', PHP_EOL;
$statement->execute();
while (($result = $statement->fetchObject()) !== false) {
    echo $result->email, PHP_EOL;
}

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

// 준비된 구문
$sql = 'SELECT id FROM users WHERE email = :email';
$email = filter_input(INPUT_GET, 'email');

$statement = $pdo->prepare($sql);
$statement->bindValue(':email', $email);

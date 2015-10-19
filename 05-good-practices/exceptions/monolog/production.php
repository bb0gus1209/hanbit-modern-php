<?php
// 컴포저 오토로더 사용
require 'vendor/autoload.php';

// 모놀로그 네임스페이스 불러오기
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SwiftMailerHandler;

date_default_timezone_set('Asia/Seoul');

// 모놀로그 로거 설정
$log = new Logger('my-app-name');
$log->pushHandler(new StreamHandler('logs/production.log', Logger::WARNING));

// 심각한 오류를 처리할 스위프트메일러 처리기 추가
$transport = \Swift_SmtpTransport::newInstance('smtp.example.com', 587)
             ->setUsername('USERNAME')
             ->setPassword('PASSWORD');
$mailer = \Swift_Mailer::newInstance($transport);
$message = \Swift_Message::newInstance()
           ->setSubject('웹 사이트 오류!')
           ->setFrom(array('daemon@example.com' => '홍길동'))
           ->setTo(array('admin@example.com'));
$log->pushHandler(new SwiftMailerHandler($mailer, $message, Logger::CRITICAL));

// Use logger
$log->critical('서버에 불이야!');

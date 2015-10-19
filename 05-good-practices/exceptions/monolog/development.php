<?php
// 컴포저 오토로더 사용
require 'vendor/autoload.php';

// 모놀로그 네임스페이스 불러오기
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// 모놀로그 로거 설정
$log = new Logger('my-app-name');
$log->pushHandler(new StreamHandler('logs/development.log', Logger::WARNING));

// 로거 사용
$log->warning('경고가 발생했습니다!');

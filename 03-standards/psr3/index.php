<?php
require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

date_default_timezone_set('Asia/Seoul');

// 로거 준비
$log = new Logger('myApp');
$log->pushHandler(new StreamHandler('logs/development.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('logs/production.log', Logger::WARNING));

// 로거 사용
$log->debug('디버그 메시지입니다.');
$log->warning('경고 메시지입니다.');

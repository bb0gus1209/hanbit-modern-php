<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        // error_reporting 설정에 지정되지 않은 오류는
        // 무시함
        return;
    }

    throw new \ErrorException($errstr, $errno, 0, $errfile, $errline);
});

trigger_error("예외로 변환된 오류");

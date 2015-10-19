<?php
date_default_timezone_set('Asia/Seoul');

// 기본 생성
$datetime1 = new DateTime();

// 인수를 이용한 생성
$datetime2 = new DateTime('2014-04-27 5:03 AM');

// 정적 생성 메서드를 이용해 지정된 형식으로 생성
$datetime3 = DateTime::createFromFormat('M j, Y H:i:s', 'Jan 2, 2014 23:04:12');

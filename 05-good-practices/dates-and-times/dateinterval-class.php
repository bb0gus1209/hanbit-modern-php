<?php
date_default_timezone_set('Asia/Seoul');

// DateTime 인스턴스 생성
$datetime = new DateTime('2014-01-01 14:00:00');

// 두 주 간격 생성
$interval = new DateInterval('P2W');

//DateTime 인스턴스 수정
$datetime->add($interval);
echo $datetime->format('Y-m-d H:i:s');

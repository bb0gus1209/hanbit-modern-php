<?php
//1. 컴포저 오토로더
require 'vendor/autoload.php';

//2. 거즐HTTP 클라이언트 인스턴스
$client = new \GuzzleHttp\Client();

//3.CSV를 열어서 순회함
$csv = new \League\Csv\Reader($argv[1]);
foreach ($csv as $csvRow) {
    try {
        //4.HTTP OPTIONS 요청을 보냄
        $httpResponse = $client->options($csvRow[0]);

        //5.HTTP 응답 상태 코드 확인
        if ($httpResponse->getStatusCode() >= 400) {
            throw new \Exception();
        }
    } catch (\Exception $e) {
        //6. 접근 불가URL 표준 출력
        echo $csvRow[0] . PHP_EOL;
    }
}

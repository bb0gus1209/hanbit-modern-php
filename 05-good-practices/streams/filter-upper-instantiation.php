<?php
$handle = fopen('php://filter/read=string.toupper/resource=data.txt', 'rb');
while(feof($handle) !== true) {
    echo fgets($handle); // <-- 모두 대문자로 출력됨
}
fclose($handle);

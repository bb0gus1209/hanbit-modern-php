<?php
$closure = function ($name) {
    return sprintf('Hello %s', $name);
};

echo $closure("Josh");
// 출력 --> "Hello Josh"

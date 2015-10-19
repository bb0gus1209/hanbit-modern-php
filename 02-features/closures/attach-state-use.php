<?php
function enclosePerson($name) {
    return function ($doCommand) use ($name) {
        return sprintf('%s, %s', $name, $doCommand);
    };
}

// "Clay" 문자열을 클로저로 감싼다.
$clay = enclosePerson('Clay');

// 클로저를 호출한다.
echo $clay('차 한잔 부탁해요!');
// 출력 --> "Clay, 차 한잔 부탁해요!"

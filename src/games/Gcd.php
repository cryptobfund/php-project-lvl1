<?php

namespace First\Project\Games\Gcd;

use function First\Project\Engine\gameStart;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers'; //общее описание и вопрос игры
const MIN_RAND = 1; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение

function generateRoundData()
{
    $firstNum = rand(MIN_RAND, MAX_RAND);
    $secondNum = rand(MIN_RAND, MAX_RAND);
    return [
        'answer' => (string) gcd($firstNum, $secondNum),
        'question' => "{$firstNum} {$secondNum}"
    ];
}
function start()
{
    gameStart(fn() => generateRoundData(), GAME_DESCRIPTION);
}
function gcd($firstNum, $secondNum)
{
    $a = abs($firstNum);
    $b = abs($secondNum);
    while ($a != $b) {
        if ($a > $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $a;
}

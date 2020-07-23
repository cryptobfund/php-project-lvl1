<?php

namespace First\Project\Games\Prime;

use function First\Project\Engine\gameStart;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".?';//общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение

function start()
{
    $fnMakeQuVal = function () {
        $num = rand(MIN_RAND, MAX_RAND);
        $correctValue = isPrime($num) ? 'yes' : 'no';
        $strQuestionValue = $num;
        return [
            'correctValue' => (string) $correctValue,
            'strQuestionValue' => (string) $strQuestionValue
        ];
    };
    gameStart($fnMakeQuVal, GAME_DESCRIPTION);
}

function isPrime($num)
{
    $absNum = abs($num);
    if (($absNum == 1) || ($absNum == 0)) {
        return false;
    }
    for ($i = 2; $i <= sqrt($absNum); $i++) {
        if ($absNum % $i == 0) {
            return false;
        }
    }
    return true;
}

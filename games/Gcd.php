<?php

namespace First\Project\Gcd;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers'; //общее описание и вопрос игры
const MIN_RAND = 1; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
const GAME_STEPS_LIMIT = 3; //лимит шагов в игре

function getConst()
{
    return [
        'gameDesc' => GAME_DESCRIPTION,
        'gameStepsLim' => GAME_STEPS_LIMIT
    ];
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

function makeQuestionValues()
{
    $firstNum = rand(MIN_RAND, MAX_RAND);
    $secondNum = rand(MIN_RAND, MAX_RAND);
    $correctValue = gcd($firstNum, $secondNum);
    $strQuestionValue = "{$firstNum} {$secondNum}";
    return [
        'correctValue' => $correctValue,
        'strQuestionValue' => $strQuestionValue
    ];
}

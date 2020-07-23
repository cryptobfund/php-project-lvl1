<?php

namespace First\Project\Games\Calc;

use function First\Project\Engine\gameStart;

const GAME_DESCRIPTION = 'What is the result of the expression?'; //общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
const ARR_QIESTION_OPERATIONS = ['+', '-', '*']; //массив возможных математических операций в задаче игры

function start()
{
    $fnMakeQuVal = function () {
        $firstNum = rand(MIN_RAND, MAX_RAND);
        $secondNum = rand(MIN_RAND, MAX_RAND);
        $mathOperation = ARR_QIESTION_OPERATIONS[rand(0, count(ARR_QIESTION_OPERATIONS) - 1)];
        $strQuestionValue = "{$firstNum} {$mathOperation} {$secondNum} ";
        $correctValue = getCorrect($firstNum, $secondNum, $mathOperation);
        return [
            'strQuestionValue' => $strQuestionValue,
            'correctValue' => (string) $correctValue
        ];
    };
    gameStart($fnMakeQuVal, GAME_DESCRIPTION);
}

function getCorrect($firstNum, $secondNum, $mathOperation)
{
    switch ($mathOperation) {
        case '*':
            return $firstNum * $secondNum;
        case '-':
            return $firstNum - $secondNum;
        case '+':
            return $firstNum + $secondNum;
        default:
            return "err math type operation";
    }
}

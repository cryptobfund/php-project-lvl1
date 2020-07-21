<?php

namespace First\Project\Calc;

//Описываем параметры настроек игры
const GAME_DESCRIPTION = 'What is the result of the expression?'; //общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
const ARR_QIESTION_OPERATIONS = ['+', '-', '*']; //массив возможных математических операций в задаче игры
const GAME_STEPS_LIMIT = 3; //лимит шагов в игре

function getConst()
{
    return [
        'gameDesc' => GAME_DESCRIPTION,
        'gameStepsLim' => GAME_STEPS_LIMIT
    ];
}

function makeQuestionValues()
{
    $firstNum = rand(MIN_RAND, MAX_RAND);
    $secondNum = rand(MIN_RAND, MAX_RAND);
    $mathOperation = ARR_QIESTION_OPERATIONS[rand(0, count(ARR_QIESTION_OPERATIONS) - 1)];

    if ($mathOperation === '*') {
        $correctValue = $firstNum * $secondNum;
    } elseif ($mathOperation === '-') {
        $correctValue = $firstNum - $secondNum;
    } elseif ($mathOperation === '+') {
        $correctValue = $firstNum + $secondNum;
    } else {
        return "err math type operation";
    }
    $strQuestionValue = "{$firstNum} {$mathOperation} {$secondNum} ";
    return [
        'strQuestionValue' => $strQuestionValue,
        'correctValue' => $correctValue
    ];
}

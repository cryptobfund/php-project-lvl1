<?php

namespace First\Project\Games\Calc;

use function First\Project\Engine\gameStart;

const GAME_DESCRIPTION = 'What is the result of the expression?'; //общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
const OPERATIONS = ['+', '-', '*']; //массив возможных математических операций в задаче игры

function generateRoundData()
{
    $firstNum = rand(MIN_RAND, MAX_RAND);
    $secondNum = rand(MIN_RAND, MAX_RAND);
    $operation = OPERATIONS[rand(0, count(OPERATIONS) - 1)];
    try {
        $answer = (string) calculate($firstNum, $secondNum, $operation);
    } catch (\Exception $e) {
        echo "\n", "Program error. " , $e->getMessage(), "\n";
        exit;
    }
    return [
        'answer' => $answer,
        'question' => "{$firstNum} {$operation} {$secondNum}"
    ];
}

function start()
{
    gameStart(function () {
        return generateRoundData();
    }, GAME_DESCRIPTION);
}
function calculate($firstNum, $secondNum, $operation)
{
    switch ($operation) {
        case '*':
            return $firstNum * $secondNum;
        case '-':
            return $firstNum - $secondNum;
        case '+':
            return $firstNum + $secondNum;
        default:
            throw new \Exception('Operator not found');
    }
}

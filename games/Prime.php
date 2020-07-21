<?php

namespace First\Project\Prime;

//Описываем параметры настроек игры
const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".?';//общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
const GAME_STEPS_LIMIT = 3; //лимит шагов в игре

function isPrime($num)
{
    if ($num == 1) {
        return 0;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function getConst()
{
    return [
        'gameDesc' => GAME_DESCRIPTION,
        'gameStepsLim' => GAME_STEPS_LIMIT
    ];
}

function makeQuestionValues()
{
    $num = rand(MIN_RAND, MAX_RAND);
    if (isPrime($num)) {
        $correctValue = 'yes';
    } else {
        $correctValue = 'no';
    }
    $strQuestionValue = "{$num} ";
    return [
        'correctValue' => $correctValue,
        'strQuestionValue' => $strQuestionValue
    ];
}

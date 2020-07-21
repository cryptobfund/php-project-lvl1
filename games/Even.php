<?php

namespace First\Project\Even;

//Описываем параметры настроек игры
const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no"'; //общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
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
    $num = rand(MIN_RAND, MAX_RAND);
    if ($num % 2 === 0) {
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

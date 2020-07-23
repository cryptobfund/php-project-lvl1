<?php

namespace First\Project\Games\Even;

use function First\Project\Engine\gameStart;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no"'; //общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение

function start()
{
    $fnMakeQuVal = function () {
        $num = rand(MIN_RAND, MAX_RAND);
        $correctValue = isEven($num) ? 'yes' : 'no';
        $strQuestionValue = $num;
        return [
            'correctValue' =>  $correctValue,
            'strQuestionValue' => (string) $strQuestionValue
        ];
    };
    gameStart($fnMakeQuVal, GAME_DESCRIPTION);
}

function isEven($num)
{
    return $num % 2 === 0;
}

<?php

namespace First\Project\Games\Progression;

use function First\Project\Engine\gameStart;

const GAME_DESCRIPTION = 'What number is missing in the progression?'; //общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
const PROGRESSION_LENGTH = 10;

function start()
{
    $fnMakeQuVal = function () {
        $firstMemberOfProgression = rand(MIN_RAND, MAX_RAND);
        $stepOfProgression = rand(MIN_RAND, MAX_RAND);
        $indexHiddenOfProgression = rand(0, PROGRESSION_LENGTH - 1);
        $progression = makeProgression($firstMemberOfProgression, $stepOfProgression, PROGRESSION_LENGTH);
        $correctValue = $progression[$indexHiddenOfProgression];
        $progression[$indexHiddenOfProgression] = '..';
        $strQuestionValue = implode(' ', $progression);
        return [
            'correctValue' => (string) $correctValue,
            'strQuestionValue' => $strQuestionValue
        ];
    };
    gameStart($fnMakeQuVal, GAME_DESCRIPTION);
}

function makeProgression($firstP, $stepP, $lenthP)
{
    $result = [];
    for ($i = 0; $i < $lenthP; $i++) {
        $result[] = $firstP + $i * $stepP;
    }
    return $result;
}
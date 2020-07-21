<?php

namespace First\Project\Progression;

//Описываем параметры настроек игры
const GAME_DESCRIPTION = 'What number is missing in the progression?'; //общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
const PROGRESSION_LENGTH = 10;
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
    $firstMemberOfProgression = rand(MIN_RAND, MAX_RAND);
    $stepOfProgression = rand(MIN_RAND, MAX_RAND);
    $indexHiddenOfProgression = rand(0, PROGRESSION_LENGTH - 1);
    $arrProgression = [];
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $arrProgression[] = $firstMemberOfProgression + $i * $stepOfProgression;
    }
    $correctValue = $arrProgression[$indexHiddenOfProgression];
    $arrProgression[$indexHiddenOfProgression] = '..';
    $strQuestionValue = implode(' ', $arrProgression);
    return [
        'strQuestionValue' => $strQuestionValue,
        'correctValue' => $correctValue
    ];
}

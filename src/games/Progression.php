<?php

namespace First\Project\Games\Progression;

use function First\Project\Engine\gameStart;

const GAME_DESCRIPTION = 'What number is missing in the progression?'; //общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
const PROGRESSION_LENGTH = 10;

function generateRoundData()
{
    $firstMemberOfProgression = rand(MIN_RAND, MAX_RAND);
    $stepOfProgression = rand(MIN_RAND, MAX_RAND);
    $indexHiddenOfProgression = rand(0, PROGRESSION_LENGTH - 1);
    $progression = generateProgression($firstMemberOfProgression, $stepOfProgression, PROGRESSION_LENGTH);
    $answer = (string) $progression[$indexHiddenOfProgression];
    $progression[$indexHiddenOfProgression] = '..';
    return [
        'answer' => $answer,
        'question' => implode(' ', $progression)
    ];
}
function start()
{
    gameStart(function () {
        return generateRoundData();
    }, GAME_DESCRIPTION);
}
function generateProgression($firstP, $stepP, $lenthP)
{
    $result = [];
    for ($i = 0; $i < $lenthP; $i++) {
        $result[] = $firstP + $i * $stepP;
    }
    return $result;
}

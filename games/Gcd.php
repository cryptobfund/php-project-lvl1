<?php

namespace First\Project\Gcd;

use First\Project\Cli;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers'; //общее описание и вопрос игры
const MIN_RAND = 1; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
const GAME_STEPS_LIMIT = 3; //лимит шагов в игре

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
        'firstNum' => $firstNum,
        'secondNum' => $secondNum,
        'correctValue' => $correctValue,
        'strQuestionValue' => $strQuestionValue
    ];

}
function checkAnswer($answer, $correctAnswer)
{
    return $answer == $correctAnswer;
}

function gameGcd()
{
    Cli\commonWelcome();
    Cli\gameDescription(GAME_DESCRIPTION);
    $gamerName = Cli\getGamerName();

    for ($i = 1; $i <= GAME_STEPS_LIMIT; $i++) {
        //получаем массив рандомных значений, строку для вопроса и корректый ответ
        $arrQuestionValues = makeQuestionValues();

        //задаем вопрос игроку
        Cli\askQuestion($arrQuestionValues['strQuestionValue']);

        //получаем ответ от игрока
        $answer = Cli\getAnswer();

        //проверяем корекктность ответа
        $isCorrect = checkAnswer($answer, $arrQuestionValues['correctValue']);

        //выводим результат шага игры
        Cli\showStepResult($answer, $arrQuestionValues['correctValue'], $isCorrect, $gamerName);
        if (!$isCorrect) {
            return;
        }
    }

    //Поздравляем игрока с победой
    Cli\showGameResult($gamerName);










}


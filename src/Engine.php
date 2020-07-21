<?php

namespace First\Project\Engine;

use First\Project\Cli;

function checkAnswer($answer, $correctAnswer)
{
    return $answer == $correctAnswer; //делаем не полное сравнение поскольку разные типы данных (число и строка)
}

function getGameParams($gameName)
{
    $makeQuestionValues = "First\Project\\" . $gameName . "\makeQuestionValues";
    return $makeQuestionValues();
}

function getConst($gameName)
{
    $gameConst = "First\Project\\" . $gameName . "\getConst";
    return $gameConst();
}

function gameStart($gameName)
{
    $gameConst = getConst($gameName);
    Cli\commonWelcome();
    Cli\gameDescription($gameConst['gameDesc']);
    $gamerName = Cli\getGamerName();

    for ($i = 1; $i <= $gameConst['gameStepsLim']; $i++) {
        //Получаем вопрос и правильный ответ игры
        $gameParams = getGameParams($gameName);
        //задаем вопрос игроку
        Cli\askQuestion($gameParams['strQuestionValue']);

        //получаем ответ от игрока
        $answer = Cli\getAnswer();

        //проверяем корекктность ответа
        $correctVal = $gameParams['correctValue'];
        $isCorrect = checkAnswer($answer, $correctVal);

        //выводим результат шага игры
        Cli\showStepResult($answer, $correctVal, $isCorrect, $gamerName);
        if (!$isCorrect) {
            return;
        }
    }

    //Поздравляем игрока с победой
    Cli\showGameResult($gamerName);
}

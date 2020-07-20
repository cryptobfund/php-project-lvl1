<?php

namespace First\Project\Even;

use First\Project\Cli;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no"'; //общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
//const ARR_QIESTION_OPERATIONS = ['+', '-', '*']; //массив возможных математических операций в задаче игры
const GAME_STEPS_LIMIT = 3; //лимит шагов в игре

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
        'num' => $num,
        'correctValue' => $correctValue,
        'strQuestionValue' => $strQuestionValue
    ];

}
function checkAnswer($answer, $correctAnswer)
{
    return $answer == $correctAnswer;
}

function gameEven()
{
    Cli\commonWelcome();
    Cli\gameDescription(GAME_DESCRIPTION);
    $gamerName = Cli\getGamerName();

    for ($i = 1; $i <= GAME_STEPS_LIMIT; $i++) {

        //получаем массив рандомных значений, операцию, строку для вопроса и корректый ответ
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



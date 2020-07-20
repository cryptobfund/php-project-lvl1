<?php

namespace First\Project\Calc;

use First\Project\Cli;

const GAME_DESCRIPTION = 'What is the result of the expression?'; //общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение
const ARR_QIESTION_OPERATIONS = ['+', '-', '*']; //массив возможных математических операций в задаче игры
const GAME_STEPS_LIMIT = 3; //лимит шагов в игре

function makeQuestionValues()
{
    $firstNum = rand(MIN_RAND, MAX_RAND);
    $secondNum = rand(MIN_RAND, MAX_RAND);
    $mathOperation = ARR_QIESTION_OPERATIONS[rand(0, count(ARR_QIESTION_OPERATIONS)-1)];

    if ($mathOperation === '*') {
        $correctValue = $firstNum * $secondNum;
    } elseif ($mathOperation === '-') {
        $correctValue = $firstNum - $secondNum;
    } elseif ($mathOperation === '+') {
        $correctValue = $firstNum + $secondNum;
    } else {
        return "err math type operation";
    }
    $strQuestionValue = "{$firstNum} {$mathOperation} {$secondNum} ";
    return [
        'firstNum' => $firstNum,
        'secondNum' => $secondNum,
        'mathOperation' => $mathOperation,
        'correctValue' => $correctValue,
        'strQuestionValue' => $strQuestionValue
    ];

}
function checkAnswer($answer, $correctAnswer)
{
    return $answer == $correctAnswer; //делаем не полное сравнение поскольку разные типы данных (число и строка)
}

function gameCalc()
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


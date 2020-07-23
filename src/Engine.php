<?php

namespace First\Project\Engine;

use function cli\line;
use function cli\prompt;

const GAME_STEPS_LIMIT = 3; //лимит шагов в игре

function gameStart($fnMakeQuVal, $gameDesc)
{
    line('Welcome to Brain Games!');
    line("{$gameDesc}\n");
    $name = prompt('May I have your name?');
    line("Hello, {$name}!\n");

    for ($i = 1; $i <= GAME_STEPS_LIMIT; $i++) {
        //Получаем вопрос и правильный ответ игры
        $gameParams = call_user_func($fnMakeQuVal);

        //задаем вопрос игроку
        line("Question: {$gameParams['strQuestionValue']}");

        //получаем ответ от игрока
        $answer = prompt("Your answer");

        $correctVal = $gameParams['correctValue'];
        //выводим результат шага игры
        if ($correctVal == $answer) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctVal}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    //Поздравляем игрока с победой
    line("Congratulations, {$name}!");
}

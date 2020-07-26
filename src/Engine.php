<?php

namespace First\Project\Engine;

use function cli\line;
use function cli\prompt;

const GAME_STEPS_LIMIT = 3; //лимит шагов в игре

function gameStart($generateRoundData, $gameDesc)
{
    line('Welcome to Brain Games!');
    line("{$gameDesc}\n");
    $name = prompt('May I have your name?');
    line("Hello, {$name}!\n");

    for ($i = 1; $i <= GAME_STEPS_LIMIT; $i++) {
        //Получаем вопрос и правильный ответ игры
        ['question' => $question, 'answer' => $answer] = $generateRoundData();

        //задаем вопрос игроку
        line("Question: {$question}");

        //получаем ответ от игрока
        $answerGamer = prompt("Your answer");

        //выводим результат шага игры
        if ($answerGamer !== $answer) {
            line("'{$answerGamer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line("Correct!");
    }
    //Поздравляем игрока с победой
    line("Congratulations, {$name}!");
}

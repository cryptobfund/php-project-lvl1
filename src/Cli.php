<?php

namespace First\Project\Cli;

use function cli\line;
use function cli\prompt;

//функция запуска проекта
function run()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}



//Вывод общего приветсвия
function commonWelcome($strWelcome = 'Welcome to the Brain Game!')
{
    line($strWelcome);
}

//Вывод условий игры
function gameDescription($strGameDescription)
{
    line("{$strGameDescription}\n");
}

//Запрашиваем и получаем имя игрока
function getGamerName()
{
    $name = prompt('May I have your name?');
    line("Hello, {$name}!\n");
    return $name;
}

//Задаем вопрос и условие
function askQuestion($value)
{
    line("Question: {$value}");
}

//Получаем ответ от игрока
function getAnswer()
{
    return prompt("Your answer");
}

//Показываем результат шага игры
function showStepResult($answer, $correctAnswer, $flag, $gamerName)
{
    if ($flag) {
        line("Correct!");
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        line("Let's try again, {$gamerName}!");
    }
}

//Показываем результат игры
function showGameResult($gamerName)
{
    line("Congratulations, {$gamerName}!");
}

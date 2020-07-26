<?php

namespace First\Project\Games\Prime;

use function First\Project\Engine\gameStart;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';//общее описание и вопрос игры
const MIN_RAND = 0; //мнимальное для генерации числа вопроса значение
const MAX_RAND = 10; //максимальное для генерации числа вопроса значение

function generateRoundData()
{
    $num = rand(MIN_RAND, MAX_RAND);
    return [
        'answer' => isPrime($num) ? 'yes' : 'no',
        'question' => (string) $num
    ];
}
function start()
{
    gameStart(fn() => generateRoundData(), GAME_DESCRIPTION);
}
function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

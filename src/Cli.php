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

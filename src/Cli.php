<?php
namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run()
{
    printWelcome();
    askForName();
}

function printWelcome()
{
    line('Welcome to the Brain Games!');
}
function askForName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();
    return $name;
}
function printRules($rules)
{
    line($rules);
    line();
}

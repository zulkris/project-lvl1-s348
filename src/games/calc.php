<?php
namespace BrainGames\Games\Calc;

use function \BrainGames\Cli\play;

const DESCRIPTION = 'What is the result of the expression?';

function gameData()
{
    $num1 = rand(0, 100);
    $num2 = rand(0, 100);

    $signs = ['+', '-', '*'];
    $randSign = array_rand($signs);

    switch ($signs[$randSign]) {
        case "+":
            $rightAnswer = $num1 + $num2;
            break;
        case "-":
            $rightAnswer = $num1 - $num2;
            break;
        case "*":
            $rightAnswer = $num1 * $num2;
            break;
    }

    $question = "$num1 {$signs[$randSign]} $num2";

    return [$question, $rightAnswer];
}

function letsplay()
{
    $gameData = function () {
            return gameData();
    };
    play(DESCRIPTION, $gameData);
}

//echo gameData();

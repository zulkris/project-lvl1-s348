<?php
namespace BrainGames\Games\Calc;

use function \BrainGames\Cli\play;

const DESCRIPTION = 'What is the result of the expression?';
const SIGNS = ['+', '-', '*'];

function letsplay()
{
    $gameData = function () {
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);
        $randSign = array_rand(SIGNS);
        $sign = SIGNS[$randSign];
        switch ($sign) {
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
        $question = "$num1 $sign $num2";
        return [$question, (string)$rightAnswer];
    };
    play(DESCRIPTION, $gameData);
}

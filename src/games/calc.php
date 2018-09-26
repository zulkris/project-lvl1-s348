<?php
namespace BrainGames\Games\Calc;

const GAME_NAME = 'Calc';
const RULES = 'What is the result of the expression?';
const STEPS = 3;

function getQuestion()
{
    $signs = array("+", "-", "*");
    shuffle($signs);
    $randnum1 = rand(0, 100);
    $randnum2 = rand(0, 100);
    return "$randnum1 ".$signs[0]." $randnum2";
}

function getRightAnswer($expression)
{
    $values = explode(' ', $expression);
    $num1 = $values[0];
    $num2 = $values[2];
    $sign = $values[1];

    switch ($sign) {
        case "+":
            $result = $num1 + $num2;
            break;
        case "-":
            $result = $num1 - $num2;
            break;
        case "*":
            $result = $num1 * $num2;
            break;
    }

    return $result;
}

//echo getRightAnswer(getQuestion());

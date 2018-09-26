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
    return;
}

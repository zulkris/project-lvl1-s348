<?php
namespace BrainGames\Games\Even;

const GAME_NAME = 'Even';
const RULES = 'Answer "yes" if number even otherwise answer "no".';
const STEPS = 3;

function getQuestion()
{
    return rand(0, 100);
}
function getRightAnswer($number)
{
    return isEven($number) ? 'yes' : 'no';
}

function isEven($number)
{
    return $number%2 == 0 ? true : false ;
}

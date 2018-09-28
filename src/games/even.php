<?php
namespace BrainGames\Games\Even;

use function \BrainGames\Cli\play;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

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
    return $number % 2 === 0;
}

function letsplay()
{
    $gameData = function () {
            $question = getQuestion();
            $rightAnswer = getRightAnswer($question);
            return [$question, $rightAnswer];
    };
    play(DESCRIPTION, $gameData);
}

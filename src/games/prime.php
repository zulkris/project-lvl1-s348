<?php
namespace BrainGames\Games\Prime;

use function \BrainGames\Cli\play;

const DESCRIPTION = 'Answer "yes" if number prime otherwise answer "no".';
const MIN = 1;
const MAX = 300;

function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i <= $number / 2; $i++) {
        if (($number % $i) == 0) {
            return false;
        }
    }
    return true;
}

function getRightAnswer($number)
{
    return isPrime($number) ? 'yes' : 'no';
}


function letsplay()
{
    $gameData = function () {
        $question = rand(MIN, MAX);
        $rightAnswer = getRightAnswer($question);

        return [$question, $rightAnswer];
    };
    play(DESCRIPTION, $gameData);
}

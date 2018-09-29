<?php
namespace BrainGames\Games\Prime;

use function \BrainGames\Cli\play;

const DESCRIPTION = 'Answer "yes" if number prime otherwise answer "no".';
const MAX = 300;

function isPrime($number)
{
    for ($i = 2; $i <= $number/2; $i++) {
        if (($number % $i) === 0) {
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
        $question = rand(2, MAX);
        $rightAnswer = getRightAnswer($question);

        return [$question,  $rightAnswer];
    };
    play(DESCRIPTION, $gameData);
}

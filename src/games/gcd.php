<?php
namespace BrainGames\Games\Gcd;

use function \BrainGames\Cli\play;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getRandomPrime()
{
    $arr = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31);
    $res = array_rand($arr);
    return $arr[$res];
}

function gameData()
{
    $gcd = getRandomPrime();

    $num1 = $gcd*rand(0, 30);
    $num2 = $gcd*rand(0, 30);

    $question = "$num1 $num2";

    return [$question, $gcd];
}

function letsplay()
{
    $gameData = function () {
            return gameData();
    };
    play(DESCRIPTION, $gameData);
}

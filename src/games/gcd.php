<?php
namespace BrainGames\Games\Gcd;

use function \BrainGames\Cli\play;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getGCD($a, $b)
{
    if ($b > $a) {
        [$a ,$b] = [$b, $a];
    }

    $r = $a % $b;
    while ($r !== 0) {
        [$a, $b] = [$b, $r];
        $r = $a % $b;
    }
    return $b;
}

function letsplay()
{
    $gameData = function () {
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);

        $question = "$num1 $num2";
        $rightAnswer = getGCD($num1, $num2);

        return [$question, (string)$rightAnswer];
    };
    play(DESCRIPTION, $gameData);
}

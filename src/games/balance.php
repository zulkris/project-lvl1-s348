<?php
namespace BrainGames\Games\Balance;

use function \BrainGames\Cli\play;

const DESCRIPTION = 'Balance the given number.';
const MIN = 10;
const MAX = 9999;

function getBalancedNumber($unbalancedNumber)
{
    $numbers = str_split($unbalancedNumber);
    $depth = count($numbers);
    $minNumber = (int)(array_sum($numbers) / $depth);
    $maxNumberCount = array_sum($numbers) - $minNumber*$depth;

    $resArr = array_reduce(array_keys($numbers), function ($acc, $key) use ($depth, $minNumber, $maxNumberCount) {
        if ($key < ($depth - $maxNumberCount)) {
            $acc[$key] = $minNumber;
        } else {
            $acc[$key] = $minNumber + 1;
        }
        return $acc;
    }, []);

    return implode('', $resArr);
}

function letsplay()
{
    $gameData = function () {
        $unbalancedNumber = rand(MIN, MAX);
        $balancedNumber = getBalancedNumber($unbalancedNumber);
        return [$unbalancedNumber, $balancedNumber];
    };
    play(DESCRIPTION, $gameData);
}

<?php
namespace BrainGames\Games\Balance;

use function \BrainGames\Cli\play;

const DESCRIPTION = 'What is the result of the expression?';
const MIN_DEPTH = 2;
const MAX_DEPTH = 5;

function getUnbalancedNumber()
{
    $depth = rand(MIN_DEPTH, MAX_DEPTH);

    $numbers = [];
    for ($i = 0; $i < $depth; $i++) {
        $numbers[] = rand(1, 9);
    }
    return implode($numbers);
}

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
            $acc[$key] = $minNumber+1;
        }
        return $acc;
    }, []);

    return implode('', $resArr);
}

function letsplay()
{
    $gameData = function () {
        $unbalancedNumber = getUnbalancedNumber();
        $balancedNumber = getBalancedNumber($unbalancedNumber);
        return [$unbalancedNumber, $balancedNumber];
    };
    play(DESCRIPTION, $gameData);
}

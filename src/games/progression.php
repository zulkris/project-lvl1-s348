<?php
namespace BrainGames\Games\Progression;

use function \BrainGames\Cli\play;

const DESCRIPTION = 'What number is missing in this progression?';
const MIN_START_NUM = 2;
const MAX_START_NUM = 50;
const PROGRESSION_LENGHT = 10;
const MIN_STEP = 2;
const MAX_STEP = 9;

function gameData()
{
    $randEmptyPlace = rand(1, PROGRESSION_LENGHT);
    $startNum = rand(MIN_START_NUM, MAX_START_NUM);
    $step = rand(MIN_STEP, MAX_STEP);

    $resArr = [$startNum];
    for ($i = 1; $i < PROGRESSION_LENGHT; $i++) {
        $resArr[$i] = $resArr[$i-1]+$step;
    }

    $emptyNum = array_rand($resArr);

    $rightAnswer = $resArr[$emptyNum];
    $resArr[$emptyNum] = '..';

    $question = implode($resArr, ' ');

    return [$question, $rightAnswer];

}

function letsplay()
{
    $gameData = function () {
        $randEmptyPlace = rand(1, PROGRESSION_LENGHT);
        $startNum = rand(MIN_START_NUM, MAX_START_NUM);
        $step = rand(MIN_STEP, MAX_STEP);

        $resArr = [$startNum];
        for ($i = 1; $i < PROGRESSION_LENGHT; $i++) {
            $resArr[$i] = $resArr[$i-1]+$step;
        }

        $emptyNum = array_rand($resArr);

        $rightAnswer = $resArr[$emptyNum];
        $resArr[$emptyNum] = '..';

        $question = implode($resArr, ' ');

        return [$question, $rightAnswer];
    };
    play(DESCRIPTION, $gameData);
}


gameData();

<?php
namespace BrainGames\Games\Progression;

use function \BrainGames\Cli\play;

const DESCRIPTION = 'What number is missing in this progression?';
const MIN_START_NUM = 2;
const MAX_START_NUM = 50;
const PROGRESSION_LENGHT = 10;
const MIN_STEP = 2;
const MAX_STEP = 9;

function letsplay()
{
    $gameData = function () {
        $randEmptyPlace = rand(1, PROGRESSION_LENGHT);
        $startNum = rand(MIN_START_NUM, MAX_START_NUM);
        $step = rand(MIN_STEP, MAX_STEP);

        $resArr = [];
        for ($i = 0; $i < PROGRESSION_LENGHT; $i++) {
            $resArr[] = $startNum + $i * $step;
        }

        $emptyNum = array_rand($resArr);

        $rightAnswer = $resArr[$emptyNum];
        $resArr[$emptyNum] = '..';

        $question = implode($resArr, ' ');

        return [$question, (string)$rightAnswer];
    };
    play(DESCRIPTION, $gameData);
}

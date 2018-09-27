<?php
namespace BrainGames\Cli;

const STEPS = 3;
use function \cli\line;
use function \cli\prompt;

function play($gameName, $description, $gameData)
{
    printWelcome();
    printDescription($description);
    $name = askForName();

    for ($i = 1; $i <= STEPS; $i++) {
        [$question, $rightAnswer] = $gameData();

        line("Question: $question");
        $answer = prompt("You answer");

        if ($answer == $rightAnswer) {
            line('Correct!');
            line();
        } else {
            line();
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, $rightAnswer);
            line('Let\'s try again, %s!', $name);
            return;
        }
    }
    line('Congratulations, %s!', $name);
}

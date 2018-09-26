<?php
namespace BrainGames\Games;

use BrainGames\Cli;
use function \cli\line;
use function \cli\prompt;

function even()
{
    Cli\printWelcome();
    Cli\printRules('Answer "yes" if number even otherwise answer "no".');
    $name = Cli\askForName();

    for ($i=1; $i<=3; $i++) {
        $rand = rand(1, 100);
        line("Question: $rand");
        $answer = prompt("You answer");
        if (($rand%2 == 0 && $answer == "yes") || ($rand%2 !== 0 && $answer == "no")) {
            line('Correct!');
            line();
        } else {
            line();
            $correctAnswer = $rand%2 == 0 ? "yes" : "no";
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, $correctAnswer);
            line('Let\'s try again, %s!', $name);
            exit;
        }
    }
    line('Congratulations, %s!', $name);
}

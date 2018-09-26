<?php
namespace BrainGames\Logic;

use \BrainGames\Games as Game;

function play($gameName, $rules, $steps)
{
    \BrainGames\Cli\printWelcome();
    \BrainGames\Cli\printRules($rules);
    $name = \BrainGames\Cli\askForName();

    for ($i = 1; $i <= $steps; $i++) {
        $question = Game\Even\getQuestion();
        $rightAnswer = Game\Even\getRightAnswer($question);

        \cli\line("Question: $question");
        $answer = \cli\prompt("You answer");

        if ($answer == $rightAnswer) {
            \cli\line('Correct!');
            \cli\line();
        } else {
            \cli\line();
            \cli\line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, $rightAnswer);
            \cli\line('Let\'s try again, %s!', $name);
            return;
        }
    }
    \cli\line('Congratulations, %s!', $name);
}

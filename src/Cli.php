<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function welcome()
{
        line('Welcome to the Brain Game!');
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);
        line();
}

function gameEven()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if number even otherwise answer "no".');
    line();
    $answerArr = array("yes" => "no", "no" => "yes");

    //print_r($answerArr); exit;
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();

    for ($i=1; $i<=3; $i++) {
        $rand = rand(1, 100);
        line("Question: $rand");
        $answer = prompt("You answer");

        if (($rand%2 == 0 && $answer == "yes") || ($rand%2 !== 0 && $answer == "no")) {
            line('Correct!');
            line();
        } else {
            line();
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, $answerArr["$answer"]);
            line('Let\'s try again, %s!', $name);
            exit;
        }
    }
    line('Congratulations, %s!', $name);
}

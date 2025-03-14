<?php

namespace Game\Combat;
$round = 1;

class Battle {

function startFight($fighter1, $fighter2) {
    global $breaklog;
    global $battlelog;
    $breaklog = "<br><br>-------------------------------<br><br>";


    $battlelog .= $fighter1->name . " VS " . $fighter2->name . "<br> Let the battle begin! <br>";
    echo $breaklog;
    echo $battlelog;
    while ($fighter1->health > 0 && $fighter2->health > 0)
    {

    $battlelog = "round: ". $round . ".<br>";
    echo $battlelog;
    $round++;


        // fighter1 turn
    $battlelog = "<br>" . $fighter1->name. " turn. <br>";
        // max zorgt er voor dat damage niet in de min kan door die 0, anders zou je healen
    $damage = max(0, $fighter1->attack - $fighter2->defence);
    $fighter2->health -= $damage;
    $battlelog .= $fighter1->name . " hits " . $fighter2->name . " for " . $damage . " damage. <br> 
    Current health: " . $fighter2->health . ". <br>";
    echo $battlelog;

        // fighter2 turn
        if ($fighter2->health > 0) {

            $battlelog = "<br>". $fighter2->name. " turn. <br>";
            // max zorgt er voor dat damage niet in de min kan door die 0, anders zou je healen
            $damage = max(0, $fighter2->attack - $fighter1->defence);
            $fighter1->health -= $damage;
            $battlelog .= $fighter2->name . " hits " . $fighter1->name . " for " . $damage . " damage. <br> 
            Current health: " . $fighter1->health . ". <br>";
            echo $battlelog;

        } else {
            //fighter2 dead
            echo $breaklog;
            $battlelog .= $fighter2 . " has been defeated in battle. <br>" . $fighter1 . " is victorious! <br>" ;
            echo $battlelog;

        }

    }

    if ($fighter1->health == 0)
    {
        echo $breaklog;
        $battlelog .= $fighter1 . " has been defeated in battle. <br>" . $fighter2 . " is victorious! <br>" ;
        echo $battlelog;
    }

}




}

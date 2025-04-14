<?php



namespace Game;

/**
 * Class Battle
 * Handles the logic of a turn-based fight between two fighters.
 * @package Game
 */
class Battle
{
    private string $battlelog;
    private string $breaklog;
    private int $maxRounds = 7;
    private int $roundNumber = 1;

    public function getBattleLog(): string
    {
        return $this->battleLog;
    }

    public function getBreakLog(): string
    {
        return $this->breaklog;
    }

    public function getMaxRounds(): int
    {
        return $this->maxRounds;
    }

    public function getRoundNumber(): int
    {
        return $this->roundNumber;
    }

    public function startFight($fighter1, $fighter2)
    {

        $breaklog = "<br><br>>>----------------------------------------<<<<br><br>";
//        $this->getBreakLog();
//        $this->getBreakLog();
//        $this->getBreakLog();
        $battlelog = $fighter1->getName() . " VS " . $fighter2->getName() . "<br>Let the battle begin! ";
        echo $breaklog;
        echo $battlelog;
        echo $breaklog;

        while ($fighter1->getHealth() > 0 && $fighter2->getHealth() > 0 && $this->roundNumber <= $this->maxRounds) {
            echo "round: " . $this->roundNumber . "<br>";

            // fighter1 turn
            echo "<br>" . $fighter1->getName() . "'s turn. <br>";
            $damage = max(0, $fighter1->getAttack() - $fighter2->getDefense());
            $fighter2->takeDamage($damage);
            echo $fighter1->getName() . " hits " . $fighter2->getName() . " for " . $damage . " damage. 
            <br>Remaining health: ". $fighter2->getMaxHealth(). "/" . $fighter2->getHealth() . ". <br><br><br>";

            // fighter2 turn
            if ($fighter2->getHealth() > 0) {
                echo "<br>" . $fighter2->getName() . "'s turn. <br>";
                $damage = max(0, $fighter2->getAttack() - $fighter1->getDefense());
                $fighter1->takeDamage($damage);
                echo $fighter2->getName() . " hits " . $fighter1->getName() . " for " . $damage . " damage. 
                <br>Remaining health: ". $fighter1->getMaxHealth(). " / " . $fighter1->getHealth() . ". <br><br>";
            } else {
                echo $breaklog;
                echo $fighter2->getName() . " has been defeated in battle. <br>" . $fighter1->getName() . " is victorious! <br>";
            }

            if ($fighter1->getHealth() <= 0) {
                echo $breaklog;
                echo $fighter1->getName() . " has been defeated in battle. <br>" . $fighter2->getName() . " is victorious! <br>";
            }

            $this->roundNumber++;

            if ($this->roundNumber > $this->maxRounds && $fighter1->getHealth() > 0 && $fighter2->getHealth() > 0) {
                echo $breaklog;
                echo "The maximum amount of rounds has been reached. Both fighters exhausted themselves before one of them became
                victorious. They both lose. <br><br>";

                $this->changeMaxRounds($this->maxRounds + 5, $fighter1, $fighter2);
            }
        }
    }

    public function changeMaxRounds(int $rounds, $fighter1, $fighter2): void
    {
        $fighter1->setHealth($fighter1->getMaxHealth());
        $fighter2->setHealth($fighter2->getMaxHealth());

        $this->maxRounds = $rounds;
        $this->roundNumber = 1;

        echo "<br><br>>>----------------------------------------<<<<br><br>new max rounds: "
            . $this->maxRounds . "<br><br>>>----------------------------------------<<<<br><br>";

        $this->startFight($fighter1, $fighter2);
    }
}
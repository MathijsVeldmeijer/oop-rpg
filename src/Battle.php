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
    private int $damage;

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
            $this->damage = $this->calculateDamage($fighter1, $fighter2);
            $fighter2->takeDamage($this->damage);
            $this->logAttack($fighter1, $fighter2, $this->damage);
            echo $this->battlelog;


            // fighter2 turn
            if ($fighter2->getHealth() > 0) {
                echo "<br>" . $fighter2->getName() . "'s turn. <br>";
                $this->damage = $this->calculateDamage($fighter2, $fighter1);
                $fighter1->takeDamage($this->damage);
                $this->logAttack($fighter2, $fighter1, $this->damage);
                echo $this->battlelog;
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
        $this->logAttack($fighter1, $fighter2, $this->calculateDamage($fighter1, $fighter2) );
        echo $this->battlelog;
        $this->startFight($fighter1, $fighter2);
    }

    private function calculateDamage($attacker, $defender): int
    {
        $newDamage = max(0,(rand(70, 100) / 100) * ($attacker->getAttack() - $defender->getDefense()));
        return round($newDamage);
    }

    private function logAttack($attacker, $defender, int $damage): void
    {
      $this->battlelog = $attacker->getName(). " hits ". $defender->getName(). " for ". $damage. " damage.
            <br>".$defender->getName() ."'s health: ".  $defender->getHealth().  " / ". $defender->getMaxHealth()
            . ".<br><br><br>";
    }
}
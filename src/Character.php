<?php

namespace Game;

/**
 * Class Character
 * Represents a character in the game with attributes health, attack, role, name, defence, and range.
 * @package Game
 */

class Character
{

    public Inventory $inventory;

    function __construct(
        private int    $health,
        private int    $maxHealth,
        private int    $attack,
        private string $role,
        private string $name,
        private int    $defence = 5,
        private int    $range = 1
    )
    {
        $this->health = $health;
        $this->maxHealth = $maxHealth;
        $this->attack = $attack;
        $this->role = $role;
        $this->name = $name;
        $this->defence = $defence;
        $this->range = $range;
        $this->inventory = new Inventory();
    }

    // Getters
    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getMaxHealth(): int
    {
        return $this->maxHealth;
    }

    public function getAttack(): int
    {
        return $this->attack;
    }

    public function getDefense(): int
    {
        return $this->defence;
    }

    public function getRange(): int
    {
        return $this->range;
    }


    /**
     * Displays the character's stats.
     * @return string The formatted character stats.
     */
    public function displayStats(): string
    {
        return "name: " . $this->name . "<br>" .
            "current health: " . $this->health . "<br>" .
            "attack: " . $this->attack . "<br>" .
            "defence: " . $this->defence . "<br>" .
            "range: " . $this->range . "<br>" .
            "class: " . $this->role . "<br>";

    }

    /**
     * Displays a summery of the character.
     * @return string character summery.
     */
    public function getSummery(): string
    {
        return "this fighters name is " . $this->name .
            "and he specetialises in being a " . $this->role . ". <br>";
    }

    /**
     * Makes shoure the health cant be set lower than zero
     * @return int Newhealth as charachters health
     */
    public function setHealth(int $newHealth)
    {
        if ($newHealth < 0) {
            echo "This is not posible. Health can't be negative.";
        } else {
            $this->health = $newHealth;
        }

    }

    public function takeDamage(int $amount): void
    {
        $newHealth = $this->health - $amount;
        $this->health = max(0, $newHealth);
    }

}

require_once "autoload.php";


//$char03 = new Character(32, 28, 6, "Jake", 6, "ranger");
//
//$char03 = new Character(50, 10, 23, "Dasce", 1, "tank");


<?php

namespace Game\Characters;

trait TrtCharacter
{
class Character
{

    public function __construct(
        public $name,
        public $health,
        public $attack,
        public $role,
        public $defence = 5,
        public $range = 1
    )
    {
    }

    public function displayStats()
    {
        return "name: " . $this->name . "<br>" .
            "current health: " . $this->health . "<br>" .
            "attack: " . $this->attack . "<br>" .
            "defence: " . $this->defence . "<br>" .
            "range: " . $this->range . "<br>" .
            "class: " . $this->role . "<br>";

    }

    public function setHealth($newHealth)
    {
        if ($newHealth < 0) {
            echo "This is not posible. Health can't be negative.";
        } else {
            $this->health = $newHealth;
        }

    }

}

require_once "autoload.php";

$hero = new Character(
    name: "Hero",
    health: 25,
    attack: 34,
    range: 4,
    role: "mage");

$hero2 = new Character(
    name: "Jordan",
    health: 45,
    attack: 20,
    role: "barbarian",
    defence: 10,);

$char03 = new Character("Jake", 32, 28, 6, 6, "ranger");

$char03 = new Character("Dasce", 50, 10, 23, 1, "tank");

}
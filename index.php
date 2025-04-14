<?php

require_once "vendor/autoload.php";

echo  "<pre>";

use Game\Character;
use Game\Battle;



$hero = new Character(
    health: 55,
    maxHealth: 55,
    attack: 15,
    role: "mage",
    name: "Hero",
    defence: 8,
    range: 5);

$hero2 = new Character(
    health: 55,
    maxHealth: 55,
    attack: 11,
    role: "barbarian",
    name: "Jordan",
    defence: 10,);

$hero->inventory->addItem("zwaard");
$hero->inventory->addItem("schild");

//echo $hero->getSummery();

//show both charachters
echo $hero->displayStats();
echo '<br>Items: <br>';
foreach ($hero->inventory->getItems() as $item) {
    echo "- " . $item . "<br>";
}
echo "<br><br>";
echo $hero2->displayStats();
echo '<br>Items: <br>';
foreach ($hero2->inventory->getItems() as $item) {
    echo "- " . $item . "<br>";
}
echo "<br><br>";

$hero->inventory->removeItem("schild");

echo '<br>Items: <br>';
foreach ($hero->inventory->getItems() as $item) {
    echo "- " . $item . "<br>";
}

// start Battle
$newBattle = new Battle();
$newBattle->startFight($hero, $hero2);



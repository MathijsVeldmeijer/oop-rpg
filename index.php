<?php

require_once "autoload.php";
//require_once "Character.php";


//echo $hero2->displayStats();


echo  "<pre>";

//$battle = new Battle;

use TrtCharacter;

echo $hero->displayStats();

$fighter1 = $hero;
$fighter2 = $hero2;

use Game\Combat\Battle;
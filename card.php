<?php

class Card
{
    public $suit;
    public $value;
    public $points;
    public $image;

    public function displayCard()
    {
        return $this->value. ' of '. $this->suit;
    }


    public function displayCardImage()
    {
        return "<img src'images/".$this->image."' width=100 height=200 alt='". $this->value." of ". $this->suit. ">";
    }




}

$queenOfHearts = new Card();
$queenOfHearts->suit = "Hearts";
$queenOfHearts->value = "Queen";
$queenOfHearts->points = 10;
$queenOfHearts->image = "QH.png";

echo $queenOfHearts->suit;
echo $queenOfHearts->displayCard();
echo $queenOfHearts->displayCardImage();


$twoOfClubs = new Card();

echo "<pre>";
var_dump($queenOfHearts);
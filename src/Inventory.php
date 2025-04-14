<?php
namespace Game;


/** Class Inventory
 * @package Game
 * */
class Inventory
{
private array $items = [];


    /** om een nieuw item toe te voegen aan de inventory
     * @param string $item
     * @return void
     */
public function addItem(string $item): void
{
    $this->items[] = $item;
}


    /** om een item te verwijderen uit de inventory
     * @param string $item
     * @return void
     */
public function removeItem( string $itemRemove): void
{
    $index = array_search($itemRemove, $this->items);

    unset($this->items[$index]);
}


    /** om alle items op te vragen uit de inventory
     * @return array
     */
public function getItems(): array
{
    return $this->items;
}


}

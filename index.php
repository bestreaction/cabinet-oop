<?php
include('Item.php');
include('ShelfIsFullException.php');
include('ShelvesFullException.php');
include('Cabinet.php');
include('ShelfManager.php');
include('Shelf.php');
include('Box.php');

$cabinet = new Cabinet();

$cabinet->put(20);
$cabinet->put(20);
$cabinet->put(18);

print_r($cabinet->getFreeSpace());

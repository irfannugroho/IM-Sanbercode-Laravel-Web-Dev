<?php 

require_once('animal.php');
require_once('Ape.php');
require_once('Frog.php');

//Release 0
$sheep = new Animal("shaun");

echo "Name : " . $sheep->name; 
echo "<br>";
echo "Legs : " . $sheep->legs; 
echo "<br>";
echo "Cold_blooded : " . $sheep->cold_blooded; 

echo "<br><br>";

//Release 1
$kodok = new Frog("buduk");
echo "Name : " . $kodok->name;
echo "<br>";
echo "Legs : " . $kodok->legs;
echo "<br>";
echo "Cold Blooded : " . $kodok->cold_blooded;
echo "<br>";
$kodok->jump();

echo "<br><br>";

$sungokong= new Ape("kera sakti");
echo "Name : " . $sungokong->name;
echo "<br>";
echo "Legs : " . $sungokong->legs;
echo "<br>";
echo "Cold Blooded : " . $sungokong->cold_blooded;
echo "<br>";
$sungokong->yell();







?>
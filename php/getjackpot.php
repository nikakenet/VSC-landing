<?php

// AJAX calls here for latest jackpots info after single article page is loaded

$jackpot = file_get_contents("https://www.planet7casino.com/jackpots/getjackpot.php");
$jackpot = json_decode($jackpot,true);
$jackpot  =  (string) $jackpot;

echo $jackpot;
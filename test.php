<?php

use Irsyadulibad\Weton\Weton;

require './vendor/autoload.php';

$weton = new Weton(new DateTime("2022-04-15"));

var_dump($weton);

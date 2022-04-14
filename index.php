<?php

$tanggal = "2022-04-15";

$acuan = "1900-01-01";

$pasaran = ['Pahing', 'Pon', 'Wage', 'Kliwon', 'Legi'];
$neppas = [9, 7, 4, 8, 5];

$dino = array(
    'Sunday' => 'Ahad',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jum\'at',
    'Saturday' => 'Sabtu'
);

$nepdino = [
    'Sunday' => 5,
    'Monday' => 4,
    'Tuesday' => 3,
    'Wednesday' => 7,
    'Thursday' => 8,
    'Friday' => 6,
    'Saturday' => 9    
];

$namahari = date('l', strtotime($tanggal));
$exp = explode('-', $tanggal);
$exp2 = explode('-', $acuan);

$gregorian1 = gregoriantojd($exp[1], $exp[2], $exp[0]);
$gregorian2 = gregoriantojd($exp2[1], $exp2[2], $exp2[0]);

$mod = ($gregorian1 - $gregorian2) % 5;
$totalnep = $nepdino[$namahari] + $neppas[$mod];

echo $dino[$namahari] . ' ' . $pasaran[$mod];



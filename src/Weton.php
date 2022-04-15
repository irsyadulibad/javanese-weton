<?php

namespace Irsyadulibad\Weton;

use DateTime;
use Irsyadulibad\Weton\Exceptions\WetonException;

class Weton
{
    public int $totalNeptu;
    public object $pasaran, $day;

    private DateTime $reference, $date;

    protected $nepPas = [9, 7, 4, 8, 5];

    protected $pasarans = [
        'Pahing',
        'Pon',
        'Wage',
        'Kliwon',
        'Legi'
    ];

    protected $nepDays = [
        'Sunday' => 5,
        'Monday' => 4,
        'Tuesday' => 3,
        'Wednesday' => 7,
        'Thursday' => 8,
        'Friday' => 6,
        'Saturday' => 9
    ];

    public function __construct(DateTime $date)
    {
        $this->validate($date);
        $this->countWeton();
    }

    public function __toString()
    {
        return $this->pasaran->name . ' ' . $this->day->name;
    }

    private function countWeton(): void
    {
        $mod = ($this->gregVal($this->date) - $this->gregVal($this->reference)) % 5;
        $day = $this->date->format('l');

        $this->pasaran = (object) [
            'name' => $this->pasarans[$mod],
            'neptu' => $this->nepPas[$mod]
        ];

        $this->day = (object) [
            'name' => $day,
            'neptu' => $this->nepDays[$day]
        ];

        $this->totalNeptu = ($this->day->neptu + $this->pasaran->neptu);
    }

    private function gregVal(DateTime $date): int
    {
        $exp = explode('-', $date->format('m-d-Y'));
        return gregoriantojd(...$exp);
    }

    private function validate(DateTime $date): void
    {
        $reference = new DateTime('1900-01-01');

        if($date < $reference) throw new WetonException("Can't process from before 1900");

        $this->reference = $reference;
        $this->date = $date;
    }
}

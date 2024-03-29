<?php

namespace Irsyadulibad\Weton;

use DateTime;
use DateTimeImmutable;
use Irsyadulibad\Weton\Exceptions\WetonException;

class Weton
{
    public int $totalNeptu;
    public bool $indonesian = false;
    public object $pasaran, $day;

    private DateTime|DateTimeImmutable $reference, $date;

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

    public function __construct(DateTime|DateTimeImmutable $date)
    {
        $this->validate($date);
        $this->countWeton();
    }

    public function __toString()
    {
        if($this->indonesian) {
            return "{$this->day->name} {$this->pasaran->name}";
        }

        return "{$this->pasaran->name} {$this->day->name}";
    }

    public static function from(DateTime|DateTimeImmutable $date)
    {
        return new self($date);
    }

    public function toIndonesian()
    {
        $indonesianDays = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jum\'at',
            'Saturday' => 'Sabtu'
        ];

        $this->indonesian = true;
        $this->day->name = $indonesianDays[$this->day->name];

        return $this;
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

    private function gregVal(DateTime|DateTimeImmutable $date): int
    {
        $exp = explode('-', $date->format('m-d-Y'));
        return gregoriantojd(...$exp);
    }

    private function validate(DateTime|DateTimeImmutable $date): void
    {
        $reference = new DateTime('1900-01-01');

        if($date < $reference) throw new WetonException("Can't process from before 1900");

        $this->reference = $reference;
        $this->date = $date;
    }
}

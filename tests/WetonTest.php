<?php

use Irsyadulibad\Weton\Exceptions\WetonException;
use Irsyadulibad\Weton\Weton;

it('throw error when year are less than 1900', function() {
    $this->expectException(WetonException::class);
    (new Weton(new DateTime("1889-12-01")));
});

it('return pasaran and day is type of object', function() {
    $weton = new Weton(new DateTime("2022-04-15"));

    expect($weton->pasaran)->toBeObject();
    expect($weton->day)->toBeObject();
});

it('should return weton of 02 Mar 2022 on Pahing Wednesday', function() {
    $weton = new Weton(new DateTime("2022-03-02"));

    $this->assertEquals((object)['name' => 'Pahing', 'neptu' => 9], $weton->pasaran);
    $this->assertEquals((object)['name' => 'Wednesday', 'neptu' => 7], $weton->day);
    $this->assertEquals(16, $weton->totalNeptu);
});

it('should return weton of 17 Aug 1945 on Legi Friday', function() {
    $weton = new Weton(new DateTime("1945-08-17"));

    $this->assertEquals((object)['name' => 'Legi', 'neptu' => 5], $weton->pasaran);
    $this->assertEquals((object)['name' => 'Friday', 'neptu' => 6], $weton->day);
    $this->assertEquals(11, $weton->totalNeptu);
});

it('must return Pon Sunday of 21 Jun 2022', function() {
    $weton = new Weton(new DateTime("2022-06-26"));

    $this->assertEquals('Pon Sunday', strval($weton));
});

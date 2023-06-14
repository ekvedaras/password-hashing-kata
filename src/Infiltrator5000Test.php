<?php

declare(strict_types=1);

use Hacking\DoorId;
use Hacking\Infiltrator5000;
use Hacking\LockedDoor;
use Hacking\Password;

it('correctly unlocks doors', function (DoorId $doorId, Password $expectedPassword) {
    $lockedDoor = new LockedDoor($doorId);
    $algorithm = new Infiltrator5000();
    $unlockedDoor = $lockedDoor->unlock($algorithm);

    expect($unlockedDoor)->password->toEqual($expectedPassword);
})->with([
    'abc' => [new DoorId('abc'), new Password('18f47a30')],
    'cxdnnyjw' => [new DoorId('cxdnnyjw'), new Password('f77a0e6e')]
]);
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
    'abc' => [new DoorId('abc'), Password::known('18f47a30')],
    'cxdnnyjw' => [new DoorId('cxdnnyjw'), Password::known('f77a0e6e')],
    'wtnhxymk' => [new DoorId('wtnhxymk'), Password::known('2414bc77')],
]);
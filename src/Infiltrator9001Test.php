<?php

declare(strict_types=1);

use Hacking\DoorId;
use Hacking\Infiltrator9001;
use Hacking\LockedDoor;
use Hacking\Password;

it('correctly unlocks doors', function (DoorId $doorId, Password $expectedPassword) {
    $lockedDoor = new LockedDoor($doorId);
    $algorithm = new Infiltrator9001();
    $unlockedDoor = $lockedDoor->unlock($algorithm);

    expect($unlockedDoor)->password->toEqual($expectedPassword);
})->with([
    'abc' => [new DoorId('abc'), Password::known('05ace8e3')],
    'cxdnnyjw' => [new DoorId('cxdnnyjw'), Password::known('999828ec')],
    'wtnhxymk' => [new DoorId('wtnhxymk'), Password::known('437e60fc')],
]);
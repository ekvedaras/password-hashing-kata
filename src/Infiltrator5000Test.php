<?php

declare(strict_types=1);

use Hacking\DoorId;
use Hacking\Infiltrator5000;
use Hacking\LockedDoor;
use Hacking\Password;
use Hacking\UnlockedDoor;

it('correctly unlocks doors', function (LockedDoor $lockedDoor) {
    $algorithm = new Infiltrator5000();

    $password = $algorithm->hack($lockedDoor);

    expect($lockedDoor->unlock($password))->toBeInstanceOf(UnlockedDoor::class);
})->with([
    'abc' => [new LockedDoor(new DoorId('abc'), Password::known('18f47a30'))],
    'cxdnnyjw' => [new LockedDoor(new DoorId('cxdnnyjw'), Password::known('f77a0e6e'))],
    'wtnhxymk' => [new LockedDoor(new DoorId('wtnhxymk'), Password::known('2414bc77'))],
]);
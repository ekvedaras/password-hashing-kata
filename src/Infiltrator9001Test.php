<?php

declare(strict_types=1);

use Hacking\DoorId;
use Hacking\Infiltrator9001;
use Hacking\LockedDoor;
use Hacking\Password;
use Hacking\UnlockedDoor;

it('correctly unlocks doors', function (LockedDoor $lockedDoor) {
    $algorithm = new Infiltrator9001();

    $password = $algorithm->hack($lockedDoor);

    expect($lockedDoor->unlock($password))->toBeInstanceOf(UnlockedDoor::class);
})->with([
    'abc' => [new LockedDoor(new DoorId('abc'), Password::known('05ace8e3'))],
    'cxdnnyjw' => [new LockedDoor(new DoorId('cxdnnyjw'), Password::known('999828ec'))],
    'wtnhxymk' => [new LockedDoor(new DoorId('wtnhxymk'), Password::known('437e60fc'))],
]);
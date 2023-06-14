<?php

declare(strict_types=1);

namespace Hacking;

final readonly class LockedDoor
{
    public function __construct(
        public DoorId $id,
    ) {
    }


    public function unlock(Algorithm $algorithm): UnlockedDoor
    {
        $password = $algorithm->hack($this->id);

        return new UnlockedDoor(
            id: $this->id,
            password: $password,
        );
    }
}
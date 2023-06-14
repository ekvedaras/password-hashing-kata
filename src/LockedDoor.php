<?php

declare(strict_types=1);

namespace Hacking;

use DomainException;

final readonly class LockedDoor
{
    public function __construct(
        public DoorId $id,
        private Password $password,
    )
    {
    }

    public function unlock(Password $password): UnlockedDoor
    {
        if (!$this->password->equals($password)) {
            throw new DomainException("Failed to unlock door [$this->id]. Incorrect password");
        }

        return new UnlockedDoor($this->id);
    }
}
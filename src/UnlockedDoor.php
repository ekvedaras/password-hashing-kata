<?php

declare(strict_types=1);

namespace Hacking;

final readonly class UnlockedDoor
{
    public function __construct(
        public DoorId $id,
        public Password $password,
    )
    {
    }
}
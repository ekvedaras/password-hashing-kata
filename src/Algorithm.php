<?php

declare(strict_types=1);

namespace Hacking;

interface Algorithm
{
    public function hack(DoorId $doorId): Password;
}
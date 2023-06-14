<?php

declare(strict_types=1);

namespace Hacking;

interface Algorithm
{
    public function hack(LockedDoor $door): Password;
}
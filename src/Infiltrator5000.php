<?php

declare(strict_types=1);

namespace Hacking;

final class Infiltrator5000 implements Algorithm
{
    private const passwordLength = 8;
    private const interestingHashPrefix = '00000';
    private const passwordSequencePositionInHash = 5;

    public function hack(LockedDoor $door): Password
    {
        $password = Password::ofLength(self::passwordLength);
        $index = Index::first($door->id);

        while ($password->isUnknown()) {
            $hash = MD5Hash::fromIndex($index);
            if (! $hash->startsWith(self::interestingHashPrefix)) {
                $index = $index->next();
                continue;
            }

            $sequence = $hash->characterAt(self::passwordSequencePositionInHash);
            $password = $password->withNextHackedSequence($sequence);
            $index = $index->next();
        }

        return $password;
    }
}
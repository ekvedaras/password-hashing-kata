<?php

declare(strict_types=1);

namespace Hacking;

final class Infiltrator9001 implements Algorithm
{
    private const passwordLength = 8;
    private const interestingHashPrefix = '00000';
    private const sequencePositionInPasswordInHash = 5;
    private const passwordSequencePositionInHash = 6;

    public function hack(DoorId $doorId): Password
    {
        $password = Password::ofLength(self::passwordLength);
        $index = Index::first($doorId);

        while ($password->isUnknown()) {
            $hash = MD5Hash::fromIndex($index);
            $index = $index->next();
            if (! $hash->startsWith(self::interestingHashPrefix)) {
                continue;
            }

            $sequencePosition = $hash->characterAt(self::sequencePositionInPasswordInHash);
            if (! is_numeric($sequencePosition) || (int) $sequencePosition >= self::passwordLength) {
                continue;
            }

            $sequence = $hash->characterAt(self::passwordSequencePositionInHash);
            $password = $password->withHackedSequence($sequence, (int) $sequencePosition);
        }

        return $password;
    }
}
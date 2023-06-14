<?php

declare(strict_types=1);

namespace Hacking;

final readonly class MD5Hash
{
    public function __construct(private string $value)
    {
    }

    public static function fromIndex(Index $index): self
    {
        return new self($index->hashed(md5(...)));
    }

    public function startsWith(string $sequence): bool
    {
        return str_starts_with($this->value, $sequence);
    }

    public function characterAt(int $passwordSequencePositionInHash): string
    {
        return $this->value[$passwordSequencePositionInHash];
    }
}
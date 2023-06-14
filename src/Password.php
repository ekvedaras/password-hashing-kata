<?php

declare(strict_types=1);

namespace Hacking;

final readonly class Password
{
    public function __construct(private string $value)
    {
    }

    public function isShorterThan(int $length): bool
    {
        return strlen($this->value) < $length;
    }

    public function withHackedSequence(string $sequence): self
    {
        return new self($this->value . $sequence);
    }
}
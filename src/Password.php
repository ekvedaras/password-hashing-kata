<?php

declare(strict_types=1);

namespace Hacking;

use InvalidArgumentException;

final readonly class Password
{
    private const mask = '_';

    private function __construct(private string $value, private int $length)
    {
        if (strlen($this->value) !== $this->length) {
            throw new InvalidArgumentException('Password has invalid length');
        }
    }

    public static function ofLength(int $length): self
    {
        return new self(str_repeat(self::mask, $length), $length);
    }

    public static function known(string $secret): self
    {
        return new self($secret, strlen($secret));
    }

    public function isUnknown(): bool
    {
        return str_contains($this->value, self::mask) !== false;
    }

    public function withNextHackedSequence(string $sequence): self
    {
        return $this->withHackedSequence($sequence, strpos($this->value, self::mask));
    }

    public function withHackedSequence(string $sequence, int $position): self
    {
        $newSequence = $this->value;
        $newSequence[$position] = $sequence;

        return new self($newSequence, $this->length);
    }
}
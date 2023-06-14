<?php

declare(strict_types=1);

namespace Hacking;

final readonly class Index
{
    private string $value;

    public function __construct(private DoorId $doorId, private int $index)
    {
        $this->value = $this->doorId->value . $this->index;
    }

    public static function first(DoorId $doorId): self
    {
        return new self($doorId, 0);
    }

    public function next(): self
    {
        return new self($this->doorId, $this->index + 1);
    }

    public function hashed(callable $using): string
    {
        return $using($this->value);
    }
}